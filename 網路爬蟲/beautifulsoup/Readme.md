題目：抓取 https://tw.beanfun.com/maplestory/maple_faq.asp 網站的Q(問題)
---------------------------------------------------------------------------------------------------------
事前準備：安裝beautifulsoup套件
-------------------------------------------   
   在cmd內的python工作目錄底下輸入：
      
      python -m pip install requests
      python -m pip install BeautifulSoup4
      
判斷網站是否為get

查看是否成功回應
     
     以res.status_code判斷，如為200則成功
     
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1591855162774.jpg" height='130' weight='70'>

網站爬取實作
--------------------------------------------------------------

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592141155593.jpg" height='300' weight='200'>

發現爬下來的資料是亂碼，檢查網站編碼

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592141199411.jpg" height='130' weight='70'>

發現該網站並不是用utf-8編碼
beautifulsoup內建的編碼是使用utf-8，所以出現亂碼是正常的。

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592141367145.jpg" height='300' weight='200'>

修改過後顯示就正常了，可以抓自己想要的資料了

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/messageImage_1592146955001.jpg" height='230' weight='170'>

<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/messageImage_1592147205810.jpg" height='230' weight='170'>

爬取的對象分別是span.maple02跟td.maple02

爬取成果：
-------------------------------------------------------------------------------------------------------------------------
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/1592141446811.jpg" height='500' weight='350'>
