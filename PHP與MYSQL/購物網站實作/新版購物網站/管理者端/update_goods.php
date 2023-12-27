<?php
include("connect.php");
session_start();
	$ch_id=$_GET["ch_id"];
    $ch_type=$_GET["ch_type"];
    $ch_name=$_GET["ch_name"];
    $ch_num=$_GET["ch_num"];
    $ch_price=$_GET["ch_price"];
	/*
	echo "要改變的id：";
	echo $ch_id;
	echo "<br>";
	echo "改變後type：";
    echo $ch_type;
	echo "<br>";
	echo "改變後name：";
    echo $ch_name;
	echo "<br>";
	echo "改變後price：";
    echo $ch_num;
	echo "<br>";
	echo "改變後num：";
    echo $ch_price;
	echo "<br>";
    */
    
	$update_sql = "UPDATE goods SET goods_type='".$ch_type."',goods_name='".$ch_name."',goods_price='".$ch_price."',goods_num='".$ch_num."' WHERE goods_id='".$ch_id."' ";
	if(mysqli_query($link,$update_sql))
	{
  	//echo "id",$GET_id;
		echo "<script>alert('修改商品資料成功！')</script>";
  		Header("Refresh:0;shop.php");
  		die;
	}
	else
	{
		die("更新失敗!");
	}
	
?>