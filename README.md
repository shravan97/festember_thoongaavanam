# festember_thoongaavanam
Database name : thoongavanam  
DATABASE SCHEMA  
Table name : details  
COULMNS :  
->id (bigint , primary key , autoincrement)  
->name (varchar(100))  
->dob (date)  
->city (varchar(100))  
->college (varchar(100))  
->phone_num (bigint)  
->email (varchar(100))  
->uname (varchar(100))  
->pwd (varchar(100))  
->uploaded (varchar(10))  
Required query :  
```
create table details(id bigint NOT NULL AUTO_INCREMENT PRIMARY KEY , name varchar(100) , dob date ,city varchar(100) , college varchar(100) , phone_num bigint , email varchar(100) , uname varchar(100) , pwd varchar(100) , uploaded varchar(10));

```  
  
  
The line ``` $h = mysqli_connect(); ``` will  
have to be changed according to the MYSQL host ,   in the pages login.php , register.php    
and upload.php  

  


