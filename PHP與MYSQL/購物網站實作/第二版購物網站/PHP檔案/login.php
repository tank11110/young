<html>
<head>
<meta charset="utf-8"/>
<title>使用者登陸</title>
</head>
<body>
    <h1>請進行使用者登入：</h1>
<form name="myform" method="POST" action="check_login.php">
	帳號：<input type="text" name="user_name" value="" /><br>
	密碼：<input type="password" name="user_pwd" value="" >
	<input type="submit" name="sub" value="登入" /><br>
	<br/>
	<a>沒有帳號密碼嗎?</a><br/>
	<a href="adduser.php">註冊帳號</a>
</form>
</body>
</html>