<html>
<head>
<meta charset="utf-8"/>
<title>使用者登陸</title>
</head>
<body>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<h1>請進行管理者登入：</h1>
<form name="myform" method="POST" action="check_login.php">
	帳號：<input type="text" name="user_acc" value="" /><br>
	密碼：<input type="password" name="user_pwd" value=""><br>
	<input type="submit" name="login" value="登入" /><br>
	<br/>
</form>
</body>
</html>