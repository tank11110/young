事前準備：安裝jieba套件
在cmd內的python工作目錄底下輸入：

    python -m pip install jieba
    
分詞套件實作：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592197988439.jpg" height='300' weight='250'>

分詞結果很不錯，但希望"例行"跟"維護"是合在一起的"例行維護"
jieba可以透過簡單的程式碼增加字典
ex.

        jieba.add_word('例行維護')
        
結果：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592198019826.jpg" height='300' weight='250'>

"例行"跟"維護"就合在一起了
