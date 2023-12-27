<?php
include("connect.php");
session_start();
	$ch_id=$_GET['ch_id'];
	$ch_num=$_GET['ch_num'];
	$sql = "UPDATE shop_cart SET goods_num='".$ch_num."' WHERE id='".$ch_id."'";
	if(mysqli_query($link,$sql))
	{
  	//echo "id",$GET_id;
		echo "<script>alert('修改商品數量成功！')</script>";
  		Header("Refresh:0;buy.php ");
	}
	else
	{
		die("更新失敗!");
	}
?>