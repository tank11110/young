說明：
------------------------------------------------------
[資料來源](https://www.kaggle.com/datasets/iabhishekofficial/mobile-price-classification "題目連結")


MPC_project.py 為模型檔案

train.csv 為數據及提供的訓練資料

test.csv 為數據及提供的測試資料

目錄：
-------------------------------------------------------------------
一. 資料展示

二. 模型訓練結果 (決策樹)

      (一) 最佳參數
      (二) 模型分數
      (三) 特徵分數
      (四) 測試資料回測結果

三. 驗證及優化

      (一) 均方誤差
      (二) Overfitting
      (三) 混淆矩陣
      
四. 預測資料

五. 結論

六. 資料清理驗證

一. 資料展示
-----------------------------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC1.jpg" height="400" width="700">

      
      總共2000筆資料、21筆欄位

二. 模型訓練結果 (決策樹)
-----------------------------------------------------------------
模型部分圖形如下：

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC3.jpg" height="200" width="700">

(一) 最佳參數

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC4.jpg" height="50" width="900">

      使用 GridSearchCV 找出最佳參數設定，並套用至決策樹模型

(二) 模型分數

      模型分數：0.94125

(三) 特徵分數

      1. ram: 0.7136
      2. battery_power: 0.1039
      3. px_width: 0.0781
      4. px_height: 0.0710
      5. mobile_wt: 0.0069
      6. sc_w: 0.0066
      7. clock_speed: 0.0056
      8. pc: 0.0033
      9. talk_time: 0.0031
      10. n_cores: 0.0030
      11. sc_h: 0.0025
      12. m_dep: 0.0020
      13. fc: 0.0003
      14. dual_sim: 0.0002
      15. blue: 0.0000
      16. four_g: 0.0000
      17. int_memory: 0.0000
      18. three_g: 0.0000
      19. touch_screen: 0.0000
      20. wifi: 0.0000

(四) 測試資料回測結果

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC8.jpg" height="450" width="150">

      總共400筆資料中，模型預測成功341筆資料，預測準確率0.8525

三. 驗證及優化
------------------------------------

(一) 均方誤差

      此模型均方誤差為0.3840

(二) Overfitting

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC5.jpg" height="300" width="400">

      從圖形判斷並不會因為決策樹深度提高而降低預測準確率，因此不用擔心過擬合的問題
      同時也驗證了 GridSearchCV 的參數設定

(三) 混淆矩陣

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC6.jpg" height="400" width="450">

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC7.jpg" height="300" width="450">

      透過混淆矩陣進一步驗證模型的準確度及各項參數值

四. 預測資料
-----------------------------------------------
使用上面訓練的模型預測test.csv的結果

<img src="https://github.com/tank11110/young/blob/master/Side%20Project/%E5%9C%96%E7%89%87%E9%9B%86/MPC9.jpg" height="450" width="180">

五. 結論
-----------------------------------------------

(一) 可以使用模型預測新手機在市場上可被接受的價格

(二) 發現民眾最關心手機規格中的容量、電池大小、螢幕長寬，是影響價格的重量因素

(三) 藍芽、4G、觸控螢幕、wifi功能的重要程度為0。並非代表完全不重要
     這是現在手機的"必備"條件，因此民眾不會特別關心。
