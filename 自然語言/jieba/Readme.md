題目：jieba練習
---------------------------------------------------------------------------------
使用檔案：
---------------------------------------------
jieba_06170135.py

事前準備：安裝jieba套件
----------------------------------------------------------------
在cmd內的python工作目錄底下輸入：

    python -m pip install jieba
    
分詞套件實作：
------------------------------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592197988439.jpg" height='300' weight='250'>

更新字典
---------------------------------------------------------------------
分詞結果很不錯，但希望"例行"跟"維護"是合在一起的"例行維護"

jieba可以透過簡單的程式碼增加字典

        jieba.add_word('例行維護')
        
成果：
------------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592198019826.jpg" height='300' weight='250'>

