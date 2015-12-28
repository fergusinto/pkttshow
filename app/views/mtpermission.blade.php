<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>我的主頁 /任務 / 活動任務 / 達人秀擂台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta name="viewport" content="width=540"-->

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="js/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="css/sky-forms2.css"> -->
    <!-- owl carousel -->
    <link href="js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">

    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/dpk-style.css" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/angular.js"></script>
</head>
<body class="b" ng-app="tpermissionScope" ng-controller="tpermissionScopeControl" style="display: none;">
    <div class="m-nav">
        <a href="m-index.html" class="m-nav-back">
            <i class="fa fa-chevron-left"></i> 回首頁
        </a>
        <h3>我的主頁</h3>
    </div>
    <div class="m-header">
    </div>


    <section id="main" class="index">
        <div class="container">
            <div class="row" style="overflow: hidden;">
                <nav class="menu-b" mobile-menu></nav>
                <div class="dpk-mymoney" profile-a></div>
                <div class="dpk-AorB">
                    <span>我的任務</span>
                    <span class="target">活動任務</span>
                </div>

                <div class="index-slider">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <div class="item" ng-repeat="banner in banners track by $index">
                            <a ng-href="<%banner.bannerUrl%>">
                                <img ng-src="<%banner.bannerImage%>" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="index-popularity">
                    <div class="menu-purple">
                        <h3>
                            <a href="">活動辦法</a>
                        </h3>
                        <div class="mp-r">
                            剩餘獎金 <span ng-bind="totalBonus"></span> 元
                        </div>
                    </div>
                </div>

                <div class="index-marquee">
                    <ul id="marquee1" class="marquee">
                        <li ng-repeat="totalPushNotice in totalPushNotices track by $index">
                            恭喜<span ng-bind="totalPushNotice.name"></span><font ng-bind="totalPushNotice.summary"></font> <font ng-bind="totalPushNotice.prize"></font>
                        </li>
                    </ul>
                </div>
                    <div class="dpk-text">
                        <div class="dpk-title dpk-title2">
                         <span><img src="images/star.svg"></span>
                        登入、贈送星星得好禮
                        </div>
                        <ul>
                            <li>1.凡登入FB帳號即可獲得花千骨虛寶<br><span>註1：花千骨虛寶一人限領一次</span></li>
                            <li><div class="dpk-btn-go" ng-click="set_game_license();">領取序號</div></li>
                            <li>2.贈送1顆星星可獲得1枚達人幣，累積50枚達人幣即可參與抽獎<br><span>獎項：iphone 6s 、華碩平板、元和雅醫美券、梅精...等多項好禮</span></li>
                             <li><div class="dpk-btn-go" onclick="javascript:alert('阿哲沒給文案'); return false;">前往投票 》</div></li>
                        </ul>

                    </div>
                    <div class="dpk-text2">
                        <div class="dpk-title">
                        <span><img src="images/star.svg"></span>
                        24小時人氣現金挑戰賽
                        </div>
                        <ul>
                            <li>單一作品收集到30000顆星星，可獲得獎金五百元</li>
                            <li>單一作品收集到100000顆星星，可獲得獎金一千元</li>
                            <li>單一作品收集到200000顆星星，可獲得獎金二千元</li>
                        </ul>
                        <div class="dpk-btn-go2" onclick="javascript:alert('阿哲沒給文案'); return false;">我要參賽 》</div>
                    </div>

                    <div class="dpk-fbKing">
                        <div class="dpk-title">
                          <span><img src="images/star.svg"></span>
                          臉書人氣王
                        </div>
                        <ul>
                            <li>作品至活動截止前總積分最高者為優勝者，但不同作品可以共同累積星星數，所以上傳越多，獲獎機會越大！</li>
                        </ul>
                        <div class="dpk-btn-go2" onclick="javascript:alert('阿哲沒給文案'); return false;">我要參賽 》</div>
                    </div>
                     <div class="dpk-oil">
                        <div class="title">我的參賽作品</div>
                        <div class="main allDisapear">
                            <ul>
                                <li ng-repeat="joinItem in joinItems track by $index">
                                    <h4 ng-bind="joinItem.title"></h4>
                                    <div class="right">
                                        <span class="bd" ng-bind="joinItem.starNum"></span>
                                        <span class="bd" ng-bind="joinItem.title"></span>
                                        <span class="bd btn" ng-click="set_prize(joinItem.isGetPrize, joinItem.itemID);">領取獎勵</span>
                                    </div>
                               </li>
                            </ul>
                        </div>
                    </div>
                    <div class="dpk-chart">
                        <div class="title">目前積分</div>
                        <div class="main allDisapear">
                            <div>
                                <span>您已累積</span>
                                <span ng-bind="getMemIntegral.starNum"></span>
                                <span>目前排名</span>
                                <span ng-bind="getMemIntegral.rank"></span>
                            </div>
                       </div>
                    </div>

            </div>
        </div>
    </section>
    <div class="dpk-license">
        <div class="xx">《返回</div>
        <div class="div">
            您的專屬虛寶序號為<br><br>
            <span class="aa" ng-bind="getLicenseStatus.license"></span><br><br>
            （花千骨手遊價值新台幣300虛寶序號：金寶箱*3、金鑰匙*3、大體力丹*3、大修行丹*3、金幣500,000）<br>
            註：此獎項遊戲不能重複使用<br><br><br>
            <span class="copy" ng-click="copy_string();">複製序號</span>
            <a href="https://play.google.com/store/apps/details?id=com.pps.kiyu.hqg" target="_blank"><span>遊戲下載</span></a>
        </div>
    </div>
    <div class="dpk-form">
        <div class="xx">《返回</div>
        <div class="money">
            <h1>這不是約會網站</h1>
            <p>您的<span>作品名稱</span>已達到獎金門檻，請填寫下列資料，將由專人確認身份後寄發相關申請Email給您</p>
        </div>
        <div class="document">
           <form>
            真實姓名:<br>
            <input type="text" name="name" />
            <br />
            <br />
            出生年/月/日:<br>
            <input type="text" name="btd" />
            <br />
            <br />
            身分證字號:<br>
            <input type="text" name="id" />
            <br />
            <br />
            戶籍地址:<br>
            <input type="text" name="add" />
            <br />
            <br />
            聯絡電話:<br>
            <input type="text" name="mobile" />
            <br />
            <br />
            連絡信箱:<br>
            <input type="text" name="email" />
           </form>
           <button>送出</button>
        </div>
    </div>



    <script src="https://apis.google.com/js/platform.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/yconstants.js" type="text/javascript"></script>
		<script src="js/yglobal.js" type="text/javascript"></script>
		<script src="js/yfacebook.js" type="text/javascript"></script>
		<script src="js/ytpermission.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/JS.js"></script>
    <!-- owl carousel -->
    <script src="js/owl-carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>

    <!---// load jQuery from the GoogleAPIs CDN //-->
    <script type="text/javascript" src="js/marquee/jquery.marquee.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
          $("#marquee1").marquee();
          $('.dpk-oil .title').click(function() {
              $('.dpk-oil .main').fadeToggle('fast');
          });
          $('.dpk-chart .title').click(function() {
              $('.dpk-chart .main').fadeToggle('fast');
          });
          // $('.dpk-oil .right .btn').click(function() {
          //     $('.dpk-form').fadeIn('fast');
          // });
          // $('.dpk-form .xx').click(function() {
          //     $('.dpk-form').fadeOut('fast');
          // });
          // $('.dpk-btn-go').click(function() {
          //     $('.dpk-license').fadeIn('fast');
          // });
          $('.dpk-license .xx').click(function() {
              $('.dpk-license').fadeOut('fast');
          });
        });
    </script>
</body>
</html>
