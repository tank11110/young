<?php
include("connect.php");
session_start();
if(isset($_POST["del_id"]))
{
    $del_id=$_GET["id"];
    header("location:del.php?del_id=$del_id");    
    //echo $del_id;
}
if(isset($_POST["ch_num"]))
{
    $ch_id=$_GET["id"];
    //echo $ch_id;
    $ch_num=$_POST['up_num'];
    header("location:change_num.php?ch_id=$ch_id&ch_num=$ch_num");  
}
?>