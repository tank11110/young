<?php
include("connect.php");
session_start();
if(isset($_POST["del_goods"]))
{
    $del_id=$_GET["id"];
    //echo $del_id;
    header("location:del_goods.php?del_id=$del_id");    
}
//$ch_id=$_GET["id"];
if(isset($_POST["ch_goods"]))
{
    $ch_id=$_GET["id"];
    $ch_type=$_POST['admin_update_type'];
    $ch_name=$_POST['admin_update_name'];
    $ch_num=$_POST['admin_update_num'];
    $ch_price=$_POST['admin_update_price'];
    /*
    echo "要改變的id：";
	echo $ch_id;
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
    header("location:update_goods.php?ch_id=$ch_id&ch_type=$ch_type&ch_name=$ch_name&ch_num=$ch_num&ch_price=$ch_price");  
}

?>