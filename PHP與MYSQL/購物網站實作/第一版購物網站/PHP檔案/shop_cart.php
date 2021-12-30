<input type ="button" onclick="history.back()" value="回到商店">
<?php
include 'connect.php';
session_start(); //開啟session
$sql = $link -> query("SELECT * FROM `shop_cart`");
$GET_user=$_SESSION['user_name'];//從session提取goods_name
$GET_id = $_GET["goods_id"];     //從GET提交的資料提取goods_id
$GET_name = $_GET["goods_name"]; //從GET提交的資料提取goods_name
$GET_price = $_GET["goods_price"];//從GET提交的資料提取goods_price
$goods_num=1;
$sql = sprintf("insert into shop_cart(name,goods_id,goods_name,goods_price,goods_num) values('%s','%s','%s','%s','%s') ORDER BY id ASC",$GET_user,$GET_id,$GET_name,$GET_price,$goods_num);
//用sprintf的方式傳送資料
echo 'SQL:' . $sql . "<br>"; 
$result = $link->query($sql);
if (!$result)
{

    die($link->error);
}
echo "新增成功";
header("location:buy.php")
//$_SESSION['user_shop_cart']=array('goods_id'=> $GET_id,'goods_name'=> $GET_name,'goods_num'=>1,'goods_price' => $GET_price);
//$arr = $_SESSION['user_shop_cart'];

//$_SESSION['user_shop_cart'] = $arr;
//print_r($_SESSION['user_shop_cart']);
?>
