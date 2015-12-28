<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>登入 / 達人秀擂台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta name="viewport" content="width=540"-->

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="js/font-awesome/css/font-awesome.min.css" type="text/css">
     <!-- owl carousel -->
    <link href="js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">

   <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/m-style.css" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script src="js/angular.js"></script>
</head>
<body class="login" ng-app="loginScope" ng-controller="loginScopeControl">
    <div class="m-nav">
        <a href="" class="m-nav-close"></a>
    </div>

    <section id="main" class="">
        <div class="container">
            <div class="row">
                <div class="login-data">
                    <div class="upload-footer">
                        <a href="javascript:;" class="btn-facebook" ng-click="fb_login();">
                            <i class="fa fa-facebook-square"></i>
                            透過Facebook開始使用
                        </a>
                        <span>
                            <a href="http://ttshow.tw/privacy.php">
                                登入後表示同意 隱私政策 與 服務條款
                            </a>
                        </span>
                    </div>
                </div>
                <div class="login-img">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="images/1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


	<!-- jQuery -->
    <script src="js/jquery.js"></script>
		<script src="js/yconstants.js" type="text/javascript"></script>
		<script src="js/yglobal.js" type="text/javascript"></script>
		<script src="js/yfacebook.js" type="text/javascript"></script>
		<script src="js/ylogin.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- scroll up -->
    <script src="js/totop.js" type="text/javascript"></script>
    <!-- owl carousel -->
    <script src="js/owl-carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
</body>
</html>
