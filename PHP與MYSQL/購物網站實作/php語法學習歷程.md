首要目標是先透過php檔案連接上SQL中指定的資料庫
      
      學習到使用mysqli_connect("localhost","帳號","密碼","指定的資料庫名稱") 來連接資料庫
      並使用set_charset("UTF8") 指定語系避免資料亂碼
      
<img src="https://github.com/tank11110/young/blob/master/%E5%9C%96%E7%89%87/connect.jpg" height='130' weight='70'>

通常都會使用讀取php檔的方式來避免每個需要讀取資料庫的時候都要一串的程式碼讀取

      因此編輯一個connect.php，並用它來快速連接資料庫
      使用include 'connect.php'; 來讀取檔案
      


