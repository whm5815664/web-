<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ɾ������</title>
</head>

<body>
<?php
   $con=mysql_connect("localhost","whm","hm5815664");  //�������ӱ���
   if(!$con){die("�޷�����");}
   mysql_select_db("northwind",$con);                 //Ϊ���ӱ���ѡ�����ݿ�
   
   $mod=$_POST["mod"];
   $deletefield=$_POST["deletefield"];
   
   if($mod=="EmployeeID")
   {$str="delete from employees where EmployeeID=".$deletefield;}
   if($mod=="sql")
   {$str=$deletefield;}
   
   mysql_query($str,$con)or die(mysql_error());
   echo "ɾ���ɹ�";
   mysql_close($con);
?>
</body>
</html>
