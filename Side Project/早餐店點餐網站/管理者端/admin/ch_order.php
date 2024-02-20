<?php
include 'connect.php';
session_start(); //開啟session
//$ch_oder_id=$_GET['id'];
if(isset($_POST["ch1234"]))
{
    $check=$_POST["Check"];
    for ($i=0; $i<count($check) ; $i++) 
    { 
        //echo $check[$i];
        $change_order = "UPDATE user_order SET deal='yes' WHERE id='".$check[$i]."'";
        mysqli_query($link,$change_order);
    }
    echo "<script>alert('處理完成！')</script>";
    Header("Refresh:0;user_order_no.php ");
    die;
}
?>