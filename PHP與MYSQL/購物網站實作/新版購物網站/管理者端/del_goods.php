<?php
include 'connect.php';
$del_id=$_GET["del_id"];
//echo $del_id;
$sql = $link -> query("DELETE FROM `goods` WHERE goods_id ='".$del_id."'");
header("location:shop.php");  //回購物車頁面
?>