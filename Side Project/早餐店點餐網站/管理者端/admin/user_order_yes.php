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
?>
<br>
<a style="font-size: 150%;color: red" >當前管理者：
<?php
    if(isset($_SESSION['user_name']))
    {
        echo $_SESSION['user_name'];
    }
    else
    {
        echo "<script>alert('尚未登入！  請先登入再使用本功能')</script>";
        Header("Refresh:0;admin_login.php ");
        die;
    }
?>
<a href="admin_logout.php">(登出)</a><br>
</a><br><br>
<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
<a style="font-size: 200%;color: blue">已處理訂單</a>
<br>


<table border="1"  style="height:100%; width:100%;">
<br>    
    <td style="font-size: 120%;color: blue;text-align: center">商品類別</td>
    <td style="font-size: 120%;color: blue;text-align: center">名稱</td>
    <td style="font-size: 120%;color: blue;text-align: center">價格</td>
    <td style="font-size: 120%;color: blue;text-align: center">數量</td>
    <?php
        $result = $link -> query("SELECT * FROM `user_order` Where deal='yes' order by `phone` ");
        //$sql = "SELECT * FROM `shop_cart` Where phone='$GET_user_phone' order by `goods_type`";
        //$sql_result=mysqli_query($link,$sql);
        $total_fields=mysqli_num_fields($result);
        $total_rows=mysqli_num_rows($result);
        echo "已完成訂單數量：";
        echo $total_rows;
        echo"<br>";
        while($rows=mysqli_fetch_array($result,MYSQLI_NUM))
        {
            echo "<tr>";
            for ($i=0; $i<=$total_fields-1 ; $i++) 
            {
                if ($i==2||$i==4||$i==5||$i==7)
                {
                    if($i==2)
                    {
                        echo "<td >";
                        echo "0",$rows[$i];
                        echo "</td>";
                    }
                    else
                    {
                        echo "<td >";
                        echo $rows[$i];
                        echo "</td>";
                    }
                }
            }
            echo "</tr>";
        }
    ?>
</table>

<button onclick="location.href='shop.php'">回到主畫面</button>

</body>
</html>