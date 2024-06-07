<?php
    require_once('connect.php');
    session_start(); //開啟session
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_pwd'];
    $result = $link -> query("SELECT password FROM `user` WHERE name = '$user_name'"); 
    //尋找使用者輸入的帳號跟資料庫內的帳號一致的資料列
    while ($output = $result->fetch_assoc()) //如果資料有回傳
    {
        $row[] = $output; //把資料存進陣列row裡
        //echo 'id: '. $row['id'] . '<br>';
        //echo 'name: ' . $row['name'] . '<br>';(確認用)  //確認帳號密碼抓取順利
    }
    if($row)
    {
        if(!empty($user_name)&&!empty($user_password)&&$user_password = $row) 
        //如果輸入帳號，密碼不回空 且 輸入的密碼跟row裡的一致
        {
            echo "<script>alert('登入成功！')</script>";
            $_SESSION['user_name'] = $user_name;
            Header("Refresh:0;shop.php "); //登入成功則跳轉到商店頁面
        }
        else
        {
            echo "<script>alert('登入失敗 請重新登入！')</script>";
            Header("Refresh:0;login.php "); //登入失敗則跳轉到登入頁面
        }
    }
?>