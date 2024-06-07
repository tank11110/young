<input type ="button" onclick="history.back()" value="回到購物車">
<?php
include 'connect.php';
$GET_id=$_GET["id"]; //透過session讀取要刪除的ID
$sql = $link -> query("DELETE FROM `shop_cart` WHERE id ='$GET_id'");
//刪除指定ID的資料列
echo $GET_id;
header("location:buy.php");  //回購物車頁面
?>