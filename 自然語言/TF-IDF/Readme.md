目標：以TF-IDF理論建立QA系統

檔案：QA_system.py

----------------------------------------------------------------------------------
1.建立QA資料集
-----------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA.jpg" height="200" width="800">

選取需要的欄位(年紀、性別、工作時數、學歷、薪資)
-----------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA2.jpg" height="200" width="500">

進行資料處理
-----------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA3.jpg" height="200" width="800">

    資料中的"性別"和"學歷"不屬於數值型，因此要先透過dummies將之轉換成數值型的資料
    進行資料切割，最後放進模型進行訓練
    


模型結果(分數)
-------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA4.jpg" width="600">

模型繪圖
-------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA5.jpg" height="300" width="1500">

        使用graphviz幫忙繪圖，除了python之外還需下載
        並設定"環境變數"中"使用者"和"系統"的PATH才能使用

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA6.jpg" height="500" width="800">

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA7.jpg" height="500" width="800">

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA8.jpg" height="500" width="800">

測試
------------------------------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA9.jpg" height="500" width="800">
