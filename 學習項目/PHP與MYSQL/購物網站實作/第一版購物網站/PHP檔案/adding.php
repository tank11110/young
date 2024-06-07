<?php
  require_once('connect.php');
  $result = $link -> query("SELECT * FROM `user`");
  if (!$result) 
  {
    die($link->error);
  }
?>

<h2>註冊帳號密碼</h2>
<form method="POST" action="sprintf.php">
  帳號: <input name="username"><br>
  密碼: <input name="userphone"><br>
  <input type="submit" value="註冊">
</form>