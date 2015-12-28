var app = angular.module('contentScope', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('contentScopeControl', function($scope, $http, $sce, $timeout) {
    scope = $scope;
    http = $http;
    sce = $sce
    $scope.singles = {};
    $scope.itemUrl = '';
    $scope.fbCommentUrl = '';
    $timeout(function() {
        jQuery('.b').show();
    }, 1000);
    var fileType = (get_params()['fileType'] == undefined) ? window.location = Constants.indexPage : get_params()['fileType'];
    var itemID = (get_params()['itemID'] == undefined) ? window.location = Constants.indexPage : get_params()['itemID'];
    $scope.setStarData = {
        itemID: 0,
        starNums: 0
    };
    $scope.fbCommentUrl = 'http://pk.ttshow.yaoworking.idv.tw/' + Constants.contentPage + '?fileType=video&itemID=222';
    $scope.indexPage = Constants.indexPage;
    get_item_detail(fileType, itemID);
});
var get_item_detail = function(fileType, itemID) {
    http.get(Constants.apiPath + '/getItemDetail', {
        itemID: itemID,
        type: fileType
    }).then(function(result) {
        var singleData = result['data']['data'][0];
        scope.singles = {
            contributionId: singleData['itemID'],
            createTime: singleData['createTime'],
            startCountdown: singleData['startCountdown'],
            itemSummary: singleData['itemSummary'],
            name: singleData['name'],
            seeNums: singleData['seeNums'],
            starNums: singleData['starNums'],
            uid: singleData['uid'],
            uimage: singleData['uimage'],
            getStarNums: (singleData['starNums'] > 100) ? 100 : singleData['starNums']
        }
        if(fileType == 'video') {
            scope.singles['itemTitle'] = singleData['youtubeName'];
            scope.singles['itemUrl'] = '<iframe width="100%" height="235" src="https://www.youtube.com/embed/' + singleData['youtubeID'] + '" frameborder="0" allowfullscreen></iframe>';
        } else if(fileType == 'image') {
            scope.singles['itemTitle'] = singleData['imageTitle'];
            scope.singles['itemUrl'] = '<img src="' + singleData['imageUrl'] + '">';
        }
        scope.itemUrl = sce.trustAsHtml(scope.singles['itemUrl']);
    });
}
