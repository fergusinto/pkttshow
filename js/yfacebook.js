var userData = {
    fbID: 0,
    checkFinish: false,
};
var Facebooks = function() {}
Facebooks.prototype = {
    fb_login_status: function() {
        FB.getLoginStatus(function(response) {
            if(response.status === 'connected') {
                userData['fbID'] = response.authResponse.userID
            }
            userData['checkFinish'] = true;
        });
    },
    fb_login: function(url) {
        FB.login(function(response) {
            if(response.status === 'connected') {
                userData['fbID'] = response.authResponse.userID;
                url = (url == undefined) ? Constants.myitemPage : url;
                window.location = url;
            } else {
                alert('本活動需要facebook授權才能參加活動!');
                return false;
            }
        }, {
            scope: 'email'
        });
    },
    fb_share: function(shareOptions) {
        jQuery('#pop-share').modal('hide');
        shareOptions['method'] = 'feed';
        FB.ui(shareOptions, function(response) {
            //
        });
    },
    check_s_fb_login_status: function() {
        FB.getLoginStatus(function(response) {
            if(response.status === 'connected') {
                window.location = Constants.myitemPage;
            } else {
                window.location = Constants.loginPage;
            }
        });
    }
}
var facebooks = new Facebooks();
window.fbAsyncInit = function() {
    FB.init({
        appId: '1669244106684896',
        xfbml: true,
        version: 'v2.5'
    });
    facebooks.fb_login_status();
};
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if(d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5&appId=1669244106684896";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
