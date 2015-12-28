var app = angular.module('tpermissionScope', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('tpermissionScopeControl', function($scope, $http, $sce, $timeout) {
    scope = $scope;
    http = $http;
    $timeout(function() {
        jQuery('.b').show();
    }, 1000);
    $scope.getLicenseStatus = {
        status: false,
        license: ''
    }
    $scope.joinItems = [];
    $scope.getMemIntegral = {
        starNum: 0,
        rank: 0
    }
    get_banners();
    get_bonus();
    get_push_notice();
    get_login_status();
    get_join_items();
    get_my_integral();
    $scope.set_game_license = function() {
        if($scope.getLicenseStatus['status']) {
            $('.dpk-license').fadeIn('fast');
        } else {
            set_login_status();
        }
    }
    $scope.copy_string = function() {
        copy_to_clipboard($scope.getLicenseStatus.license);
    }
    $scope.set_prize = function(itemStatus, itemID) {
        if(itemStatus) {
            window.location = Constants.awardPage + '?itemID=' + itemID;
        } else {
            alert('倒數時間尚未結束');
            return false;
        }
    }
}).directive('mobileMenu', function() {
    return {
        restrict: 'A',
        template: '<ul>' + '<li><a href="">總覽</a></li>' + '<li><a href="/mmyitem">作品</a></li>' + '<li><a href="">追蹤</a></li>' + '<li><a href="">鐵粉</a></li>' + '<li class="active"><a href="javascript:;">任務</a></li>' + '<li><a href="/mmerrygame">兌換</a></li' + '</ul>'
    };
}).directive('profileA', function() {
    return {
        restrict: 'A',
        template: '<span>我的資產</span>' + '<ul>' + '<li><span ng-bind="profilea.starNum"></span><img src="images/co-filter-3.png" height="16" width="16"></li>' + '<li><span ng-bind="profilea.tgoin"></span><img src="images/co-filter-3O.png" height="16" width="16"></li>' + '<li><span ng-bind="profilea.money"></span><img src="images/uw-l-btn-1.png" height="16" width="16"></li>' + '</ul>',
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
                    window.location = '/m-login.html';
                }
            });
        }
    };
});
var get_login_status = function() {
    http.get(Constants.apiPath + '/me/getLicenseStatus', {}).then(function(result) {
        var getLicenseData = result['data']['data'];
        scope.getLicenseStatus = {
            status: getLicenseData['getLicenseStatus'],
            license: getLicenseData['licenseNum']
        }
    });
}
var set_login_status = function() {
    http.post(Constants.apiPath + '/me/setLicenseStatus', {}).then(function(result) {
        var getLicenseData = result['data']['data'];
        scope.getLicenseStatus = {
            status: getLicenseData['status'],
            license: getLicenseData['licenseNum']
        }
        $('.dpk-license').fadeIn('fast');
    });
}
var get_join_items = function() {
    http.get(Constants.apiPath + '/me/getJoinItem', {}).then(function(result) {
        var joinItemsData = result['data']['data'];
        scope.joinItems = joinItemsData;
    });
}
var get_my_integral = function() {
    http.get(Constants.apiPath + '/me/getMemIntegral', {}).then(function(result) {
        var memIntegralData = result['data']['data'];
        scope.getMemIntegral = {
            starNum: memIntegralData['starNum'],
            rank: memIntegralData['ranking']
        }
    });
}
var copy_to_clipboard = function(text) {
    if(window.clipboardData) {
        window.clipboardData.clearData();
        window.clipboardData.setData("Text", text);
    } else if(navigator.userAgent.indexOf("Opera") != -1) {
        window.location = text;
    } else if(window.netscape) {
        try {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
        } catch(e) {
            alert("被瀏覽器拒絕！\n請在瀏覽器地址欄輸入'about:config'並按上一頁\n然後將'signed.applets.codebase_principal_support'設置為'true'");
            return false;
        }
        var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
        if(!clip) return false;
        var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
        if(!trans) return false;
        trans.addDataFlavor('text/unicode');
        var str = new Object();
        var len = new Object();
        var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
        var copytext = text;
        str.data = copytext;
        trans.setTransferData("text/unicode", str, copytext.length * 2);
        var clipid = Components.interfaces.nsIClipboard;
        if(!clip) return false;
        clip.setData(trans, null, clipid.kGlobalClipboard);
    }
    return true;
}
var set_award = function(itemID) {
    http.post(Constants.apiPath + '/me/setAward', {
        itemID: itemID
    }).then(function(result) {
        var awardData = result['data'];
        alert(awardData['message']);
        return false;
    });
}
