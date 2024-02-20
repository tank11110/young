<?php
    require_once("connect.php");
    session_start(); //開啟session
    if (empty($_POST['user_phone'])&&empty($_POST['user_pwd'])) //如果輸入為"空"的時候
    {
        echo "<script>alert('登入失敗 請輸入帳號(手機號碼)和密碼！')</script>";
        header("Refresh:0;user_login.php "); //登入失敗則跳轉到登入頁面
        die;

    }
    elseif (empty($_POST['user_phone'])) 
    {
        echo "<script>alert('登入失敗 請輸入帳號(手機號碼)！')</script>";
        header("Refresh:0;user_login.php "); //登入失敗則跳轉到登入頁面
        die;
    }
    elseif (empty($_POST['user_pwd'])) 
    {
        echo "<script>alert('登入失敗 請輸入密碼！')</script>";
        header("Refresh:0;user_login.php "); //登入失敗則跳轉到登入頁面
        die;
    }
    else
    {
        $user_phone=$_POST['user_phone'];
        $user_phone_9=substr($_POST['user_phone'],-9);
        $user_password = $_POST['user_pwd'];
        $result = $link -> query("SELECT * FROM `user` WHERE phone = '".$user_phone_9."'"); 
        while ($output = $result->fetch_assoc()) 
        {
            $row["name"] = $output['name'];
            $row["password"] = $output['password']; 
        }
        if(empty($row["name"]))
        {
            echo "<script>alert('帳號錯誤 沒有該帳號！')</script>"; 
            header("Refresh:0;user_login.php "); 
        }
        else
        {
            $user_name=$row["name"];
            $user_key_pwd=$row["password"];
            if($user_key_pwd==$user_password)   
            {
                echo "<script>alert('登入成功！')</script>";
                $_SESSION['user_name']=$user_name;
                $_SESSION['user_phone']=$user_phone;
                header("Refresh:0;shop.php "); //登入成功則跳轉到商店頁面
            }
            else
            {
                echo "<script>alert('密碼錯誤 請重新輸入！')</script>";
                header("Refresh:0;user_login.php "); //登入失敗則跳轉到登入頁面
            }
        }
    }
?>