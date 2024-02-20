<?php
    require_once("connect.php");
    session_start(); //開啟session
    if (empty($_POST['user_acc'])&&empty($_POST['user_pwd'])) //判斷登入資料
    {
        echo "<script>alert('登入失敗 請輸入帳號和密碼！')</script>";
        header("Refresh:0;admin_login.php "); 
        die;
    }
    elseif (empty($_POST['user_acc'])) 
    {
        echo "<script>alert('登入失敗 請輸入帳號！')</script>";
        header("Refresh:0;admin_login.php "); 
        die;
    }
    elseif (empty($_POST['user_pwd'])) 
    {
        echo "<script>alert('登入失敗 請輸入密碼！')</script>";
        header("Refresh:0;admin_login.php "); 
        die;
    }
    else
    {
        $user_acc=$_POST['user_acc'];
        //$user_phone_9=substr($_POST['user_phone'],-9);
        $user_password = $_POST['user_pwd'];
        $result = $link -> query("SELECT * FROM `admin` WHERE account = '".$user_acc."'"); 
        //尋找使用者輸入的帳號跟資料庫內的帳號一致的資料列
        while ($output = $result->fetch_assoc()) //如果資料有回傳
        {
            $row["acc"] = $output['account'];
            $row["password"] = $output['password']; //把資料存進陣列row裡
        }
        if(empty($row["acc"]))
        {
            echo "<script>alert('帳號錯誤 沒有該帳號！')</script>"; 
            header("Refresh:0;admin_login.php "); //登入成功則跳轉到商店頁面
            die;
        }
        else
        {
            $user_name=$row["acc"];
            $user_key_pwd=$row["password"];
            if($user_key_pwd==$user_password)   //!empty($user_phone)&&!empty($user_password)&&
            {
                echo "<script>alert('登入成功！')</script>";
                $_SESSION['user_name']=$user_name;
                //$_SESSION['user_phone']=$user_phone;
                header("Refresh:0;shop.php "); //登入成功則跳轉到商店頁面
                die;
            }
            else
            {
                echo "<script>alert('密碼錯誤 請重新輸入！')</script>";
                header("Refresh:0;admin_login.php "); //登入失敗則跳轉到登入頁面
                die;
            }
        }
    }
?>