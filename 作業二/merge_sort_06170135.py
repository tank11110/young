class Solution():
    def merge_sort(self,lista):
        if len(lista) <= 1:  #如果lista只有1個數值 直接return
            return lista
        else:  #先找出list的中間點，然後開始對半分(遞迴執行)直到len(L)(R)長度=1
            mid = len(lista) // 2  
            L = self.merge_sort(lista[:mid])
            R = self.merge_sort(lista[mid:])
        return self.merge(L,R)  #分完了之後丟進merge來搓合，並回傳
    
    def merge(self, L, R):  #merge的主程式
        anslist = []  #設定一個空list來儲存數值
        i=0  #i,j分別用來記憶L,R的位置
        j=0
        while i < len(L) and j < len(R):  #當2個list的值都沒跑完時
            if L[i] <= R[j]:   #如果L第i個位置(第一次為0)比R的第j個位置(第一次為0)小時
                anslist.append(L[i])  #把L第i個值存到anslist裡
                i += 1   #第i個位置(第一次為0)已經用過了因此跳至下一個位置
            else:  #反之儲存R第j個位置
                anslist.append(R[j])
                j += 1   #第j個位置(第一次為0)已經用過了因此跳至下一個位置
        for ci in range(i,len(L)):   #當R陣列的數字先被填完，就把i之後的L陣列的數字(in range(i,len(L))的原因)依序填入anslist
                anslist.append(L[ci])
        for cj in range(j,len(R)):   #當L陣列的數字先被填完，就把j之後的R陣列的數字(in range(j,len(R))的原因)依序填入anslist
                anslist.append(R[cj])
        return anslist #把每次anslist的值回傳
