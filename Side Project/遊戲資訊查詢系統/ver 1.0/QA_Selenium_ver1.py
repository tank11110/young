#!/usr/bin/env python
# coding: utf-8

# In[1]:


from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time


# In[2]:


# 產生儲存資料的CSV檔
empty_csv=pd.DataFrame(columns=['title','content'])
csv_path='C:/Users/young/OneDrive/桌面/QAlist.csv'
empty_csv.to_csv(csv_path,index=False)


# In[3]:


driver=webdriver.Chrome()
driver.get("https://forum.gamer.com.tw/B.php?page=1&bsn=71458")

# 跳過開頭
skip_title=["【公告】代管板主上任公告","【問題】新手問問題串","【投票】徵友群組子板為顯板/隱板意願調查(投票已結束)","本討論串已無文章"]

title_list=[]
briefs_list=[]

while True:
    titles=driver.find_elements(By.CLASS_NAME,"b-list__main__title")

    for title in titles:
        if title.text in skip_title:
            pass
        else:
            title_list.append(title.text)
    
    briefs=driver.find_elements(By.CLASS_NAME,"b-list__brief")
    for brief in briefs:
        briefs_list.append(brief.text)
        
    #time.sleep(10)
    
    now_page=driver.find_element(By.CLASS_NAME,"pagenow")
    print("目前進度：",now_page.text)
    
    try:
        button=driver.find_element(By.CLASS_NAME,"next.no")
        break
    except:
        button=driver.find_element(By.CLASS_NAME,"next").click()

df=pd.DataFrame({'title':title_list,'content':briefs_list})
df.to_csv(csv_path, mode='a', header=False,index=False)

print("爬蟲結束")
driver.close()

