<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>早餐店</title>
</head>
<body>
<?php
    include 'connect.php';
    session_start();
?>
<br>
<a style="font-size: 150%;color: red" >當前使用者：
<?php
    if(isset($_SESSION['user_name']))
    {
        echo $_SESSION['user_name'];
    }
    else
    {
        echo "<script>alert('尚未登入！  請先登入再使用本商店')</script>";
        Header("Refresh:0;user_login.php ");
        die;
    }
?>
<a href="user_logout.php">(登出)</a><br>
<br>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<a style="font-size: 200%;color: blue;text-align: center">早餐店</a><br>


<form method="post" action="shop_type.php">
請選取類別
<select name="choose_type">
    <option>全部</option>
    <option>漢堡</option>
    <option>炸物</option>
    <option>飲料</option>
</select>
<input type="submit" value="選取">
</form>
<?php
    $GET_type="全部";
    if(isset($_GET["type"]))
    {
        $GET_type=$_GET["type"];
    }
?>

<table border="1"  style="height:100%; width:100%;">
<br>
<br>    
    <td style="width:30%; font-size: 120%;color: blue;text-align: center">商品類別</td>
    <td style="width:30%; font-size: 120%;color: blue;text-align: center">名稱</td>
    <td style="width:30%; font-size: 120%;color: blue;text-align: center">價格</td>
    <td style="width:30%; font-size: 120%;color: blue;text-align: center">數量</td>
    <td style="width:30%; font-size: 120%;color: blue;text-align: center">操作</td>  
    <?php
        if($GET_type=="全部")
        {
            $result = $link -> query("SELECT * FROM `goods` order by `goods_type`");
        }
        else
        {
            $result = $link -> query("SELECT * FROM `goods` WHERE `goods_type`='".$GET_type."'");
        }
        while ($row = $result->fetch_assoc())
        //&goods_num=<?php echo $quantity; 
        {?>
            <tr>
            <td><?php echo $row['goods_type']; ?></td>
            <td><?php echo $row['goods_name']; ?></td>
            <td><?php echo $row['goods_price']; ?></td>
            <td><?php echo $row['goods_num']; ?></td>
            <td style="font_size:150%;color: red;text-align:center" >
            <form method="POST" action="shop_cart.php?goods_id=<?php echo $row['goods_id']; ?>&goods_type=<?php echo $row['goods_type']; ?>&goods_name=<?php echo $row['goods_name']; ?>&goods_price=<?php echo $row['goods_price'];?>" name="table">
            <input type="submit" value="購買" name="action" ></a>
            </form> 
            </td>
            <tr>    
<?php } ?>
</table>

<button onclick="location.href='buy.php'">查看購物車</button>
<button onclick="location.href='buyfin.php'">查看訂單</button>

</body>
</html>