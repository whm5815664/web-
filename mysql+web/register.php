<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册(register)</title>
</head>

<body>
<?php
       $username=$_POST["username"];
	   $truename=$_POST["truename"];
	   $password=$_POST["password1"];
	   $tel=$_POST["tel"];
	   $address=$_POST["address"];
	   
	    //创建连接变量 接入数据库
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("无法连接");}
	   
	   //选择订餐数据库
	   mysql_select_db("ding can",$con);                 //为连接变量选择数据库
	   
	   //验证账户是否重复
	   $str="select username from user where username=".$username;
	   $result=mysql_query($str,$con)or die(mysql_error());
	   if(mysql_num_rows($result)!=0)
	   {
	        echo "<script>alert('账号已存在');location.href='register.html';</script>";  //账号已存在，转回原页面
	   }
	   
	   //录入信息
	   $insert="insert into user(username,truename,address,tel,password) values('".$username."','".$truename."','".$address."','".$tel."','". $password."')";
	   mysql_query($insert,$con)or die(mysql_error());  
	   mysql_close($con);
       header("location:login.html");
?>
</body>
</html>
