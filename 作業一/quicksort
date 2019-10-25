def quicksort(num):
    if len(num)<=1:    #判斷數列內的數字是否只有1個(遞迴結束的條件)
        return num
    small=[]   #設置3個空陣列分別儲存小於，等於，大於對照組的數字
    big=[]
    same=[]
    pivot=num[0]   #以每個陣列的第1個數字作為對照組(方便)
    for i in num:    
        if i == pivot:    #分類排序，比對照組小的放small，一樣的放same，大於的放big
               same.append(i)    
        elif i > pivot:
               big.append(i) 
        elif i < pivot:
               small.append(i)
    return quicksort(small)+same+quicksort(big) #回傳分類好的值
