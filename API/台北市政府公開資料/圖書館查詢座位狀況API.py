#!/usr/bin/env python
# coding: utf-8

# In[7]:


import requests
url="https://seat.tpml.edu.tw/sm/service/getAllArea"
requests=requests.get(url)
print(requests)
result=requests.json()
for item in result:
    print(item['branchName'])


# In[ ]:




