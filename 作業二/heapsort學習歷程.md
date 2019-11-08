模擬heapsort：Ex[3,2,-4,6,4,2,19]

    先把數列變成樹狀 
                 3
            2         -4
          6   4     2    19
         
    先從左邊檢查：發現比左邊比較小於是交換   接著檢查右邊：發現右邊比較小於是交換
                 3                                     3
            6         -4                          2         19   
          2   4     2    19                     6   4     2    -4
          
    發現比右邊小於是交換          => 排列完成把最大的19取出並用-4取代
                 19
            6         3
          2   4     2    -4
          
    變成：
                -4
            6         3         lista[,,,,,,19]
          2   4     2  
          
    進行交換：
                 6                        6 
            -4         3    =>       4         3  =>排列完成取出6
          2    4     2            -4   2     2
          
    變成：
                2
            4         3         lista[,,,,,6,19]
         -4   2    
    
    進行交換：
                 4                         
             2         3        =>排列完成取出4
          -4    2 
    
    變成：
                 2                         
             2         3        lista[,,,,4,6,19]
          -4
    
    進行交換：
                 3                         
             2         2        =>排列完成取出3
          -4
    
    變成：
                 -4                         
             2         2        lista[,,,3,4,6,19]
    
    進行交換：
                  2                       
             -4         2       =>排列完成取出2
    
    變成：
                   -4                       
               2                lista[,,2,3,4,6,19]
    
    進行交換：
                   2                       
             -4                 =>排列完成取出2
             
    變成： 
                  -4            lista[,2,2,3,4,6,19]
                  
    取出-4                       lista[,2,2,3,4,6,19]=>排列完成
    

程式構想：
 
1.設定好左邊跟右邊

    左邊=2*i+1	
    右邊=2*i+2	 
 
2.設定一個function進行交換的工作，並檢查左右邊是否存在
  
    max=i
    if 左邊<n and list[i]<list[左邊]: 
		max=左邊的值 
        
	if 右邊<n and list[max]<list[右邊]: 
		max=右邊的值 

3.當最大值不是原本的值的時候，則交換
	
    if max!=i: 
		list[i],list[max]=list[max],list[i]
		

實作：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573221784265.jpg" height='500' weight='350'>
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573221795456.jpg" height='300' weight='150'>

發現問題：1.排列的數字有誤
	
		推測呼叫maxheap的參數有誤
		修改：最後呼叫自己不是(nums,i)，i應該要改成0(maxheap中i為0開始)

發現問題：2.印出的數列重複7次

		推測append進去的動作也進到for迴圈內重複了
		修改：看看加入.pop()進去彈出迴圈

修改過後：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573223420530.jpg" height='500' weight='350'>

發現問題：1.print出來的應該要有7個數字，但我只印出6個

		推測append數字的for迴圈出了問題，少讀取1次
		修改：for迴圈起始改成n-1會超出範圍，因此修改結束成-1

發現問題：2.由於我是做maxheap所以陣列是從大排列至小

		修改：想辦法讓陣列到著印
		
由於不知道python要用什麼語法反轉陣列，於是查詢

		參考網站：http://yehnan.blogspot.com/2015/04/python.html
		
網站上是測試字串，理論上數列應該也行，但未知所以進行測試
		
測試：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573220149884.jpg" height='400' weight='250'>

發現可行，於是放入程式碼

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573220227184.jpg" height='500' weight='350'>

結果：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1573220241523.jpg" height='300' weight='150'>

成功


		
