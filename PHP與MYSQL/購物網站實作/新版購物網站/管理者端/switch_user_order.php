<?php
include("connect.php");
session_start();
if(isset($_POST["user_order"]))
{
    $admin=$_POST["user_order"];
    switch ($admin) 
    {
        case '查看未處理訂單':
            //echo "查看未處理訂單";
            header("location:user_order_no.php");
            break;
        
         case '查看已處理訂單':
            header("location:user_order_yes.php");
            break;
    }
}
?>