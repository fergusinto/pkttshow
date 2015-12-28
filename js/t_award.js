var app = angular.module('awardScope', []);
app.controller('awardScopeControl', function($scope, $http, $sce, $timeout) {
    scope = $scope;
    http = $http;
    get_user_LotteryItem_ID();
    get_params();
    $scope.getItemID = (get_params()['itemID'] == undefined) ? 'all' : get_params()['itemID'];
    console.log('$scope.getItemID = '+$scope.getItemID);
    j_name = $(".name");
    j_ID = $(".ID");
    j_birthday = $(".birthday");
    j_city = $(".city_select");
    j_town = $(".town_select");
    j_street = $(".street");
    $("#datepicker").datepicker();
    j_city.append("<option value=\"-1\">請選擇</option>");
    for(var i = 0; i < city.length; i++) {
        j_city.append("<option value=\" " + i + " +\">" + city[i] + "</option>");
    }
    j_city.change(function() {
        j_town.empty();
        var index = j_city.val();
        if(index == -1) {
            return
        }
        var mycity = j_city.find("option:selected").text();
        j_town.append("<option value=\"-1\">請選擇</option>");
        for(var i = 0; i < town[mycity].length; i++) {
            j_town.append("<option value=\"" + i + "\">" + town[mycity][i] + "</option>")
        }
    });
    $(".ID").keyup(function() {
        var $this = $(this);
        var value = $this.val();
        $this.removeClass("yes");
        $this.removeClass("no");
        if(value !== "") {
            $this.addClass(/^[a-zA-Z][12][0-9]{8}$/.test(value) ? "yes" : "no");
        }
    });
    $(".submit").click(function() {
        if(j_name.val() == "" || j_ID.hasClass("yes") == false || j_birthday.val() == "" || j_city.val() == "-1" || j_town.val() == "-1" || j_street.val() == "") {
            alert("請先填完資料再送出喔~");
            return;
        }
        get_register_info();
        console.log('lotteryRegister = ', scope.lotteryRegister);
        http.post('http://private-706dd-ttshowpkapi.apiary-mock.com/api/register', scope.lotteryRegister).then(function(result) {
            console.log('result = ', result);
        })
    });
});
var get_user_LotteryItem_ID = function() {
    http.post('http://private-706dd-ttshowpkapi.apiary-mock.com/api/me/getWinID', {}).then(function(result) {
        var winID = result['data'];
        scope.winID = winID['data']['winID'];
    });
}
var get_register_info = function() {
    var myname = j_name.val();
    var myID = j_ID.val();
    var mybirthday = j_birthday.val();
    var mycity = j_city.find("option:selected").text();
    var mytown = j_town.find("option:selected").text();
    var mystreet = j_street.val();
    var myaddress = mycity + mytown.substr(0, 3).replace(/\s/, '') + mystreet;
    scope.lotteryRegister = {
        name: myname,
        license: myID,
        birthday: mybirthday,
        address: myaddress,
        userLotteryItemID: scope.winID
    }
}
