var app = angular.module('loginScope', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('loginScopeControl', function($scope, $http) {
    scope = $scope;
    http = $http;
    $scope.fb_login = function() {
        facebooks.fb_login();
    }
});
