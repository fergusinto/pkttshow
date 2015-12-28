<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>搜尋結果 / 達人秀擂台</title>
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
<body class="b" ng-app="searchScope" ng-controller="searchScopeControl" style="display: none;">
    <div class="m-header">
        <div class="mh-t">
            <div class="m-logo">
                <a ng-href="<%indexPage%>">
                    <img src="images/logo.png" srcset="images/logo.png 1x, images/logo-2x.png 2x, images/logo-3x.png 3x">
                </a>
            </div>
            <ul class="mh-nav">
                <li class="mh-nav-search active"></li>
                <li class="mh-nav-assignment"><a href=""></a></li>
                <li class="mh-nav-giftcard"><a href=""></a></li>
            </ul>
        </div>

        <div class="search-bar active">
						<form action="<%searchPage%>" class="sky-form">
								<label>
										<input type="text" placeholder="大家都在搜尋：搞笑" name="qn" ng-value="searchDatas.string">
								</label>
						</form>
        </div>
    </div>

		<div class="m-menu" ng-hide="menuHide" mobile-menu></div>

    <section id="main" class="search">
        <div class="container">
            <div class="row">
                <div class="result-title">
                    搜尋<b ng-bind="searchDatas.string"></b>結果<span>共<%searchDatas.videoNums + searchDatas.imageNums%>筆 </span>
                </div>

                <div class="search-title">
                    <span>影片<b ng-bind="searchDatas.videoNums"></b></span>
                </div>
                <div class="uw-list small">
                    <div class="uw-l-box" ng-repeat="videoData in videoDatas">
                        <div class="uw-l-header">
                            <div class="uwl-h-l">
                                <img ng-src="<%videoData.uimage%>">
                                <div class="uwl-hl-data">
                                    <a href="javascript:;"><font ng-bind="videoData.name"></font></a>
                                </div>
                            </div>
                        </div>
                        <div class="uw-l-img">
                            <a ng-href="<%videoData.contentUrl%>">
                                <img ng-src="<%videoData.itemUrl%>" alt="">
                            </a>
                        </div>
                        <div class="uw-l-title">
                            <font ng-bind="videoData.itemTitle"></font>
                        </div>
                        <div class="uw-l-footer">
                            <div class="uwl-f-l">
                                <ul>
                                    <li><font ng-bind="videoData.seeNums"></font></li>
                                    <li><font ng-bind="videoData.starNums"></font></li>
                                </ul>
                            </div>
                            <div class="uwl-f-r">
                                <span><%videoData.startCountdown%></span>
                            </div>
                        </div>
                    </div><!--uw-l-boxEND-->
                </div>


                <div class="search-title">
                    <span>圖片<b ng-bind="searchDatas.imageNums"></b></span>
                </div>
                <div class="uw-list small">
                    <div class="uw-l-box" ng-repeat="imageData in imageDatas">
												<div class="uw-l-header">
														<div class="uwl-h-l">
																<img ng-src="<%imageData.uimage%>">
																<div class="uwl-hl-data">
																		<a href="javascript:;"><font ng-bind="imageData.name"></font></a>
																</div>
														</div>
												</div>
												<div class="uw-l-img">
														<a ng-href="<%imageData.contentUrl%>">
																<img ng-src="<%imageData.itemUrl%>" alt="">
														</a>
												</div>
												<div class="uw-l-title">
														<font ng-bind="imageData.itemTitle"></font>
												</div>
												<div class="uw-l-footer">
														<div class="uwl-f-l">
																<ul>
																		<li><font ng-bind="imageData.seeNums"></font></li>
																		<li><font ng-bind="imageData.starNums"></font></li>
																</ul>
														</div>
														<div class="uwl-f-r">
																<span><%imageData.startCountdown%></span>
														</div>
												</div>
                    </div><!--uw-l-boxEND-->
                </div>


                <div class="search-title">
                    <span>用戶<b ng-bind="affected_people_num"></b></span>
                </div>
                <div class="rank-list rank-3">
                    <div class="rl-box" ng-repeat="affected_people in affected_peoples track by $index">
                        <div class="rl-img">
                            <a href="javascript:;">
                                <img ng-src="<%affected_people.uimage%>">
                            </a>
                        </div>
                        <div class="rl-data">
                            <span>
                                <a href="javascript:;">
                                    <font ng-bind="affected_people.name"></font>
                                </a>
                            </span>
                        </div>
                        <div class="rl-ranking">
                            <span><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div><!--rl-box-->
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
    <div class="modal fade" id="pop-ranking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="r-modal-header">
                    <div class="rmh-l">
                        評價此則作品
                    </div>
                    <div class="rmh-r">
                        80 / <b>100 ★</b><br>
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
                    <a href="" class="btn-Y">評價</a>
                    <a href="" class="btn-G">取消</a>
                </div>
                <!--div class="r-modal-data">
                    感謝您的評價！恭喜您獲得15達人幣！
                </div>
                <div class="r-modal-btns">
                    <a href="" class="btn-Y">確認</a>
                </div-->
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
		<script src="js/yconstants.js" type="text/javascript"></script>
		<script src="js/yglobal.js" type="text/javascript"></script>
		<script src="js/yfacebook.js" type="text/javascript"></script>
		<script src="js/ysearch.js" type="text/javascript"></script>
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
