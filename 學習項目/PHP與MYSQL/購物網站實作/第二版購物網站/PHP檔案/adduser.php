<?php
  require_once('connect.php');
  $result = $link -> query("SELECT * FROM `user`");
  if (!$result) 
  {
    die($link->error);
  }
?>

<h2>註冊帳號密碼</h2>
<form method="POST" action="adding_user.php">
	帳號: <input name="user_name"><br>
	密碼: <input name="user_pwd">
	<input type="submit" value="註冊"><br>
	<br>
	<a href="login.php">登入帳號</a>
</form>