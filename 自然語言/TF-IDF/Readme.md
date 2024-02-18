目標：以TF-IDF理論建立QA系統

檔案：QA_system.py

----------------------------------------------------------------------------------
一. 建立QA資料集
-----------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA.jpg" height="400" width="350">

二. 建立分詞(jieba)模型
-----------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA2.jpg" height="200" width="500">

    將Question欄位進行分詞

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA3.jpg" height="200" width="550">
    
三. 蒐集所有字詞
-------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA4.jpg" height="100" width="700">

四. 建立TF-IDF向量
-------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA5.jpg" height="400" width="600">

四. 結果
---------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA6.jpg" height="300" width="800">

五. 建立cosine相似度模型
---------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA7.jpg" height="120" width="500">

六. 建立QA搜尋系統
---------------------------
<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA8.jpg" height="250" width="650">

七. 測試
------------------------------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E8%87%AA%E7%84%B6%E8%AA%9E%E8%A8%80/%E5%9C%96%E7%89%87/QA9.jpg" height="130" width="400">

    測試是否能夠找到最接近的問題和答案
