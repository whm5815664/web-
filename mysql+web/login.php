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
 
	  
	   
	   //�������ӱ��� �������ݿ�
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("�޷�����");}
	   
	   //ѡ�񶩲����ݿ�
	   mysql_select_db("ding can",$con);                 //Ϊ���ӱ���ѡ�����ݿ�
	  
	  //��ѯ�û����벢������Ա�
	  $str="select * from user where username=".$username;
	  $result=mysql_query($str,$con)or die("<script>alert('�Ƿ�����');location.href='login.html';</script>");
	  $row=mysql_fetch_array($result);
	  $password2=$row['password'];
	  if(mysql_num_rows($result)<1)
	  {
	        echo "<script>alert('�˺Ų�����');location.href='login.html';</script>";  //�˺Ų����ڣ��޷���¼��ת��ԭҳ��
	  }
	  if($password!=$password2)
	  {
	      echo "<script>alert('�������');location.href='login.html';</script>";  //��������޷���¼��ת��ԭҳ��
	  }
	  if($password==$password2)
	  {
	      $_SESSION["username"]=$username;
		  $_SESSION["password"]=$password;
		  mysql_close($con);
		  header("location:order.php");  //������ȷ����ת�˵�
	  }
	 
?>
</body>
</html>
