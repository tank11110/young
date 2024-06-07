Hash Table 流程圖:

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/S__64520194.jpg" height='500' weight='350'>


程式構想:

1.先做出一個程式(F)把每個輸入進來的文字改成MD5的格式

    import hashlib
    key=hashlib.md5()  
    key.update(key)
    hashkey=key.hexdigest()
    return hashkey
    
2.所需功能
   a.增加功能：把所有輸入的值丟進(F)裡面轉變成一串數字   #個人推測通過MD5加密之後的數列為唯一，因此暫時不考慮hashkey重複的問題

          hashkey=self.f(num)
          hashtable.append(hashkey)
    
   b.刪除特定的值：把刪除的值值丟進(F)裡面轉變成一串數字，並從hashtable(list)裡尋找
   
          delhashkey=self.f(delnum)
          for i in hashtable：
              if hashtable[i]==delhashkey：
                  hashtable.pop(i)
              else：
                  return None
                
   c.查詢值是否存在：把查詢的值值丟進(F)裡面轉變成一串數字，並從hashtable(list)裡尋找
   
          findhashkey=self.f(findnum)
          for i in hashtable：
              if hashtable[i]==findhashkey：
                  return True
              else：
                  return False
                  
                  
實作：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1575635154971.jpg" height='500' weight='350'>

測試執行：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1575635174349.jpg" height='500' weight='350'>

修正：
