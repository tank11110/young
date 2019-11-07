class Solution():
    def merge_sort(self,lista):
        if len(lista) <= 1:
            return lista
        else:
            mid = len(lista) // 2
            L = lista[:mid]
            R = lista[mid:]
            return L
            return R

    def merge(self, L, R):
        anslist = []
        i=0
        j=0
        q=0
        while i < len(L) and j < len(R):
            if L[i] < R[j]:
                anslist.append(L[i])
                i += 1
            else:
                anslist.append(R[j])
                j += 1
        for ci in range(i,len(L)):   #當R陣列的數字先被填完，就把i之後的L陣列的數字(in range(i,len(L))的原因)依序填入
                anslist.append(L[ci])
        for cj in range(j,len(R)):   #當L陣列的數字先被填完，就把j之後的R陣列的數字(in range(j,len(R))的原因)依序填入
                anslist.append(R[cj])
        return anslist
