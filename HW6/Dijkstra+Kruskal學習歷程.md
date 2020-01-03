Dijkstra+Kruskal 流程圖：
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/S__67321859.jpg" height='500' weight='350'>

Dijkstra程式構想：

  1.設定2個陣列分別儲存到訪過的點，跟未到訪的點
  
      visited=[]
      nodes=[]

  2.設定一個極大的數當作max distance，用來對照之後跑出的新distance
  
      minnum=float('inf')
      
  3.跑出與下一段的距離，並比較是否小於現在地min。如果是則取代，並更新新的距離
  
      newdistance=graph[start][now]+graph[now][next]
      if newdistance<mindistance:
          mindistance=newdistance
          graph[start][next]=newdistance
          
實作：
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1578059568248.jpg" height='500' weight='350'>
結果：
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1578059590523.jpg" height='300' weight='200'>

尋找問題所在：懷疑newnum是否沒讀入，因此print(newnum)看看，順便看minnum初始值如何
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1578059673656.jpg" height='200' weight='150'>

發現有0的距離，回頭看到測資很陰險的把沒有到的點的距離設置成0
修改：
       
       設置一個maxnum用來當作不會到的距離
       maxnum=float('inf')
       for i in range(len(self.graph)):
           for j in range(len(self.graph)):
               if i!=j and self.graph[i][j]==0:
                   self.graph[i][j]=maxnum
       
       *由於測資把自己跟自己的距離也設置成0，因此用if避免蓋錯
        
        也不用擔心如果2點有距離為0的話會不會出問題，因為這樣應該會變成同1個點
        
 修改後的結果：
 <img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1578060613079.jpg" height='500' weight='350'>
 執行結果：
 <img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1578060674414.jpg" height='300' weight='250'>

參考資料：https://www.itread01.com/content/1545306259.html
