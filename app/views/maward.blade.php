<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>領獎資料 / 達人秀擂台</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/m-award.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="js/angular.js"></script>
	<script src="js/yconstants.js"></script>
	<script src="js/yglobal.js"></script>
	<script src="js/t_constants.js"></script>
	<script src="js/t_award.js"></script>
</head>
<body ng-app="awardScope" ng-controller="awardScopeControl">
	<div class="wrapper">
		<div class="award">
			<div class="award-info">
				<div class="congratulation">
					恭喜！得獎者XXX：<br>
					您的作品(作品名稱)在本次24H挑戰賽達到了門檻！
				</div>
				<div class="money">
					獲得獎金500元！
				</div>
				<div class="link">
					<a target="_blank" href="https://www.google.com.tw/">
						https://www.google.com.tw/
					</a>
				</div>
			</div>
			<div class="user-info">
				<div class="note">
					以下領獎資料請確實填寫，若因資料填寫不完整，導致無法通知或收受獎品/獎金，將視同自願放棄領獎資格。詳請參閱領獎須知(超連結於此段文字)
				</div>
				<form class="account" action="">
					<p><span>真實姓名：</span><br><input class="name" type="text"></p>
					<p><span>身分證字號：</span><br><input class="ID" type="text"></p>
					<p><span>出生年月日：</span><br><input class="birthday" type="text" id="datepicker"></p>
					<p>
						<span>戶籍地址：</span><br>
						<select class="city_select"></select>
						<select class="town_select"></select>
						<input class="street" type="text">
					</p>
				</form>
				<div class="submit">送出</div>
			</div>
		</div>
	</div>
</body>
</html>
