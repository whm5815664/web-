<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
      session_start(); 
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>

<body>
<?php
	  $username=$_POST["username"];
      $password=$_POST["password"];
 
	  
	   
	   //创建连接变量 接入数据库
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("无法连接");}
	   
	   //选择订餐数据库
	   mysql_select_db("ding can",$con);                 //为连接变量选择数据库
	  
	  //查询用户密码并与输入对比
	  $str="select * from user where username=".$username;
	  $result=mysql_query($str,$con)or die("<script>alert('非法操作');location.href='login.html';</script>");
	  $row=mysql_fetch_array($result);
	  $password2=$row['password'];
	  if(mysql_num_rows($result)<1)
	  {
	        echo "<script>alert('账号不存在');location.href='login.html';</script>";  //账号不存在，无法登录跳转回原页面
	  }
	  if($password!=$password2)
	  {
	      echo "<script>alert('密码错误');location.href='login.html';</script>";  //密码错误，无法登录跳转回原页面
	  }
	  if($password==$password2)
	  {
	      $_SESSION["username"]=$username;
		  $_SESSION["password"]=$password;
		  mysql_close($con);
		  header("location:order.php");  //密码正确，跳转菜单
	  }
	 
?>
</body>
</html>
