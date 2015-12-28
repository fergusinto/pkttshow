var get_push_notice = function() {
    http.get(Constants.apiPath + '/getPushNotice', {}).then(function(result) {
        var pushNotice = result['data']['data'];
        scope.totalPushNotices = pushNotice;
        scope.$watch(function() {
            $("#marquee1").marquee();
        });
    })
}
var get_banners = function() {
    http.get('js/ybanner.js', {}).then(function(result) {
        var banners = result['data'];
        angular.forEach(banners, function(value, key) {
            banners[key]['bannerImage'] = 'http://pk.ttshow.yaoworking.idv.tw' + value['bannerImage'];
        })
        scope.banners = banners;
        scope.$watch(function() {
            $("#owl-demo").owlCarousel({
                navigation: false,
                slideSpeed: 1000,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: 8000,
                stopOnHover: true,
                pagination: true,
                autoWidth: true,
                autoHeight: true,
            });
        });
    });
}
var get_bonus = function() {
    http.get(Constants.apiPath + '/category/1/getBonus', {}).then(function(result) {
        var bonusData = result['data'];
        scope.totalBonus = (bonusData['status']) ? bonusData['data']['totalBonus'] : 0;
    });
}
var get_params = function() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}
var check_fb_login_status = function() {
    facebooks.check_s_fb_login_status();
};
var fb_share = function() {
    var options = {
        name: '我正在參加花千骨人氣王呢！',
        link: 'http://pk.ttshow.yaoworking.idv.tw/' + Constants.indexPage,
        picture: 'http://pk.ttshow.yaoworking.idv.tw/images/fb_share.jpg',
        description: '只要參與投票就送價值新台幣300的虛寶，更有多項大獎等你抽，你還等什麼呢！'
    }
    facebooks.fb_share(options);
}
var set_itemID = function(itemID, getStarNums) {
    console.log(getStarNums);
    scope.setStarData['itemID'] = itemID;
    scope.getStarNums = (getStarNums > 100) ? 100 : getStarNums;
}
var send_star = function() {
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
var set_star = function() {
    http.post(Constants.apiPath + '/setStar', scope.setStarData).then(function(result) {
        jQuery('#pop-ranking').modal('hide');
    })
}
var line_share = function() {
    window.location = 'http://line.me/R/msg/text/' + encodeURIComponent('各位大大，幫我投票順便領個花千骨手遊虛寶吧><, 網址：http://pk.ttshow.yaoworking.idv.tw/m-content.html?itemID=' + $scope.setStarData['itemID']);
}
var close_rank = function() {
    jQuery('#pop-ranking').modal('hide');
}
var close_share = function() {
    jQuery('#pop-share').modal('hide');
}
