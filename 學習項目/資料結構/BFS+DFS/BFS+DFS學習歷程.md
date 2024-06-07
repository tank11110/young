<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/S__66183191.jpg" height='500' weight='350'>

程式構想：因為BFS的走訪像是依序走訪  ex.從A開始，發現A能走B,C，走訪B,C，發現B能走E,F...依序走訪下去
         
所以先1.做出一個list紀錄走訪過程
      2.做出一個list儲存是否走訪過
      3.呼叫graph
     
程式構想如下:

    def BFS(graph,start):
    lista=[]
    lista.append(start)
    visit=[]
    visit.append(start)
    while lista:
        a=lista.pop(0)
        for i in graph[a]:
            if i not in visit:
                visit.append(i)
                lista.append(i)
    return visit
    
發現可行

BFS/DFS差別：
BFS需要跟點數成正比的記憶體空間
DFS則是跟遞迴深度成正比
因此DFS更省記憶體空間
