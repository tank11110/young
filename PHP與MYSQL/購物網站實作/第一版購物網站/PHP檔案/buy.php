<?php
include 'connect.php';
session_start();
?>
<br>
<a style="font-size: 150%;color: red" href="buy.php">當前使用者：
<?php
if (isset($_SESSION['user_name'])) {
    echo $_SESSION['user_name'];
} else {
    echo '未登入';
}
?>
</a>
<a style="font-size: 150%;color: blue" href="shop_cart.php">購物車狀態</a>
<table border="1"  height="400px" width="400px">    
    <td style="font-size: 120%;color: blue;text-align: center">商品id</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品名字</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品數量</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品價格</td>
    <td style="font-size: 120%;color: blue;text-align: center">操作</td> 
    <?php
//讀取加入資料庫中的商品資訊
        $result = $link -> query("SELECT * FROM `shop_cart`");
        while ($row = $result->fetch_assoc()) 
        {?>
            <tr>
            <td><?php echo $row['goods_id']; ?></td>
            <td><?php echo $row['goods_name']; ?></td>
            <td><?php echo $row['goods_num']; ?></td>
            <td><?php echo $row['goods_price']; ?></td>
            <td><a href="del.php?id=<?php echo $row['id']; ?>">刪除</a></td>
    <?php } ?>
</table>
<input type ="button" onclick="history.back(-2)" value="回到商店"><br>
<a href="finish.php">結算購物車


</form>

<form ></form>