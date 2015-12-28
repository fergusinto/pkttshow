var app = angular.module('popularityScope', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('popularityScopeControl', function($scope, $http, $timeout, $sce) {
    scope = $scope;
    http = $http;
    $scope.menuHide = true;
    $scope.channels = [];
    $scope.fileTypes = [];
    $scope.ranks = [];
    $scope.totalPushNotices = [];
    $scope.totalItems = [];
    $scope.getStarNums = 0;
    $scope.setStarData = {
        itemID: 0,
        starNums: 0
    };
    $scope.nowSelectData = {
        fileType: 1,
        channelType: 0,
        sortType: 1,
        page: 1
    }
    $scope.searchPage = Constants.searchPage;
    $timeout(function() {
        $scope.menuHide = false;
        jQuery('.b').show();
    }, 1000);
    $scope.getFileType = (get_params()['fileID'] == undefined) ? 'all' : get_params()['fileID'];
    $scope.getRankID = (get_params()['rankID'] == undefined) ? 1 : get_params()['rankID'];
    $scope.getCateID = (get_params()['cateID'] == undefined) ? 0 : get_params()['cateID'];
    if($scope.getFileType == 'all') {
        $scope.getFileType = 'video';
    }
    $scope.nowSelectData['channelType'] = $scope.getCateID;
    get_push_notice();
    get_item_list($scope.getFileType, $scope.getCateID, $scope.getRankID);
}).directive('mobileMenu', function() {
    return {
        restrict: 'A',
        templateUrl: '/templates/menuHtml.html',
        link: function(scope, element, attr) {
            $('a.popup-btn').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" src="' + url + '"></iframe>');
            });
        }
    };
}).directive('fileType', function() {
    return {
        restrict: 'A',
        templateUrl: '/templates/popularity/fileTypeHtml.html',
        link: function(scope, element, attr) {
            var fileActive = ['', '', ''];
            switch(scope.getFileType) {
                case 'image':
                    fileActive[0] = 'active';
                    break;
                case 'video':
                    fileActive[1] = 'active';
                    break;
                case 'all':
                    fileActive[2] = 'active';
                    break;
            }
            scope.fileTypes = [{
                fileTypeName: '圖片',
                fileTypeUrl: Constants.popularityPage + '?fileID=image&cateID=' + scope.getCateID + '&rankID=' + scope.getRankID,
                fileTypeActive: fileActive[0]
            }, {
                fileTypeName: '影片',
                fileTypeUrl: Constants.popularityPage + '?fileID=video&cateID=' + scope.getCateID + '&rankID=' + scope.getRankID,
                fileTypeActive: fileActive[1]
            }, {
                fileTypeName: '全部',
                fileTypeUrl: Constants.popularityPage + '?fileID=all&cateID=' + scope.getCateID + '&rankID=' + scope.getRankID,
                fileTypeActive: fileActive[2]
            }];
        }
    };
}).directive('channelType', function() {
    return {
        restrict: 'A',
        templateUrl: '/templates/popularity/channelTypeHtml.html',
        link: function(scope, element, attr) {
            http.get(Constants.apiPath + '/getChannel', {
                type: scope.getFileType
            }).then(function(result) {
                var channelData = result['data']['data'];
                var newChannelData = [{
                    channelID: 0,
                    channelName: '全部',
                    channelUrl: Constants.popularityPage + '?fileID=' + scope.getFileType + '&cateID=0' + '&rankID=' + scope.getRankID,
                    channelActive: (scope.getCateID == 0) ? 'active' : ''
                }];
                channelData.forEach(function(value, key) {
                    channelData[key]['channelUrl'] = Constants.popularityPage + '?fileID=' + scope.getFileType + '&cateID=' + value['channelID'] + '&rankID=' + scope.getRankID;
                    channelData[key]['channelActive'] = (scope.getCateID == (key + 1)) ? 'active' : '';
                    newChannelData.push(channelData[key]);
                });
                scope.channels = newChannelData;
            });
        }
    };
}).directive('rankType', function() {
    return {
        restrict: 'A',
        templateUrl: '/templates/popularity/rankTypeHtml.html',
        link: function(scope, element, attr) {
            var fileActive = ['', '', ''];
            fileActive[parseInt(scope.getRankID) - 1] = 'active';
            scope.ranks = [{
                rankName: '24H熱門',
                rankUrl: Constants.popularityPage + '?fileID=' + scope.getFileType + '&cateID=' + scope.getCateID + '&rankID=1',
                rankActive: fileActive[0]
            }, {
                rankName: '觀看次數',
                rankUrl: Constants.popularityPage + '?fileID=' + scope.getFileType + '&cateID=' + scope.getCateID + '&rankID=2',
                rankActive: fileActive[1]
            }, {
                rankName: '最新上傳',
                rankUrl: Constants.popularityPage + '?fileID=' + scope.getFileType + '&cateID=' + scope.getCateID + '&rankID=3',
                rankActive: fileActive[2]
            }];
        }
    };
});
var get_item_list = function() {
    if(scope.getFileType == 'video') {
        var apiParams = 'getVideo';
    } else if(scope.getFileType == 'image') {
        var apiParams = 'getImage';
    } else {
        var apiParams = 'getVideo';
    }
    http.get(Constants.apiPath + '/' + apiParams, {
        channel: scope.getCateID,
        type: scope.getRankID,
        page: 1
    }).then(function(result) {
        var totalData = result['data']['data'];
        totalData.forEach(function(value, key) {
            var itemData = {
                contributionId: value['itemID'],
                createTime: value['createTime'],
                startCountdown: value['startCountdown'],
                itemSummary: value['itemSummary'],
                name: value['name'],
                seeNums: value['seeNums'],
                starNums: value['starNums'],
                uid: value['uid'],
                uimage: value['uimage'],
                contentUrl: Constants.contentPage + '?fileType=' + scope.getFileType + '&itemID=' + value['itemID']
            }
            if(scope.getFileType == 'video') {
                itemData['itemTitle'] = value['youtubeName'];
                itemData['itemUrl'] = 'http://img.youtube.com/vi/' + value['youtubeID'] + '/maxresdefault.jpg';
            } else if(scope.getFileType == 'image') {
                itemData['itemTitle'] = value['imageTitle'];
                itemData['itemUrl'] = value['imageUrl'];
            }
            scope.totalItems.push(itemData);
        });
    });
}
