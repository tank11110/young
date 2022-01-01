<?php
include 'connect.php';
session_start(); //開啟session
$GET_user=$_SESSION['user_name'];
$result = $link ->query("INSERT into user_order(name,goods_id,goods_name,goods_price,goods_num) 
	SELECT name,goods_id,goods_name,goods_price,goods_num  FROM shop_cart WHERE name='$GET_user'");
$result1 = $link -> query("DELETE FROM shop_cart 
	WHERE name='$GET_user'");
echo "購買完成"."<br>";
?>
<a href="shop.php">回到商店</a>