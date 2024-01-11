透過決策樹分析資料中年紀、性別、工作時數、學歷、薪資之間的關係

檔案：決策樹.py

----------------------------------------------------------------------------------
將 adult.csv檔案載入
-----------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree1.jpg" height="200" width="800">

<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree2.jpg" height="600" width="400">

選取需要的欄位(年紀、性別、工作時數、學歷、薪資)
-----------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree3.jpg" height="200" width="500">

進行資料處理
-----------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree4.jpg" height="200" width="800">

    資料中的"性別"和"學歷"不屬於數值型，因此要先透過dummies將之轉換成數值型的資料
    進行資料切割，最後放進模型進行訓練
    


模型結果(分數)
-------------------------
<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree5.jpg" height="100" width="600">

模型繪圖
-------------------------
<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree6.jpg" height="300" width="1500">

        使用graphviz幫忙繪圖，除了python之外還需下載
        並設定"環境變數"中"使用者"和"系統"的PATH才能使用

結果(部分*)
------------------------------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/%E6%A9%9F%E5%99%A8%E5%AD%B8%E7%BF%92/%E5%9C%96%E7%89%87/DS_tree7.jpg" height="500" width="800">


    dummies產生過多數值型資料，導致圖形十分狹長
    因此只擷取部分圖形
