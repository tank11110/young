<?php
    // 設定 MySQL 的連線資訊並開啟連線
    // 資料庫位置、使用者名稱、使用者密碼、資料庫名稱
    $link = mysqli_connect("localhost", "root", "y**********1", "examshop");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼
    //$sql = "SELECT * FROM `books`";
?>
