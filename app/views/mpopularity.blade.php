<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>影片大圖模式 / 花千骨臉書人氣王 / 達人秀擂台</title>
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
<body class="b co" ng-app="popularityScope" ng-controller="popularityScopeControl" style="display: none;">
    <div class="m-header">
        <div class="co-marquee">
            <ul id="marquee1" class="marquee">
							<li ng-repeat="totalPushNotice in totalPushNotices track by $index">
									恭喜<span ng-bind="totalPushNotice.name"></span><%totalPushNotice.summary%> <%totalPushNotice.prize%>
							</li>
            </ul>
        </div>

        <div class="menu-purple">
            <h3>花千骨臉書人氣王</h3>
            <div class="mp-r">
                <ul class="mh-nav">
                    <li class="mh-nav-search"></li>
                    <li class="mh-nav-assignment"><a href=""></a></li>
                    <li class="mh-nav-giftcard"><a href=""></a></li>
                </ul>
            </div>
        </div>

        <div class="search-bar">
						<form action="<%searchPage%>" class="sky-form">
								<label>
										<input type="text" placeholder="大家都在搜尋：搞笑" name="qn">
								</label>
						</form>
        </div>
    </div>

    <div class="m-menu" ng-hide="menuHide" mobile-menu></div>

    <section id="main" class="popularity">
        <div class="container">
            <div class="row">
                <nav class="popularity-nav">
                    <ul file-type></ul>
                </nav>

                <nav class="menu-b">
                    <div class="menub-more"><i class="fa fa-caret-right"></i></div>
                    <ul channel-type></ul>
                </nav>

                <div class="co-filter" rank-type></div>

                <div class="uw-list big">
                    <div class="uw-l-box" ng-repeat="totalItem in totalItems track by $index">
                        <div class="uw-l-header">
                            <div class="uwl-h-l">
                                <img ng-src="<%totalItem.uimage%>">
                                <div class="uwl-hl-data">
                                    <a href=""><font ng-bind="totalItem.name"></font></a><br>
                                    <span ng-bind="totalItem.createTime"></span>
                                </div>
                            </div>
                            <div class="uwl-h-r">
                                <div class="uw-l-follow">
                                    <div class="btn-follow-no">
                                        <i class="fa fa-plus"></i> <span>追蹤</span>
                                    </div>
                                    <a class="btn-arrow-down">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </div>
                                <div class="uw-l-report">
                                    檢舉作品<a class="btn-arrow-up"><i class="fa fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="uw-l-img">
                            <a ng-href="<%totalItem.contentUrl%>">
                                <img ng-src="<%totalItem.itemUrl%>" alt="">
                            </a>
                        </div>
                        <div class="uw-l-title">
                            <font ng-bind="totalItem.itemTitle"></font>
                        </div>
                        <div class="uw-l-footer">
                            <div class="uwl-f-l">
                                <ul>
                                    <li><font ng-bind="totalItem.seeNums"></font></li>
                                    <li><font ng-bind="totalItem.starNums"></font></li>
                                </ul>
                            </div>
                            <div class="uwl-f-r">
                                <span ng-bind="totalItem.startCountdown.substr(0,1)"></span><span ng-bind="totalItem.startCountdown.substr(1,1)"></span><b>:</b><span ng-bind="totalItem.startCountdown.substr(3,1)"></span><span ng-bind="totalItem.startCountdown.substr(4,1)"></span><b>:</b><span ng-bind="totalItem.startCountdown.substr(6,1)"></span><span ng-bind="totalItem.startCountdown.substr(7,1)"></span>
                            </div>
                        </div>
                        <div class="uw-l-btns">
                            <ul>
                                <li class="uw-l-btn-1" data-toggle="modal" class="popup-btn2" data-target="#pop-ranking" ng-click="appFuncs.set_itemID(totalItem.contributionId, totalItem.starNums);"></li>
                                <li class="uw-l-btn-2">
                                    <a href="<%totalItem.contentUrl%>">留言</a>
                                </li>
                                <li class="uw-l-btn-3" data-toggle="modal" class="popup-btn3" data-target="#pop-share" ng-click="appFuncs.set_itemID(totalItem.contributionId, 0)">
                                    <a>分享</a>
                                </li>
                            </ul>
                        </div>
                    </div><!--uw-l-boxEND-->
                </div>
            </div>
        </div>
    </section>


    <!--upload-popup-->
    <div class="modal animated fadeInUp" id="pop-upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <i class="fa fa-times" data-dismiss="modal" aria-label="Close"></i>
            <div class="modal-body"></div>
        </div>
    </div>

    <!--ranking-popup-->
    <div class="modal fade starScope" id="pop-ranking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="r-modal-header">
                    <div class="rmh-l">
                        評價此則作品
                    </div>
                    <div class="rmh-r">
                        <font ng-bind="getStarNums"></font> / <b>100 ★</b><br>
                        <span>59:59</span>
                    </div>
                </div>
                <div class="r-modal-data">
                    <div class="rmd-star">
                        <form action="" class="sky-form">
                            <fieldset>
                                <section>
                                    <div class="rating">
                                        <input type="radio" name="quality" id="quality-1" value='10'>
                                        <label for="quality-1"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-2" value='9'>
                                        <label for="quality-2"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-3" value='8'>
                                        <label for="quality-3"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-4" value='7'>
                                        <label for="quality-4"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-5" value='6'>
                                        <label for="quality-5"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-6" value='5'>
                                        <label for="quality-6"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-7" value='4'>
                                        <label for="quality-7"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-8" value='3'>
                                        <label for="quality-8"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-9" value='2'>
                                        <label for="quality-9"><i class="icon-star"></i></label>
                                        <input type="radio" name="quality" id="quality-10" value='1'>
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
                    <a href="javascript:;" class="btn-Y" onclick="send_star();">評價</a>
                    <a href="javascript:;" class="btn-G" onclick="close_rank();">取消</a>
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
                    <a href="javascript:;" class="btn-G" onclick="close_share();">取消</a>
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


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
		<script src="js/yconstants.js" type="text/javascript"></script>
		<script src="js/yglobal.js" type="text/javascript"></script>
		<script src="js/yfacebook.js" type="text/javascript"></script>
		<script src="js/ypopularity1.js" type="text/javascript"></script>
		<script src="js/yaglobal.js" type="text/javascript"></script>
		<!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/JS.js"></script>
    <!-- owl carousel -->
    <script src="js/owl-carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <!--- marquee -->
    <script type="text/javascript" src="js/marquee/jquery.marquee.js"></script>
</body>
</html>
