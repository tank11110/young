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
<div style="margin-left: 250px;font-size: 150%;color: red" >當前使用者：
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
<a href="user_logout.php">(登出)</a>
</div>
<br>
<?php
//隱藏 '測試1' 按鈕.
$hide = false;
?>

<br>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<a style="font-size: 200%;color: blue;text-align: center">早餐店資料</a><br>

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
    /*
    echo"if外";
    echo"<br>";
    echo $GET_type;
    echo"<br>";
    */
?>

<table border="1"  style="height:100%; width:100%;">
<br>
<br>    
    <td style="width:20%; font-size: 120%;color: blue;text-align: center">商品類別</td>
    <td style="width:50%%; font-size: 120%;color: blue;text-align: center">名稱</td>
    <td style="width:10%; font-size: 120%;color: blue;text-align: center">價格</td>
    <td style="width:10%; font-size: 120%;color: blue;text-align: center">數量</td>
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
        //$sql = "SELECT * FROM `shop_cart` Where phone='$GET_user_phone' order by `goods_type`";
        //$resulttest=mysqli_query($link,$sql);
        $total_rows=mysqli_num_rows($result);
        $total_fields=mysqli_num_fields($result);
        echo "商品數量：";
        echo $total_rows;
        echo"<br>";
        if(isset($_POST["update"]))
        {
            $hide = true;
        }
        if(isset($_POST["update_done"]))
        {
            $hide = false;
        }
        while($rows=mysqli_fetch_array($result,MYSQLI_NUM))
        {
            echo "<tr>";
            for ($i=0; $i<=$total_fields-1 ; $i++) 
            {
    ?>
    <form method="post" action="switch_del_ch.php?id=<?php echo $rows[0]; ?>">
            <?php
                if ($i==1||$i==2||$i==3||$i==4)
                {
                    //if($i==4)
                    //{
                        echo "<td>";
                        if($hide==false)
                        {
                            echo $rows[$i];
                        }
                        else
                        {
                            if($i==1)
                            {
                                echo '<input type="text" name="admin_update_type" style="width:80px;" value="'.$rows[$i].'">';
                            }
                            if($i==2)
                            {
                                echo '<input type="text" name="admin_update_name" style="width:150px;" value="'.$rows[$i].'">';
                            }
                            if($i==3)
                            {
                                echo '<input type="number" name="admin_update_price" min="1" style="width:50px;" value="'.$rows[$i].'">';
                            }
                            if($i==4)
                            {
                                echo '<input type="number" name="admin_update_num" style="width:50px;" min="1" value="'.$rows[$i].'">';
                            }
                        }
                        echo "</td>";
                    //}
                    //else
                    //{
                        //echo "<td>".$rows[$i]."</td>";
                    //}
                }
            } 

        ?>
        <td>
            <?php
                if($hide)
                {
            ?>
                    <input type="submit" name="del_goods" value="刪除">
                    <input type="submit" name="ch_goods" value="送出">
            <?php } ?>
        </td>
        </tr>
        </form>
    <?php  } ?>
</table>

<form action="shop.php" method="post">
<?php
    if($hide)
    {
?>
    <input type="submit" value="修改完成"  name="update_done">   
<?php 
    } 
    else
    {
?>
    <input type="submit" value="調整商品"  name="update">        

<?php } ?>
</form>




<form action="add_goods.php" method="post">
<?php
    if(!$hide)
    {
?>
    <input type="submit" value="上架商品" name="add_goods">
<?php } ?>
</form>

<form action="switch_user_order.php" method="post">
<?php
    if(!$hide)
    {
?>
    <input type="submit" value="查看未處理訂單" name="user_order">
    <input type="submit" value="查看已處理訂單" name="user_order">
<?php } ?>
</form>

</body>
</html>