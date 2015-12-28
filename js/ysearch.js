var app = angular.module('searchScope', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('searchScopeControl', function($scope, $http, $timeout) {
    scope = $scope;
    http = $http;
    $scope.menuHide = true;
    $scope.searchDatas = {
        string: '',
        videoNums: 0,
        imageNums: 0
    };
    $scope.videoDatas = [];
    $scope.imageDatas = [];
    $scope.affected_peoples = [];
    $scope.affected_people_num = 0;
    $scope.searchPage = Constants.searchPage;
    $scope.indexPage = Constants.indexPage;
    if(get_params()['qn'] != "" && get_params()['qn'] != undefined) {
        $scope.searchDatas['string'] = decodeURIComponent(get_params()['qn']);
    } else {
        alert('搜尋字串空白');
        window.location = '/mindex';
    }
    $scope.$watch(function() {
        if(userData['checkFinish']) {
            $scope.menuHide = false;
            jQuery('.b').show();
        }
    });
    $timeout(function() {
        $scope.menuHide = false;
        jQuery('.b').show();
    }, 1000);
    get_item_list('video', $scope.searchDatas['string']);
    get_item_list('image', $scope.searchDatas['string']);
    get_affected_people_by_keywords($scope.searchDatas['string']);
}).directive('mobileMenu', function () {
    return {
        restrict: 'A',
        templateUrl: '/templates/menuHtml.html',
        link: function(){
            $('a.popup-btn').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" src="'+url+'"></iframe>');
            });
        }
    };
});;
var get_item_list = function(getFileType, qn) {
    http.get(Constants.apiPath + '/searchVideoImage', {
        searchString: qn,
        type: getFileType,
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
                contentUrl: Constants.contentPage + '?fileType=' + getFileType + '&itemID=' + value['itemID']
            }
            if(getFileType == 'video') {
                itemData['itemTitle'] = value['youtubeName'];
                itemData['itemUrl'] = 'http://img.youtube.com/vi/' + value['youtubeID'] + '/maxresdefault.jpg';
                scope.videoDatas.push(itemData);
            } else if(getFileType == 'image') {
                itemData['itemTitle'] = value['imageTitle'];
                itemData['itemUrl'] = value['imageUrl'];
                scope.imageDatas.push(itemData);
            }
        });
        if(getFileType == 'video') {
            scope.searchDatas['videoNums'] = scope.videoDatas.length;
        } else if(getFileType == 'image') {
            scope.searchDatas['imageNums'] = scope.imageDatas.length;
        }
    });
}
var get_affected_people_by_keywords = function(qn) {
  http.get(Constants.apiPath + '/searchItemForp', {
      searchString: qn,
  }).then(function(result) {
      var totalData = result['data']['data'];
      totalData.forEach(function(value, key) {
          scope.affected_peoples.push({
              uid: value['uid'],
              name: value['name'],
              uimage: value['uimage'],
          });
          scope.affected_people_num += 1;
      });
  });
}
