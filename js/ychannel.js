var app = angular.module('channelScope', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('channelScopeControl', function($scope, $http, $sce, $timeout) {
    scope = $scope;
    http = $http;
    $scope.indexPage = Constants.indexPage;
    $scope.searchPage = Constants.searchPage;
    $scope.menuHide = false;
    jQuery('.b').show();
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
