from collections import defaultdict
class Graph(): 
    def __init__(self, vertices): 
        self.V = vertices 
        self.graph = []
        self.graph_matrix = [[0 for column in range(vertices)]  
                    for row in range(vertices)]
    def Dijkstra(self,s):
        visite=[]
        maxnum=float('inf')
        for i in range(len(self.graph)):
            for j in range(len(self.graph)):
                if i!=j and self.graph[i][j]==0:
                    self.graph[i][j]=maxnum
        nodes=[i for i in range(len(self.graph))]
        if s in nodes:
            visite.append(s)
            nodes.remove(s)
        else:
            return None
        distance={s:0}
        for i in nodes:
            distance[i]=self.graph[s][i]
        path={s:{s:[]}}
        k=pre=s
        while nodes:
            minnum=float('inf')
            for j in visite:
                for q in nodes:
                    newnum=self.graph[s][j]+self.graph[j][q]
                    if newnum<minnum:
                        minnum=newnum
                        self.graph[s][q]=newnum
                        k=q
                        pre=j
            distance[k]=minnum
            path[s][k]=[i for i in path[s][pre]]
            path[s][k].append(k)
            visite.append(k)
            nodes.remove(k)
        return distance
