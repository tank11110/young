購物網站實作：
 
    目前預想購物網站功能：
    1.使用者帳號註冊/登入
    2.購物網站(商品資料從資料庫取得)
    3.購物車(使用者將想購買的商品放入購物車)
    4.結算(將使用者購買的商品資料回傳到order資料庫)
    
各功能實作：

一. 使用者註冊：

    使用者註冊的資料傳送至資料庫(user)中儲存

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/acount.jpg" height='400' weight='600'>

註冊程式碼：

    先使用adding.php讓使用者輸入資料
   
    *原先是打算讓使用者輸入基本資訊並非輸入帳號密碼，因此密碼欄位的name才會是userphone，但並不影響功能實現
   
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/acount_sublime.jpg" height='300' weight='400'>

    接著透過 sprintf.php 用sprintf的方式將帳號密碼傳送至資料庫指定的欄位中
   
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/sprintf_sublime.jpg" height='400' weight='600'>


二. 使用者登入

     使用者登入的資訊跟資料庫(user)比對，帳號密碼正確則跳轉到商店頁面
     開啟session來記錄登入的使用者名稱

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/shop_login.jpg" height='400' weight='600'>

登入程式碼：

     由check_login檢查使用者輸入的帳號跟密碼是否一樣。一樣則代表登入成功跳轉至商品頁面，反之回到登入頁面
     
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/check_login_sublime.jpg" height='400' weight='600'>

三. 商店頁面

     商店的商品是用表格的table方式呈現，資料都是從資料庫中(goods)抓取，後面的操作(購買)則是將商品加入購物車
     透過session讀取進行操作的使用者名稱，並顯示當前的使用者
     
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/shop.jpg" height='400' weight='600'>

商店程式碼：

     先規劃好商品所需的欄位並讀取session存取的使用者名稱
     
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/shop_1.jpg" height='400' weight='600'>

     讀取資料庫(goods)並將table開啟，然後讀取資料庫的資料放到table內
     購買則是用herf的方式傳送使用者購買的商品資料到shop_cart.php
     
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/shop_2.jpg" height='300' weight='800'>

三之一. 購物車前置

    將剛剛herf傳送的資料先回到資料庫，用資料庫(shop_cart)臨時存放商品資料。之後再從資料庫(shop_cart)讀取資料就可以了
    *以使用者(abc)購買2個蘋果，1個香蕉為例
    
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/cart_db.jpg" height='400' weight='700'>
   
    
    
    
