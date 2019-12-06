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
        key=hashlib.md5()                                                                                                                                                            
        key.update(key)
        hashkey=key.hexdigest()
        return hashkey
    def add(self,key):
        hashkey=self.hashf(key)
        hashval=[key]
        self.data[hashkey]=[keyval]
        return True
    def contains(self,key):
        hashkey=self.hashf(key)
        if self.data[hashkey] is not None:
            print("True")
        else:
            print("False")
    def delete(self,key):
        hashkey=self.hashf(key)
        if self.data[hashkey] is None:
            print("doesn't exist")
        else:
            self.data[hashkey].pop()
