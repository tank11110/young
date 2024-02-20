<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06170135張定洋</title>
</head>
<body>
<?php
  include("connect.php"); //連線到資料庫
  $user_name='';
  $user_phone='';
  $user_pwd='';
  if(isset($_POST["insert"]))
  {
    if (empty($_POST['user_phone'])) //如果輸入為"空"的時候
    {
      echo "<script>alert('請輸入 帳號(手機號碼)！')</script>";
      Header("Refresh:0;add_user.php ");
      die;
    }
    if (empty($_POST['user_name'])) 
    {
      echo "<script>alert('請輸入 姓名！')</script>";
      Header("Refresh:0;add_user.php ");
      die;
    }
    if (empty($_POST['user_pwd'])) 
    {
      echo "<script>alert('請輸入 密碼！')</script>";
      Header("Refresh:0;add_user.php ");
      die;
    }
    $user_phone = $_POST['user_phone'];
    $user_name = $_POST['user_name'];
    $user_pwd = $_POST['user_pwd'];
    //$bookprice = $_POST['book_price'];
    //$bookauthor = $_POST['book_author'];
    $sql_check_phone = "SELECT * FROM `user` Where phone='".$user_phone."'";
    $result=mysqli_query($link,$sql_check_phone);
    if(mysqli_num_rows($result)==0)
    {
      $sql1 = "INSERT INTO user(name,password,phone) VALUES ('".$user_name."','".$user_pwd."','".$user_phone."')";
      if(mysqli_query($link,$sql1))
      {
        echo "<script>alert('註冊成功！')</script>";
        Header("Refresh:0;user_login.php "); //登入成功則跳轉到商店頁面
      }
      else
      {
        //echo "<script>alert('註冊失敗！')</script>";
        //Header("Refresh:0;login.php ");
        die('註冊失敗!');  
      }
    }
    else
    {
      echo "<script>alert('已有相同的帳號(手機號碼)，請重新註冊!')</script>";
      Header("Refresh:0;add_user.php ");
      //echo"已有相同的帳號，請重新註冊!";
    }

  }
?>

<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<table border=1 style="width:100%;">
<h1>請填寫使用者資料：</h1>
<form method="POST" action="add_user.php">
  <tr><td>帳號(手機號碼)： <input type="text" maxlength="10" oninput="value=value.replace(/[^\d]/g,'')" name="user_phone"></td></tr>
  <tr><td>姓名： <input name="user_name"></td></tr>
  <tr><td>密碼： <input name="user_pwd"></td></tr>
  <tr><td><input type="submit" value="註冊" name="insert"></td></tr>
  <br>
</form>
</table>
<br>

<button onclick="location.href='user_login.php'">回到登入</button>

</body>
</html>