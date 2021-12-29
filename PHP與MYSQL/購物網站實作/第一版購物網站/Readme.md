購物網站實作：
 
    目前預想購物網站功能：
    1.使用者帳號註冊/登入
    2.購物網站(商品資料從資料庫取得)
    3.購物車(使用者將想購買的商品放入購物車)
    4.結算(將使用者購買的商品資料回傳到order資料庫)
    
各功能實作：

一. 使用者註冊：

    使用者註冊的資料傳送至資料庫中儲存

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/acount.jpg" height='400' weight='600'>

註冊程式碼：

    先使用adding.php讓使用者輸入資料
   
    *原先是打算讓使用者輸入基本資訊並非輸入帳號密碼，因此密碼欄位的name才會是userphone，但並不影響功能實現
   
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/acount_sublime.jpg" height='300' weight='400'>

    接著透過 sprintf.php 用sprintf的方式將帳號密碼傳送至資料庫指定的欄位中
   
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/sprintf_sublime.jpg" height='400' weight='600'>


二. 使用者登入

     使用者登入的資訊跟資料庫比對，帳號密碼正確則跳轉到商店頁面

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/shop_login.jpg" height='400' weight='600'>

    
    
    
