模擬mergesort：Ex.[3,46,1,73,24,34,12,9]

              把數列拆至最小 Ex. [3,46,1,73,24,34,12,9]=>[3][46][1][73][24][34][12][9]
              兩兩比大小並排序 Ex.[3,46][1,73][24,34][9,12]
              兩組互相比大小並排序[1,3,46,73][9,12,24,34]
              最後互相比大小並排序[1,3,9,12,24,34,46,73]
              排序完成，輸出結果[1,3,9,12,24,34,46,73]

程式構想：使用遞迴的方式拆散數列，並進行搓合

1.使用分半的方式把數列拆散
    
    mid=len(list)//2  #要取整數不能用"/2" 後面讀取list的mid會出錯
    L=[:mid]  #分成左右2邊
    R=[mid:]
    
2.比較大小並搓合
  
    newlist=[]
    if L[i]>R[j]
       newlist[q]=R(j)
       j+=1
       q+=1
      
    if R[j]>L[i]
       newlist[q]=L(i)
       i+=1
       q+=1

實作：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573043960901.jpg" height='500' weight='350'>
發現問題：print的結果跟預想中的不一樣，3被吃掉了且後面的數字沒有排列

模擬程式碼找出原因：

    以測資為例最後分解至[3],[1]開始merge，因[1]比[3]小所以應該要變成[1,3]
    但結果卻顯示[1,1]。接著回推程式碼，發現當R陣列跑完時L陣列還有數值，且沒有輸入剩餘的值
    解決方法：當有一陣列空了的時候，利用迴圈把另一個陣列的值依序填入
    
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573045037942.jpg" height='300' weight='200'>    

新增了這個程式碼後可以看見數列被正常排列了，代表完成了



*完整程式碼+詳解

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573045115406.jpg" height='600' weight='450'>
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573045067976.jpg" height='150' weight='100'>

文字版：

    def merge(lista):
        if len(lista)<=1:   #如果list只有1就直接回傳
            return lista
        else:
            mid = len(lista)//2  #先把找出list的中間點，然後開始遞迴對半分到list長度=1表示可以開始merge了
            L=lista[:mid]
            R=lista[mid:]
            merge(L)
            merge(R)
            i=0     #這邊先設i,j 2個變數用來分別記錄等等merge時箭頭(count)的位置
            j=0
            q=0     #q則是用來記錄放入數值時箭頭(count)的位置
            while i<len(L) and j<len(R):  #當2者的箭頭都沒指到最後一個位置時
                if L[i]>=R[j]:   #如果L第i個位置大於等於R的第j個位置時(第一次i,j為0)
                    lista[q]=R[j]  #就把R的第j個值放進list的第q(第一次為0)個位置
                    j+=1  #R[j]的箭頭(count)移動至下一個位置(前一個位置用過了)    
                else:
                    lista[q]=L[i]  #如果不是上面的狀況則lista的第q個位置放L的第i的值
                    i+=1  #L[j]的箭頭(count)移動至下一個位置(前一個位置用過了)
                q+=1  #list[q]的箭頭(count)移動至下一個位置(前一個位置已填入數字)
            for ci in range(i,len(L)):   #當R陣列的數字先被填完，就把i之後的L陣列的數字(in range(i,len(L))的原因)依序填入
                lista[q]=L[ci]
                q+=1
            for cj in range(j,len(R)):   #當L陣列的數字先被填完，就把j之後的R陣列的數字(in range(j,len(R))的原因)依序填入
                lista[q]=R[cj]
                q+=1
        return lista  #回傳完成merge的lista
        
* 發現老師要求的格式與現行不符，更改格式
