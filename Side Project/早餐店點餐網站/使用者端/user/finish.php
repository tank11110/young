<?php
include 'connect.php';
session_start(); //開啟session
$GET_user_phone=$_SESSION['user_phone'];
if(isset($_POST["user_buy"]))
{
	$user_cart_arr=[];
    $user_cart = $link -> query("SELECT * FROM `shop_cart` WHERE phone='".$GET_user_phone."' order by goods_num DESC  ");
    $total_fields=mysqli_num_fields($user_cart);
	while($buy_rows=mysqli_fetch_array($user_cart,MYSQLI_NUM))
    {
        array_push($user_cart_arr, $buy_rows);
    }
    //print_r($user_cart_arr);
    $count_arr=count($user_cart_arr);
    for($i=0;$i<$count_arr;$i++)
    {
        $user_buy_goodname=$user_cart_arr[$i][5];
        $user_buy_num=$user_cart_arr[$i][7];
        $shop = $link -> query("SELECT goods_num FROM `goods` WHERE goods_name='".$user_buy_goodname."'");
        while($shop_row=mysqli_fetch_array($shop,MYSQLI_NUM))
        {
            $shop_num=$shop_row[0];
            echo $shop_num;
            echo "<br>";
            if($shop_num<$user_buy_num)
            {
                echo "<script>alert('商品數量不足  請重新購買！')</script>";
                header("Refresh:0;buy.php ");
                die;
            }
            else
            {
                $copy_result = $link ->query("INSERT into user_order(name,phone,goods_id,goods_type,goods_name,goods_price,goods_num) SELECT name,phone,goods_id,goods_type,goods_name,goods_price,goods_num FROM shop_cart WHERE phone='".$GET_user_phone."'"); 
                $shop_update_num = "UPDATE goods SET goods_num=$shop_num-$user_buy_num WHERE goods_name='".$user_buy_goodname."'";
                mysqli_query($link,$shop_update_num);
                $clean_result = $link -> query("DELETE FROM shop_cart WHERE phone='$GET_user_phone'");         
            } 
        }
    }
    echo "<script>alert('購買成功！')</script>";
    Header("Refresh:0;shop.php ");
}
?>