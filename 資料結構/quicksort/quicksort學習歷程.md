解題構想：

         設置3個空陣列，然後寫一個程式取陣列中第一個值(方便)作為對照組，比對照組小的丟進"小"的陣列中，一樣的放進"等於"的陣列中
         大於的放進"大"的陣列中，然後不斷遞迴直到陣列中只有1個數字(排列完成)。


程式構想：

         small=[] num=[] big=[] #設定3個空陣列來儲存數字
         if len(list)<=1
            return(list) #如果list的數值只有一個直接return就好
         else:
             num=lise[0]  #指定對照組為list中第一個值(方便)
             for i in len(list) #掃過list中的每個值
                if i<num  #如果i比對照組小則加進small的陣列
                   small.append(i)
                if i==num #如果i等於對照組則加進num的陣列
                   num.append(i)
                if i>num #如果i大於num則加進big的陣列
                   big.append(i)
          重複遞迴直到small,big的陣列數字只有1個(排列完成)


實作：

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/quicksort.jpg" height='500' weight='350'>
