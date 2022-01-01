<?php
include 'connect.php';
session_start();
$GET_user=$_SESSION['user_name'];
?>
<br>
<a style="font-size: 150%;color: red" >當前使用者：
<?php
if (isset($_SESSION['user_name'])) {
    echo $_SESSION['user_name'];
} else {
    echo '未登入';
}
?>
</a><br><br>
<a style="font-size: 200%;color: blue">購物車  </a>
<br>
<table border="1"  height="400px" width="400px">
<br>    
    <td style="font-size: 120%;color: blue;text-align: center">商品id</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品名字</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品數量</td>
    <td style="font-size: 120%;color: blue;text-align: center">商品價格</td>
    <td style="font-size: 120%;color: blue;text-align: center">操作</td> 
    <?php
//讀取加入資料庫中的商品資訊
        $result = $link -> query("SELECT * FROM `shop_cart` Where name='$GET_user'");
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
<br>
<a href="shop.php">回到商店</a>
<a>/</a>
<a href="finish.php">結算購物車</a>
</form>