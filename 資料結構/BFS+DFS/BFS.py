from collections import defaultdict
class Graph():
    def __init__(self):
        self.graph=defaultdict(list)
    def addEdge(self,u,v):
        self.graph[u].append(v)
    def BFS(self,s):
        lista=[]
        visit=[False]*(len(self.graph))
        lista.append(s)
        visit[s]=True
        anslist=[]
        while lista:
            s=lista.pop()
            anslist.append(s)
            for i in self.graph[s]:
                if visit[i]==False:
                    lista.append(i)
                    visit[i]=True
        return anslist
