class Solution():
    def maxheap(self,nums,i):   #以maxheap排列heap
        n=len(nums)  #設n為list的長度
        L=2*i+1  #取得左邊child
        R=2*i+2  #取得右邊child
        maxnum=i  #先設定最大值為root
        if L<n and nums[L]>nums[i]:  #判斷左邊的子數是否存在，並是否大於第一個值
            maxnum=L  #是的話則把maxnum的值換成當前L的值
        if R<n and nums[R]>nums[maxnum]:   #判斷右邊的子數是否存在，並是否大於maxnum的值
            maxnum=R  #是的話則把maxnum的值換成當前R的值
        if maxnum!=i:  #如果不是3者中的最大
            nums[i],nums[maxnum]=nums[maxnum],nums[i]  #則交換3者中最大的值
            self.maxheap(nums,maxnum)  #調整新的heap成maxheap
        
    def heap_sort(self,nums):  #sort的主程式
        anslist=[]  #先設定空的陣列用來儲存maxheap出來的maxnum的值
        n=len(nums) #設n為List的長度
        for i in range(n-1,-1,-1):  #調整heap(雖然用n-1，但真正開始跑的時候是i=n//2-1)
            self.maxheap(nums,i)
        for i in range(n-1,-1,-1):
            nums[i],nums[0]=nums[0],nums[i]   #把最大最小的位置互換
            anslist.append(nums.pop())  #把最大的數字丟進anslist，並用pop出迴圈
            self.maxheap(nums,0)  #調整heap
        anslist.reverse()  #把排列完成的anlist倒著印
        return anslist  #把最後的結果回傳
