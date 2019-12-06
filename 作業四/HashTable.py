# 雖然有架設linklist連結點設置，但我認為MD5加密過後的值為唯一，因此後面程式碼的data[hashkey]的值沒有設置linklist連接

# 2019/12/6程式未完成

class  ListNode:  #連結點的設置
    def __init__(self,val):
        self.val=val
        self.next=None
    def setnext(self,node):
        self.next=node
    def getnext(self):
        return self.next

class MyHashSet:  #主程式
    def __init__(self,capacity=5):
        self.capacity=capacity
        self.data=[None]*capacity
    def hashf(self,key):  #def一個MD5 function方便得到MD5值
        import hashlib
        key=hashlib.md5()                                                                                                                                                            
        key.update(key)
        hashkey=key.hexdigest()
        return hashkey
    def add(self,key):  #在list中增加num的MD5-hash值
        hashkey=self.hashf(key)  #呼叫hashf得到MD5值
        hashval=[key]  #設置hashval儲存num
        self.data[hashkey]=[keyval]   #在data中做出一個MD5-hash的值的位置並儲存num
        return True
    def contains(self,key):  #尋找num是否存在
        hashkey=self.hashf(key)   #設置hashkey儲存hash-MD5的值
        if self.data[hashkey] is not None:  #在data(list)中如果hashkey的位置不是空的
            print("True")  #代表存在，並印出 True
        else:
            print("False")  #代表不存在，並印出 False
    def delete(self,key):   #在lisr中刪除num的MD5-hash值
        hashkey=self.hashf(key)  #設置hashkey儲存hash-MD5的值
        if self.data[hashkey] is None:  #在data(list)中如果hashkey的位置是空的
            print("doesn't exist")  #表示不存在，並印出"不存在"
        else:   
            self.data[hashkey].pop()   #表示存在，並把數列的值刪除
