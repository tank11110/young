<?php
  include 'connect.php'; //連線到資料庫
  $sql = $link -> query("SELECT * FROM `user`");
  if (empty($_POST['user_name'])) //如果輸入為"空"的時候
  {
    die('請輸入 帳號');
  }
  if (empty($_POST['user_pwd'])) 
  {
    die('請輸入 密碼');
  }
  $username = $_POST['user_name'];
  $userpass = $_POST['user_pwd'];
  $sql = sprintf("insert into user(name,password) values('%s','%s') ORDER BY id ASC",$username,$userpass);
  //用sprintf將資料傳送到指定的欄位(name,password)中，值分別為username，userpass


  //echo 'SQL:' . $sql . "<br>";(測試用)  將輸入的值echo出來確認值正確
  $result = $link->query($sql);
  if (!$result) 
  {
    die($link->error);
  }
  echo "新增成功!"."<br>"."<br>"; //如果新增成功
?>
<input type ="button" onclick="history.back()" value="回到上一頁"> 