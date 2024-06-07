# 雖然有架設linklist連結點設置，但我認為MD5加密過後的值為唯一，因此後面程式碼的data[hashkey]的值沒有設置linklist連接


class  ListNode:  
    def __init__(self,val):
        self.val=val
        self.next=None
    def setnext(self,node):
        self.next=node
    def getnext(self):
        return self.next

class MyHashSet:
    def __init__(self,capacity=5):
        self.capacity=capacity
        self.data=[None]*capacity
    def hashf(self,key):
        import hashlib
        hkey=hashlib.md5()                                                                                                                                                            
        hkey.update(key.encode("utf-8"))
        hashkey=hkey.hexdigest()
        return hashkey
    def add(self,key):
        hashkey=self.hashf(key)
        for i in range(0,5):
            if self.data[i] is None:
                self.data[i]=hashkey
                break
    def contains(self,key):
        count=0
        hashkey=self.hashf(key)
        for i in range(0,5):
            if self.data[i]==hashkey:
                return True
                break          
            else:
                return False
    def delete(self,key):
        hashkey=self.hashf(key)
        for i in range(0,5):
            if self.data[i]==hashkey:
                self.data[i]=None
