<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>正在购买</title>
</head>

<body>
<?php
	   //创建连接变量 接入数据库
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("无法连接");}
	   //选择订餐数据库
	   mysql_select_db("ding can",$con); 
	   //基础信息
	   $username=$_SESSION["username"];
	   $restaurantID="0001";
	   
	    //创建订单号
		$str2="select * from orderlist";
		$result2=mysql_query($str2,$con)or die(mysql_error());
	    $ordernumber=mysql_num_rows($result2)+1;
		
		//获取复选框菜品ID
		if(empty($_POST["food"]))
        {echo "<script>alert('您没选择菜品');location.href='Orderxiaochuan.html';</script>";}
        else
        {$food=$_POST["food"];}
		
		//录入信息至购物车
		$choose=count($food);
		for($i=0;$i<$choose;$i++)
		{
		    $foodID=intval($food[$i]);
		   
		    $sql="insert into shopcar values(".$username.",".$ordernumber.",'".$foodID."','".$restaurantID."')";
			mysql_query($sql,$con)or die("38");
			
		}
		
		echo "<script>alert('加入购物车成功');location.href='Orderxiaochuan.html';</script>";
		
	   
?>
</body>
</html>
