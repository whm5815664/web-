<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>buy</title>
</head>

<body>
<?php
       //�������ӱ��� �������ݿ�
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("�޷�����");}
	   //ѡ�񶩲����ݿ�
	   mysql_select_db("ding can",$con); 
	  
	  $username=$_SESSION["username"]; 
	  $choose=$_POST['choose']; 
	  //ѡ��ɾ������ձ��
	  if($choose==0)
	  {
	       $str="truncate table shopcar";
		   mysql_query($str,$con)or die(mysql_error());
		   echo "<script>alert('��ɾ������');location.href='order.php';</script>";
	  }
	  
	  //ѡ���򣬽�����¼��
	  if($choose==1)
	  {
	        
			//��дorderlist��
			//����������
			echo "<tr><th>�����ţ�</th></tr>";
			$str="select * from orderlist";
			$result=mysql_query($str,$con)or die(mysql_error());
			$ordernumber=mysql_num_rows($result)+1;
			$sql="insert into orderlist(username,ordernumber) values(".$username.",".$ordernumber.")";
			mysql_query($sql,$con)or die("38");
			
			//��дorderfood��
			$str="select * from shopcar";
			$result=mysql_query($str,$con)or die(mysql_error());
		    $datanum=mysql_num_rows($result);		
			for($i=1;$i<=$datanum;$i++)
			{
			     $row=mysql_fetch_array($result);
				 $foodID=$row['foodID']; $restaurantID=$row['restaurantID']; 
				 $str2="select * from food where foodID='".$foodID."' and restaurantID='".$restaurantID."'";
				 $result2=mysql_query($str2,$con)or die(mysql_error());
			     $row2=mysql_fetch_array($result2);
				 $food=$row2['food'];  $price=$row2['price'];   //�õ�ʳƷ��۸�
				 
				 $sql="insert into orderfood values(".$ordernumber.",'".$food."',".$price.",".$restaurantID.")";  //¼��
				 mysql_query($sql,$con)or die("54");
			} 
			
			$str="truncate table shopcar";
		    mysql_query($str,$con)or die(mysql_error());
			echo "<script>alert('�������');location.href='order.php';</script>";
	  }
?>
</body>
</html>
