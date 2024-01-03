目錄：
------------------------------------------------------------------
    一. 使用者端架構圖
    二. 管理者帳號登入
    三. 管理者主畫面
    四. 商品調整(上架、下架、數量)
    五. 訂單處理
    
一. 管理者端架構圖
-----------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/MySQL_A1.jpg" height="450" width="400">

二. 管理者帳號登入
-----------------------------------------------
登入主畫面

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_login1.jpg" height="250" width="700">

        已經預設一組管理者帳號，不用再註冊

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_login2.jpg" height="300" width="650">

三. 管理者主畫面
-----------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop.jpg" height="600" width="900">
        
        當前使用者顯示：Admin

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop1.jpg" height="500" width="900">
        
        篩選器功能：食物類別篩選

四. 商品調整(上架、下架、數量)
-----------------------------------------------
商品數量調整
------------------------------------------------

        調整商品可以調整 1.類別、2.名稱、3.價格、4.數量
        採用一樣一列商品調整的方式，調整完畢之後按下送出

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop2.jpg" height="700" width="900">

        模擬店家補貨的情形，因此將所有商品數量調回100

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop3.jpg" height="700" width="900">


資料庫數據顯示
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop4.jpg" height="700" width="900">

商品上架
------------------------------------------------

        上架商品頁面，需填寫商品類別、名稱、價格、數量

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop5.jpg" height="400" width="900">

        模擬店家上架新商品：雞米花(類別：炸物、價錢：35、數量：100)

商品主畫面新增"雞米花"
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop6.jpg" height="500" width="900">

資料庫數據顯示
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop7.jpg" height="700" width="900">

商品下架
------------------------------------------------

        從調整商品頁面下架商品，對想下架的商品點選"刪除"

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop8.jpg" height="600" width="900">

        模擬店家下架新商品：雞塊

商品主畫面刪除"雞塊"
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop9.jpg" height="500" width="900">

資料庫數據顯示
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_shop10.jpg" height="700" width="900">

五. 訂單處理
-----------------------------------------------

        訂單頁面會顯示需要處理的商品

<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_buy1.jpg" height="450" width="900">


資料庫數據顯示
<img src="https://github.com/tank11110/young/blob/master/PHP%E8%88%87MYSQL/%E5%9C%96%E7%89%87/A_buy2.jpg" height="200" width="800">
