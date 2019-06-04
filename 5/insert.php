<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>插入操作</title>
</head>

<body>
<?php
   $con=mysql_connect("localhost","whm","hm5815664");  //创建连接变量
   if(!$con){die("无法连接");}
   mysql_select_db("northwind",$con);                 //为连接变量选择数据库
   
   $EmployeeID=$_POST["EmployeeID"];
   $LastName=$_POST["LastName"];
   $FirstName=$_POST["FirstName"];
   $TitleOfCourtesy=$_POST["TitleOfCourtesy"];
   $City=$_POST["City"];
   
   $insert="insert into employees values('".$EmployeeID."','".$LastName."','".$FirstName."','".$TitleOfCourtesy."','".$City."')";
   mysql_query($insert,$con)or die(mysql_error());
   echo "插入成功";
   mysql_close($con);
?>
</body>
</html>
