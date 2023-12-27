<html>
<head>
<meta charset="utf-8"/>
<title>使用者登陸</title>
</head>
<body>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<h1>請進行使用者登入：</h1>
<form name="myform" method="POST" action="check_login.php">
	手機號碼：<input type="text" maxlength="10" oninput="value=value.replace(/[^\d]/g,'')" name="user_phone" value="" /><br>
	密碼：<input type="password" name="user_pwd" value="" ><br>
	<input type="submit" name="login" value="登入" /><br>
	<br/>
	<a>沒有帳號密碼嗎?   >></a>
	<a href="add_user.php">註冊帳號</a>
	<a><<</a><br>
</form>
</body>
</html>