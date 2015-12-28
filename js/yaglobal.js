app.factory('globalFuncs', function() {
    return {
        set_itemID: function(itemID, getStarNums) {
            scope.setStarData['itemID'] = itemID;
            scope.getStarNums = (getStarNums > 100) ? 100 : getStarNums;
        },
        send_star: function() {
            if(userData['fbID'] == 0 || userData['fbID'] == undefined) {
                alert('請先登入FB');
                window.location = Constants.loginPage;
                return false;
            } else if(jQuery('input[name=quality]:checked').val() == undefined) {
                alert('請選擇星星數');
                return false;
            } else {
                scope.setStarData['starNums'] = jQuery('input[name=quality]:checked').val();
                set_star();
            }
        }
    };
});
app.run(function($rootScope, globalFuncs) {
    $rootScope.appFuncs = globalFuncs;
});
