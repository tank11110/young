import requests
from bs4 import BeautifulSoup
res=requests.get("https://tw.beanfun.com/maplestory/maple_faq.asp")
soup=BeautifulSoup(res.content,'html.parser')
soup.encoding='utf-8'
title=soup.select('span.maple02')
for i in title:
    print("Question "+i.text)
title2=soup.select('td.maple02')
for j in title2:
    print("Question "+j.text)
