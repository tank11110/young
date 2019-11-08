class Solution():
    def maxheap(self,nums,i):   #以maxheap排列heap
        n=len(nums)  #設n為list的長度
        L=2*i+1  #分左邊
        R=2*i+2  #分右邊
        maxnum=i  #先設定最大值為第一個值
        if L<n and nums[L]>nums[i]:  #判斷左邊的子數是否存在，並是否大於第一個值
            maxnum=L  #是的話則把maxnum的值換成當前L的值
        if R<n and nums[R]>nums[maxnum]:   #判斷右邊的子數是否存在，並是否大於maxnum的值
            maxnum=R  #是的話則把maxnum的值換成當前R的值
        if maxnum!=i:  #如果maxnum不等於原本的值
            nums[i],nums[maxnum]=nums[maxnum],nums[i]  #則交換(把最大的跟小的進行交換)
            self.maxheap(nums,maxnum)  #重新把heap變成maxheap
        
    def heap_sort(self,nums):  #sort的主程式
        anslist=[]  #先設定空的陣列用來儲存maxheap出來的maxnum的值
        n=len(nums) #設n為List的長度
        for i in range(n,-1,-1):  #進行建造maxheap的過程
            self.maxheap(nums,i)
        for i in range(n-1,-1,-1):  #建造好了就一個一個選出最大的數字，選好的同時縮小範圍(忽略已經排好的max值)
            nums[i],nums[0]=nums[0],nums[i]   #根據上課影片把最大最小的位置互換
            anslist.append(nums.pop())  #把最大的數字丟進anslist，並用pop彈出迴圈
            self.maxheap(nums,0)  #排好了之後重新建造maxheap
        anslist.reverse()  #把排列完成的anlist倒著印
        return anslist  #把最後的結果回傳
