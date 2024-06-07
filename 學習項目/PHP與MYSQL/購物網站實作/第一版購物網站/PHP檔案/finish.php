<?php
include 'connect.php';
session_start(); //開啟session
$result = $link -> query("INSERT user_order(name,goods_id,goods_name,goods_price,goods_num) 
SELECT name,goods_id,goods_name,goods_price,goods_num
FROM shop_cart");
echo "購買完成";
?>
