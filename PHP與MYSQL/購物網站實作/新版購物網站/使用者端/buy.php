<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>早餐店購物車</title>
</head>
<body>
<?php
include("connect.php");
session_start();
$GET_user_phone=$_SESSION['user_phone'];
?>
<br>
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
</div><br>
<?php
//隱藏 '測試1' 按鈕.
$hide = false;
?>
</a><br><br>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<a style="font-size: 200%;color: blue">購物車  </a>
<br>


<table border="1"  style="height:100%; width:100%;">
<br>    
    <td style="font-size: 120%;color: blue;text-align: center">商品類別</td>
    <td style="font-size: 120%;color: blue;text-align: center">名稱</td>
    <td style="font-size: 120%;color: blue;text-align: center">價格</td>
    <td style="font-size: 120%;color: blue;text-align: center">數量</td>
    <td style="font-size: 120%;color: blue;text-align: center">操作</td> 
    <?php
        //$result = $link -> query("SELECT * FROM `shop_cart` Where phone='".$GET_user_phone."' order by `goods_type`");
        $sql = "SELECT * FROM `shop_cart` Where phone='$GET_user_phone' order by `goods_type`";
        $sql_result=mysqli_query($link,$sql);
        $total_fields=mysqli_num_fields($sql_result);
        $cost_sum=0;
        if(isset($_POST["update"]))
        {
            $hide = true;
        }
        if(isset($_POST["update_done"]))
        {
            $hide = false;
        }
        while($rows=mysqli_fetch_array($sql_result,MYSQLI_NUM))
        {
            echo "<tr>";
            for ($i=0; $i<=$total_fields-1 ; $i++) 
            {
    ?>
    <form method="post" action="switch_buy.php?id=<?php echo $rows[0]; ?>">
            <?php
                if ($i==4||$i==5||$i==6||$i==7)
                {
                    if($i==7)
                    {
                        echo "<td>";
                        if($hide==false)
                        {
                            echo $rows[$i];
                        }
                        else
                        {
                            echo '<input type="number" name="up_num" min="1" value="'.$rows[$i].'">';
                        }
                        echo "</td>";
                    }
                    else
                    {
                        echo "<td>".$rows[$i]."</td>";
                    }
                }
            }
            $cost_sum=$cost_sum+($rows[6]*$rows[7]); 

        ?>
        <td>
            <?php
                if($hide)
                {
            ?>
                    <input type="submit" name="del_id" value="刪除">
                    <input type="submit" name="ch_num" value="送出">
            <?php } ?>
        </td>
        </tr>
        </form>
    <?php  } ?>
</table>

<?php echo "總金額：" ?>
<?php echo $cost_sum ?>
<?php echo "<br>" ?>

<form action="buy.php" method="post">
<input type="submit" value="修改商品"  name="update">
<?php
    if($hide)
    {
?>
        <input type="submit" value="修改完成"  name="update_done">   
<?php } ?>
</form>
<form>
<input type="button" value="回到商店" onclick="location.href='shop.php?'">
</form>
<form action="finish.php" method="post">
<?php
    if(!$hide)
    {
?>
        <input type="submit" value="結算購物車" name="user_buy">
<?php } ?>
</form>
</form>

</body>
</html>
