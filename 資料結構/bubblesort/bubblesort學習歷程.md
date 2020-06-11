解題構想：
          
         設置i迴圈跑過每個數字，設置j迴圈比較剩餘的數字。接著比對大小，如果[j]的值大於[j+1]的值就進行互換
         跑到程式結束(排序完成)

程式構想：
         
         for i in range len(list)-1  #需要比對數字的次數，次數為len(list)-1
            for j in range len(list)-1-i  #選取的數字與剩下的數字比對次數，次數為-1-i
                if list[j]>list[j+1] #比對大小
                    num=list[j] #使用變數num儲存比較大的數字
                    list[j]=list[j+1] #把數字小的交換
                    list[j+1]=num #呼叫num把比較大的數字並填入
             迴圈結束(排列完成)
