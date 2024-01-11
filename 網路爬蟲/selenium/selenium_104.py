#!/usr/bin/env python
# coding: utf-8

# In[33]:


from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC


# In[50]:


driver=webdriver.Chrome()
driver.get("https://www.104.com.tw/jobs/search/")

search=driver.find_element(By.ID,"keyword")
search.send_keys("Python")

city=driver.find_element(By.CLASS_NAME,"b-search-block--m")
city.click()
driver.find_element(By.XPATH,'//*[@id="job-jobList"]/div[8]/div/div[2]/div/div[2]/div[2]/div/li[1]/a/span[1]/input').click()

place_button=WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.CLASS_NAME, "category-picker-btn-primary"))
)
place_button.click()
search.send_keys(Keys.RETURN)

jobs=driver.find_elements(By.CLASS_NAME,"js-job-link")
for job in jobs:
    print(job.text)
    
#links=driver.find_element(By.LINK_TEXT,"Python 工程師")
#links.click()


# In[ ]:





# In[49]:


driver.quit()


# In[ ]:




