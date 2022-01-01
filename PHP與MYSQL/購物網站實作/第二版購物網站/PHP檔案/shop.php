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
        Header("Refresh:0;login.php ");
    }
?>
<a href="logout.php">(登出)</a><br>
<br>
<a style="font-size: 200%;color: blue;text-align: center">商品展示</a><br>
<table border="1"  height="400px" width="400px">
<br>
<br>    
    <td style="font-size: 120%;color: blue;text-align: center">商品id</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品名稱</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品數量</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品價格</td>
    <td style="font-size: 120%;color: blue;text-align: center">操作</td>  
    <?php
        $result = $link -> query("SELECT * FROM `goods` order by `goods_id`");
        while ($row = $result->fetch_assoc()) 
        {?>
            <tr>
            <td><?php echo $row['goods_id']; ?></td>
            <td><?php echo $row['goods_name']; ?></td>
            <td><?php echo $row['goods_num']; ?></td>
            <td><?php echo $row['goods_price']; ?></td>
            <td style="font_size:150%;color: red;text-align:center" >
            <a href="shop_cart.php?goods_id=<?php echo $row['goods_id']; ?>&goods_name=<?php echo $row['goods_name']; ?>&goods_num=<?php echo $row['goods_num']; ?>&goods_price=<?php echo $row['goods_price']; ?>">購買</a>
            </td>
            <tr>    
<?php } ?>
</table>
<a href="buy.php">查看購物車</a>