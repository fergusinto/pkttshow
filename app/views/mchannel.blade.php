<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>頻道 / 達人秀擂台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta name="viewport" content="width=540"-->

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="js/font-awesome/css/font-awesome.min.css" type="text/css">

   <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/m-style.css" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script src="js/angular.js"></script>
</head>
<body class="b" ng-app="channelScope" ng-controller="channelScopeControl" style="display: none;">
    <div class="m-nav">
        <a href="<%indexPage%>" class="m-nav-back">
            <i class="fa fa-chevron-left"></i> 回首頁
        </a>
        <h3>我的頻道</h3>
    </div>

    <div class="m-header">
        <div class="search-bar" style="display:block;">
            <div class="sb-before">
                <i class="fa fa-search"></i> 大家都在搜尋：搞笑
            </div>
            <form action="<%searchPage%>" class="sky-form">
                <label>
                    <input type="text">
                </label>
            </form>
        </div>
    </div>

    <div class="m-menu" ng-hide="menuHide" mobile-menu></div>

    <section id="main" class="channel">
        <div class="container">
            <div class="row text-center">
                <div class="mc-box mart1">
                    <img src="images/logo-1.png" srcset="images/logo-1.png 1x, images/logo-1-2x.png 2x, images/logo-1-3x.png 3x" class="mc-title">
                    <ul>
                        <li>
                            <a href="http://ttshow.tw/index.php?tab=45" target="_blank">
                                <img src="images/channel-icon-1.svg" alt="">
                                <span>趣味新聞</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://ttshow.tw/index.php?tab=4" target="_blank">
                                <img src="images/channel-icon-2.svg" alt="">
                                <span>插畫</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://ttshow.tw/index.php?tab=2" target="_blank">
                                <img src="images/channel-icon-3.svg" alt="">
                                <span>影音</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://ttshow.tw/index.php?tab=42" target="_blank">
                                <img src="images/channel-icon-4.svg" alt="">
                                <span>百萬經典</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://ttshow.tw/index.php?tab=52" target="_blank">
                                <img src="images/channel-icon-5.svg" alt="">
                                <span>聯合出品</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mc-box">
                    <img src="images/logo.png" srcset="images/logo.png 1x, images/logo-2x.png 2x, images/logo-3x.png 3x" class="mc-title">
                    <ul>
                        <li>
                            <a href="/mpopularity">
                                <img src="images/channel-icon-6.svg" alt="">
                                <span>花千骨</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <script src="js/jquery.js"></script>
		<script src="js/yconstants.js" type="text/javascript"></script>
		<script src="js/yglobal.js" type="text/javascript"></script>
		<script src="js/yfacebook.js" type="text/javascript"></script>
		<script src="js/ychannel.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/JS.js"></script>
</body>
</html>
