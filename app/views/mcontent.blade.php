<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>影片展開 / 花千骨臉書人氣王 / 達人秀擂台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta name="viewport" content="width=540"-->

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="js/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/sky-forms2.css">
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
<body class="b" ng-app="contentScope" ng-controller="contentScopeControl" style="display: none;">
    <div class="m-nav">
        <a ng-href="<%indexPage%>" class="m-nav-back">
            <i class="fa fa-times"></i>
        </a>
    </div>

    <section id="main" class="content">
        <div class="container">
            <div class="row">
                <div class="uw-list big">
                    <div class="uw-l-box">
                        <div class="uw-l-header">
                            <div class="uwl-h-l">
                                <img ng-src="<%singles.uimage%>">
                                <div class="uwl-hl-data">
                                    <a href="javascript:;"><font ng-bind="singles.name"></font></a><br>
                                    <span ng-bind="singles.createTime"></span>
                                </div>
                            </div>
                            <div class="uwl-h-r">
                                <div class="uw-l-follow">
                                    <a class="btn-follow">
                                        <i class="fa fa-plus"></i> <span>追蹤</span>
                                    </a>
                                    <a class="btn-unfollow">
                                        <i class="fa fa-check"></i> <span>已追蹤</span>
                                    </a>
                                    <a class="btn-arrow-down">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </div>
                                <div class="uw-l-report">
                                    <a data-toggle="modal" class="popup-btn3" data-target="#pop-report">檢舉作品</a>
                                    <a class="btn-arrow-up"><i class="fa fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="uw-l-img" ng-bind-html="itemUrl">
                        </div>
                        <div class="uw-l-title">
                            <font ng-bind="singles.itemTitle"></font>
                        </div>
                        <div class="uw-l-footer">
                            <div class="uwl-f-l">
                                <ul>
                                    <li>
                                        <img src="images/uwl-f-icon1.png"> <font ng-bind="singles.seeNums"></font>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="images/uwl-f-icon2.png"> <font ng-bind="singles.starNums"></font>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="uwl-f-r">
                                <span ng-bind="singles.startCountdown.substr(0,1)"></span><span ng-bind="singles.startCountdown.substr(1,1)"></span><b>:</b><span ng-bind="singles.startCountdown.substr(3,1)"></span><span ng-bind="singles.startCountdown.substr(4,1)"></span><b>:</b><span ng-bind="singles.startCountdown.substr(6,1)"></span><span ng-bind="singles.startCountdown.substr(7,1)"></span>
                            </div>
                        </div>
                        <div class="uw-l-data">
                            <div class="uwl-d-t">
                                <div class="uw-l-channel">
                                    <a href="m-popularity.html">
                                        進入花千骨頻道 <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                                <div class="uw-l-tag">
                                    <ul>
                                        <li>#扮裝</li>
                                        <li>#花千骨</li>
                                        <li>#古裝</li>
                                    </ul>
                                </div>
                            </div>
                            <p ng-bind="singles.itemSummary"></p>
                        </div>
                        <div class="ad-banner">
                            <a href=""><img src="images/testIMG/banner.jpg"></a>
                        </div>
                        <div class="uw-l-btns">
                            <ul>
                                <li class="uw-l-btn-1" data-toggle="modal" class="popup-btn2" data-target="#pop-ranking" ng-click="appFuncs.set_itemID(totalItem.contributionId, totalItem.starNums);"></li>
                                <li class="uw-l-btn-2">
                                    <a>留言</a>
                                </li>
                                <li class="uw-l-btn-3" data-toggle="modal" class="popup-btn3" data-target="#pop-share" ng-click="appFuncs.set_itemID(totalItem.contributionId, 0);">
                                    <a>分享</a>
                                </li>
                            </ul>
                        </div>
                        <div class="uw-l-comment">
                            <div class="uwl-c-header">
                                <!-- <a href="" class="active">
                                    站內 <span>32</span>
                                </a> -->
                                <a href="" class="active">
                                    Facebook
                                </a>
                            </div>
                            <div class="uwl-c-content" style="background-color: #fff;">
																<div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="5"></div>
                                <!-- <div class="comment-list">
                                    <div class="comment-l-img">
                                        <img src="images/testIMG/userphoto.jpg">
                                    </div>
                                    <div class="comment-l-data">
                                        <a href="">花花Flora</a><span>12-3　20:30</span>
                                        <p>
                                            花千骨百秒影展評論限定150字內
                                        </p>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="comment-l-img">
                                        <img src="images/testIMG/userphoto.jpg">
                                    </div>
                                    <div class="comment-l-data">
                                        <a href="">花花Flora</a><span>12-3　20:30</span>
                                        <p>
                                            花千骨百秒影展評論限定150字內
                                        </p>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="comment-l-img">
                                        <img src="images/testIMG/userphoto.jpg">
                                    </div>
                                    <div class="comment-l-data">
                                        <a href="">花花Flora</a><span>12-3　20:30</span>
                                        <p>
                                            花千骨百秒影展評論限定150字內
                                        </p>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="comment-l-img">
                                        <img src="images/testIMG/userphoto.jpg">
                                    </div>
                                    <div class="comment-l-data">
                                        <a href="">花花Flora</a><span>12-3　20:30</span>
                                        <p>
                                            花千骨百秒影展評論限定150字內
                                        </p>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="comment-l-img">
                                        <img src="images/testIMG/userphoto.jpg">
                                    </div>
                                    <div class="comment-l-data">
                                        <a href="">花花Flora</a><span>12-3　20:30</span>
                                        <p>
                                            花千骨百秒影展評論限定150字內
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="uwl-c-footer">
                                <input type="text" placeholder="寫下留言，分享您的感受">
                                <button>發送</button>
                            </div> -->
                        </div>
                    </div><!--uw-l-boxEND-->
                </div>
            </div>
        </div>
    </section>


    <!--ranking-popup-->
    <div class="modal fade" id="pop-ranking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="r-modal-header">
                    <div class="rmh-l">
                        評價此則作品
                    </div>
                    <div class="rmh-r">
                        <font ng-bind="singles.getStarNums"></font> / <b>100 ★</b><br>
                        <span>59:59</span>
                    </div>
                </div>
                <div class="r-modal-data">
                    <div class="rmd-star">
                        <form action="" class="sky-form">
                            <fieldset>
                                <section>
                                    <div class="rating">
                                        <input type="radio" name="quality" id="quality-1">
                                        <label for="quality-1"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-2">
                                        <label for="quality-2"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-3">
                                        <label for="quality-3"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-4">
                                        <label for="quality-4"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-5">
                                        <label for="quality-5"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-6">
                                        <label for="quality-6"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-7">
                                        <label for="quality-7"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-8">
                                        <label for="quality-8"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-9">
                                        <label for="quality-9"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-10">
                                        <label for="quality-10"><i class="icon-star"></i></label>
                                    </div>
                                </section>
                            </fieldset>
                        </form>
                    </div>
                    <p>
                        你可以給作者1~10顆星星，同時你也可以獲得等同星星數的達人幣，在作品發表24H內評價，作者可獲得<b>5倍星星數</b>，你也可以獲得<b>5倍星星數量的達人幣</b>，星星數每小時可補滿10顆，最高上限為100顆 !
                    </p>
                </div>
                <div class="r-modal-btns">
                    <a href="" class="btn-Y" onclick="send_star();">評價</a>
                    <a href="" class="btn-G" onclick="close_rank();">取消</a>
                </div>
            </div>
        </div>
    </div>

    <!--share-popup-->
    <div class="modal fade" id="pop-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="r-modal-header">
                    <div class="rmh-l">
                        選擇社群媒體分享
                    </div>
                </div>
                <div class="r-modal-data">
                    <ul class="rm-share">
                        <li><a href=""><img src="images/rm-share-1.svg" onclick="fb_share();"><span>Facebook</span></a></li>
                        <!-- <li><a href=""><img src="images/rm-share-2.svg"><span>Google+</span></a></li>
                        <li><a href=""><img src="images/rm-share-3.svg"><span>Twitter</span></a></li> -->
                        <li><a href="javascript:;" onclick="line_share();"><img src="images/rm-share-4.svg"><span>Line</span></a></li>
                        <!-- <li><a href=""><img src="images/rm-share-5.svg"><span>新浪微博</span></a></li>
                        <li><a href=""><img src="images/rm-share-6.svg"><span>Tumblr</span></a></li>
                        <li><a href=""><img src="images/rm-share-7.png" srcset="images/rm-share-7.png 1x, images/rm-share-7-2x.png 2x, images/rm-share-7-3x.png 3x"><span>Plurk</span></a></li>
                        <li><a href=""><img src="images/rm-share-8.svg"><span>Whatapp</span></a></li> -->
                        <li><a href=""><img src="images/rm-share-9.svg"><span>複製連結</span></a></li>
                    </ul>
                </div>
                <div class="r-modal-btns">
                    <a href="" class="btn-G" onclick="close_share();">取消</a>
                </div>
            </div>
        </div>
    </div>

    <!--report-popup-->
    <div class="modal fade" id="pop-report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="r-modal-header">
                    <div class="rmh-l">
                        為何檢舉這則作品，請輸入原因：
                    </div>
                </div>
                <div class="r-modal-data">
                    <textarea rows="4" placeholder=""></textarea>
                </div>
                <div class="r-modal-btns">
                    <a href="" class="btn-Y">送出</a>
                    <a href="" class="btn-G">取消</a>
                </div>
            </div>
        </div>
    </div>

		<div id="fb-root"></div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
		<script src="js/yconstants.js" type="text/javascript"></script>
		<script src="js/yglobal.js" type="text/javascript"></script>
		<script src="js/yfacebook.js" type="text/javascript"></script>
		<script src="js/ycontent.js" type="text/javascript"></script>
		<script src="js/yaglobal.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/JS.js"></script>
    <!-- owl carousel -->
    <script src="js/owl-carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
</body>
</html>
