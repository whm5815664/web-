<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>buy</title>
</head>

<body>
<?php
       //创建连接变量 接入数据库
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("无法连接");}
	   //选择订餐数据库
	   mysql_select_db("ding can",$con); 
	  
	  $username=$_SESSION["username"]; 
	  $choose=$_POST['choose']; 
	  //选择删除，清空表格
	  if($choose==0)
	  {
	       $str="truncate table shopcar";
		   mysql_query($str,$con)or die(mysql_error());
		   echo "<script>alert('已删除订单');location.href='order.php';</script>";
	  }
	  
	  //选择购买，将数据录入
	  if($choose==1)
	  {
	        
			//填写orderlist表
			//创建订单号
			echo "<tr><th>订单号：</th></tr>";
			$str="select * from orderlist";
			$result=mysql_query($str,$con)or die(mysql_error());
			$ordernumber=mysql_num_rows($result)+1;
			$sql="insert into orderlist(username,ordernumber) values(".$username.",".$ordernumber.")";
			mysql_query($sql,$con)or die("38");
			
			//填写orderfood表
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
				 $food=$row2['food'];  $price=$row2['price'];   //得到食品与价格
				 
				 $sql="insert into orderfood values(".$ordernumber.",'".$food."',".$price.",".$restaurantID.")";  //录入
				 mysql_query($sql,$con)or die("54");
			} 
			
			$str="truncate table shopcar";
		    mysql_query($str,$con)or die(mysql_error());
			echo "<script>alert('交易完成');location.href='order.php';</script>";
	  }
?>
</body>
</html>
