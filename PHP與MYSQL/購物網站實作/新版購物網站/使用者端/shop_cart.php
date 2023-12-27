<?php
include 'connect.php';
session_start(); //開啟session
$sql = $link -> query("SELECT * FROM `shop_cart`");
$GET_user_name=$_SESSION['user_name'];
$GET_user_phone=$_SESSION['user_phone'];
$GET_goods_id = $_GET["goods_id"];     //從GET提交的資料提取goods_id
$GET_goods_type = $_GET["goods_type"];
$GET_goods_name = $_GET["goods_name"]; //從GET提交的資料提取goods_name
$GET_goods_price = $_GET["goods_price"];//從GET提交的資料提取goods_price
$quantity=1;
$goods_num=1;
$sql_buy_check=$link -> query("SELECT * FROM `shop_cart` WHERE phone='".$GET_user_phone."' AND goods_name ='".$GET_goods_name."'");
while ($output =$sql_buy_check->fetch_assoc()) //如果資料有回傳
{
    $check_row["goods_name"] = $output['goods_name'];
}
if(empty($check_row["goods_name"]))
{
	$sql = sprintf("insert into shop_cart(name,phone,goods_id,goods_type,goods_name,goods_price,goods_num) values('%s','%s','%s','%s','%s','%s','%s') ORDER BY id ASC",$GET_user_name,$GET_user_phone,$GET_goods_id,$GET_goods_type,$GET_goods_name,$GET_goods_price,$quantity);
	echo 'SQL:' . $sql . "<br>"; 
	$result = $link->query($sql);
	if (!$result)
	{
    	die($link->error);
	}
	echo "新增成功";
	header("location:buy.php");
}
else
{
	echo "<script>alert('已購買該商品，請修改商品數量！')</script>"; 
    header("Refresh:0;shop.php ");
}

?>
