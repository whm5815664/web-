<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ڹ���</title>
</head>

<body>
<?php
	   //�������ӱ��� �������ݿ�
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("�޷�����");}
	   //ѡ�񶩲����ݿ�
	   mysql_select_db("ding can",$con); 
	   //������Ϣ
	   $username=$_SESSION["username"];
	   $restaurantID="0001";
	   
	    //����������
		$str2="select * from orderlist";
		$result2=mysql_query($str2,$con)or die(mysql_error());
	    $ordernumber=mysql_num_rows($result2)+1;
		
		//��ȡ��ѡ���ƷID
		if(empty($_POST["food"]))
        {echo "<script>alert('��ûѡ���Ʒ');location.href='Orderxiaochuan.html';</script>";}
        else
        {$food=$_POST["food"];}
		
		//¼����Ϣ�����ﳵ
		$choose=count($food);
		for($i=0;$i<$choose;$i++)
		{
		    $foodID=intval($food[$i]);
		   
		    $sql="insert into shopcar values(".$username.",".$ordernumber.",'".$foodID."','".$restaurantID."')";
			mysql_query($sql,$con)or die("38");
			
		}
		
		echo "<script>alert('���빺�ﳵ�ɹ�');location.href='Orderxiaochuan.html';</script>";
		
	   
?>
</body>
</html>
