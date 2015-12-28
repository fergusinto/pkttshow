var app = angular.module('indexScope', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('indexScopeControl', function($scope, $http, $sce, $timeout) {
    scope = $scope;
    http = $http;
    $scope.menuHide = true;
    $scope.searchPage = Constants.searchPage;
    $timeout(function() {
        $scope.menuHide = false;
        jQuery('.b').show();
    }, 1000);
    $scope.banners = [];
    $scope.totalBonus = 0;
    $scope.totalItems = [];
    $scope.totalPushNotices = [];
    get_banners();
    get_bonus();
    get_push_notice();
    get_item_list();
}).directive('mobileMenu', function() {
    return {
        restrict: 'A',
        templateUrl: '/templates/menuHtml.html',
        link: function() {
            $('a.popup-btn').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" src="' + url + '"></iframe>');
            });
        }
    };
});
var get_item_list = function() {
    var items = {};
    http.get(Constants.apiPath + '/getVideo', {
        channel: 1,
        type: 1,
        page: 1
    }).then(function(result) {
        var videoData = result['data']['data'];
        items['videos'] = videoData;
        http.get(Constants.apiPath + '/getImage', {
            channel: 1,
            type: 1,
            page: 1
        }).then(function(result) {
            var imageData = result['data']['data'];
            items['images'] = imageData;
            var loopNum = items['videos'].length;
            if(loopNum < items['images'].length) {
                loopNum = items['images'].length;
            }
            var i = 0;
            while(i < loopNum) {
                if(items['videos'][i] != undefined) {
                    var itemData = {
                        contributionId: items['videos'][i]['itemID'],
                        createTime: items['videos'][i]['createTime'],
                        startCountdown: items['videos'][i]['startCountdown'],
                        itemTitle: items['videos'][i]['youtubeName'],
                        itemUrl: 'http://img.youtube.com/vi/' + items['videos'][i]['youtubeID'] + '/maxresdefault.jpg',
                        name: items['videos'][i]['name'],
                        seeNums: items['videos'][i]['seeNums'],
                        starNums: items['videos'][i]['starNums'],
                        uid: items['videos'][i]['uid'],
                        uimage: items['videos'][i]['uimage'],
                        contentUrl: Constants.contentPage + '?fileType=video&itemID=' + items['videos'][i]['itemID']
                    }
                    scope.totalItems.push(itemData);
                }
                if(items['images'][i] != undefined) {
                    var itemData = {
                        contributionId: items['images'][i]['itemID'],
                        createTime: items['images'][i]['createTime'],
                        startCountdown: items['images'][i]['startCountdown'],
                        itemTitle: items['images'][i]['imageTitle'],
                        itemUrl: items['images'][i]['imageUrl'],
                        name: items['images'][i]['name'],
                        seeNums: items['images'][i]['seeNums'],
                        starNums: items['images'][i]['starNums'],
                        uid: items['images'][i]['uid'],
                        uimage: items['images'][i]['uimage'],
                        contentUrl: Constants.contentPage + '?fileType=image&itemID=' + items['images'][i]['itemID']
                    }
                    scope.totalItems.push(itemData);
                }
                i += 1;
            }
        });
    });
}
