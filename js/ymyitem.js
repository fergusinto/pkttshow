var app = angular.module('myitemScope', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('myitemScopeControl', function($scope, $http, $sce, $timeout) {
    scope = $scope;
    http = $http;
    $timeout(function() {
        jQuery('.b').show();
    }, 1000);
    $scope.vTotalItems = [];
    $scope.imgTotalItems = [];
    $scope.aTotalItems = [];
    $scope.getStarNums = 0;
    $scope.profilea = {
        starNum: 0,
        tgoin: 0,
        money: 0
    };
    $scope.profileb = {
        name: '',
        items: 0,
        follows: 0,
        fans: 0
    };
    $scope.setStarData = {
        itemID: 0,
        starNums: 0
    };
    get_item_list('video');
    get_item_list('image');
    // get_item_list('avideo');
}).directive('mobileMenu', function() {
    return {
        restrict: 'A',
        template: '<ul>' + '<li><a href="">總覽</a></li>' + '<li class="active"><a href="javascript:;">作品</a></li>' + '<li><a href="">追蹤</a></li>' + '<li><a href="">鐵粉</a></li>' + '<li><a href="/mtpermission">任務</a></li>' + '<li><a href="/mmerrygame">兌換</a></li' + '</ul>'
    };
}).directive('profileA', function() {
    return {
        restrict: 'A',
        template: '<img class="pic" src="images/testIMG/userphoto.jpg">' + '<ul>' + '<li><span class="name" ng-bind="profileb.name">花花</span></li>' + '<li><span ng-bind="profilea.starNum"></span><img src="images/co-filter-3.png" height="16" width="16"></li>' + '<li><span ng-bind="profilea.tgoin"></span><img src="images/co-filter-3O.png" height="16" width="16"></li>' + '<li><span ng-bind="profilea.money"></span><img src="images/uw-l-btn-1.png" height="16" width="16"></li>' + '</ul>',
        link: function(s, e, a) {
            http.get(Constants.apiPath + '/me/getAssets', {}).then(function(result) {
                var assetsData = result['data']['data'];
                if(result['data']['status']) {
                    scope.profilea = {
                        starNum: assetsData['starNum'],
                        tgoin: assetsData['tgoin'],
                        money: assetsData['money'],
                    }
                } else {
                    window.location = Constants.loginPage;
                }
            });
        }
    };
}).directive('profileB', function() {
    return {
        restrict: 'A',
        template: '<ul>' + '<li><span ng-bind="profileb.items"></span><br>作品</li>' + '<li><span ng-bind="profileb.follows"></span><br>追蹤</li>' + '<li><span ng-bind="profileb.fans"></span><br>鐵粉</li>' + '<li><span>??</span><br>更多</li>' + '</ul>',
        link: function(s, e, a) {
            http.get(Constants.apiPath + '/me/getInfo', {}).then(function(result) {
                var meInfoData = result['data']['data'];
                if(result['data']['status']) {
                    scope.profileb = {
                        name: meInfoData['name'],
                        items: meInfoData['itemTotal'],
                        follows: 24,
                        fans: 0
                    }
                } else {
                    window.location = Constants.loginPage;
                }
            });
        }
    };
});
var get_item_list = function(getFileType) {
    if(getFileType == 'video') {
        var apiParams = 'me/getVideo';
    } else if(getFileType == 'image') {
        var apiParams = 'me/getImage';
    } else {
        var apiParams = 'getVideo';
    }
    http.get(Constants.apiPath + '/' + apiParams, {}).then(function(result) {
        var totalData = result['data']['data'];
        totalData.forEach(function(value, key) {
            var itemData = {
                contributionId: value['itemID'],
                createTime: value['createTime'],
                startCountdown: value['startCountdown'],
                name: value['name'],
                seeNums: value['seeNums'],
                starNums: value['starNums'],
                uid: value['uid'],
                uimage: value['uimage'],
                contentUrl: Constants.contentPage + '?fileType=' + getFileType + '&itemID=' + value['itemID']
            }
            if(getFileType == 'video') {
                itemData['itemTitle'] = value['youtubeName'];
                itemData['itemUrl'] = 'http://img.youtube.com/vi/' + value['youtubeID'] + '/maxresdefault.jpg';
            } else if(getFileType == 'image') {
                itemData['itemTitle'] = value['imageTitle'];
                itemData['itemUrl'] = value['imageUrl'];
            }
            if(getFileType == 'video') {
                scope.vTotalItems.push(itemData);
            } else if(getFileType == 'image') {
                scope.imgTotalItems.push(itemData);
            } else if(getFileType == 'avideo') {
                scope.aTotalItems.push(itemData);
            }
        });
    });
}
