<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06170135張定洋-新增商品</title>
</head>
<body>

<?php
  include("connect.php"); //連線到資料庫
  $goods_type='';
  $goods_name='';
  $goods_price='';
  $goods_num='';
  if(isset($_POST["adding"]))
  {
    if (empty($_POST['goods_type']))
    {
      echo "<script>alert('請輸入 商品類別！')</script>";
      Header("Refresh:0;add_goods.php ");
      die;
    }
    if (empty($_POST['goods_name'])) 
    {
      echo "<script>alert('請輸入 商品名稱！')</script>";
      Header("Refresh:0;add_goods.php ");
      die;
    }
    /*
    if (empty($_POST['goods_price'])) 
    {
      echo "<script>alert('請輸入 商品價格！')</script>";
      Header("Refresh:0;add_goods.php ");
    }
    if (empty($_POST['goods_num'])) 
    {
      echo "<script>alert('請輸入 商品數量！')</script>";
      Header("Refresh:0;add_goods.php ");
    }
    */

    $goods_type = $_POST['goods_type'];
    $goods_name = $_POST['goods_name'];
    $goods_price = $_POST['goods_price'];
    $goods_num = $_POST['goods_num'];

    $sql_add_goods = "INSERT INTO goods(goods_type,goods_name,goods_price,goods_num) VALUES ('".$goods_type."','".$goods_name."','".$goods_price."','".$goods_num."')";
    if(mysqli_query($link,$sql_add_goods))
    {
      echo "<script>alert('商品上架成功！')</script>";
      Header("Refresh:0;shop.php "); //登入成功則跳轉到商店頁面
      die;
    }
    else
    {
        //echo "<script>alert('註冊失敗！')</script>";
        //Header("Refresh:0;login.php ");
      die('註冊失敗!');  
    }
  }
?>
<?php
    include 'connect.php';
    session_start();
?>
<br>
<a style="font-size: 150%;color: red" >當前管理者：
<?php
    if(isset($_SESSION['user_name']))
    {
        echo $_SESSION['user_name'];
    }
    else
    {
        echo "<script>alert('尚未登入！  請先登入再使用本功能')</script>";
        Header("Refresh:0;login.php ");
        die;
    }
?>
<a href="admin_logout.php">(登出)</a><br>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<a style="font-size: 200%;color: blue;text-align: center">請填寫上架商品資料</a><br>
<table border=1 style="width:100%;">
<form method="POST" action="add_goods.php">
  <tr><td>商品類別： <input type="text" name="goods_type"></td></tr>
  <tr><td>商品名稱： <input type="text" name="goods_name"></td></tr>
  <tr><td>商品價格： <input type="number" min="1" name="goods_price" value="1"></td></tr>
  <tr><td>商品數量： <input type="number" min="1" name="goods_num" value="1"></td></tr>
  <tr><td><input type="submit" value="上架" name="adding"></td></tr>
</form>
</table>

<button onclick="location.href='shop.php'">回到主畫面</button>
</body>
</html>