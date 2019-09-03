<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="./css/index.css" />
	<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/jquery.singlePageNav.min.js"></script>
	<script type="text/javascript" src="./js/index.js"></script>
<!-- �� Bootstrap4 ���� CSS �ļ� -->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
 
<!-- jQuery�ļ��������bootstrap.min.js ֮ǰ���� -->
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
 
<!-- popper.min.js ���ڵ�������ʾ�������˵� -->
<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
 
<!-- ���µ� Bootstrap4 ���� JavaScript �ļ� -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单明细</title>
<style>
.head,.main{ width:1020px;margin: 0 auto;background: #f3f5f6;}
.head{ height:100px; background: #f3f5f6}
.left{ width:280px; height:600px;  float: left; background: #f3f5f6}
.right{ width:740px; height:600px;background: #f3f5f6; float:right;border-left-style:groove;border-left-color:"#104E8B" }
.footer{ height:50px; background: #353a40;clear:both;}

.class1{border:0  px;height:300px;width:280px;margin:0px;float:left;}
.class2{margin-top:2px; margin-right:1px;height:578px;width:980px;float:right;}
.class3{border:0px;top:150px;width:280px;height:310px;}
.to{width:150px;height:150px;border-radius:150px}
	.line1{}



.STYLE1 {font-size: 24px}
.STYLE2 {font-size: x-large}
.STYLE3 {font-size: large}
</style>
</head>

<body bgcolor="	#E6E6FA">
	<?php
	   //创建连接变量 接入数据
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("�޷�����");}
	   //ѡ�񶩲����ݿ�
	   mysql_select_db("ding can",$con); 
	   
	   //��ȡ�û���Ϣ
	   $username=$_SESSION["username"];  
	   $str="select * from user where username=".$username;  
	   $result=mysql_query($str,$con)or die(mysql_error());
	   $row=mysql_fetch_array($result);
	   
	   $truename=$row['truename'];
	   $address=$row['address'];
	   $tel=$row['tel'];          
	?>
	
	
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
 <!-- �����̵� -->
  <a href="order.php" class="navbar-brand STYLE1">返回上一页</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
 
</nav>
<div class="main">
    <div class="left">
    	<div class="class3">
			<br  />
			<center><img src="./img/test1.jpg" class="to" ></center> 
			<h3 align="center" class="text-muted" ><b>个人中心</b></h3>
			<hr />
			<p align="left"  class="text-muted STYLE2">账户：<?php echo $username ?></p>
			<p align="left"  class="text-muted STYLE2">姓名：<?php echo $truename ?></p>
			<p align="left"  class="text-muted STYLE2">地址：<?php echo $address ?> </p>
			<p align="left"  class="text-muted STYLE2">电话：<?php echo $tel ?></p>		
		</div>
	</div>

    <!-- ������Ϣ -->
	<div class="right">
        <div class="r_sub_left">
			
			<p>
			  <div align='center'><table border=1>
              <tr><th class='text-muted STYLE1'>订单明细</th></tr>
			  <?php
			     if(isset($_POST["orderlist"]))
				   {$ordernumber=$_POST['orderlist']; $_SESSION["ordernumber"]=$ordernumber;}
				 
				   $ordernumber=$_SESSION["ordernumber"];
				 
				 $str="select * from orderfood where ordernumber=".$ordernumber; 
			     $result=mysql_query($str,$con)or die(mysql_error());
				 $datanum=mysql_num_rows($result);
                 $pagesize=5;             //ÿҳ��ʾ�ļ�¼��
				 if(isset($_GET["page"])) {$page=$_GET["page"];}   //!��isset�����쳣
                 if(!isset($_GET["page"])) {$page=1;}
                 $begin=($page-1) * $pagesize;
                 $totalpage=ceil($datanum/$pagesize);  //��ҳ��
				 
				 //������
                 echo "<br><br><hr>";
                 echo "<div align='center' class='text-muted STYLE2'>已查询到".$datanum."条记录</div><br>";
                 echo "<div align='center'><table border=1 width=210 height=150>
                       <tr><th width=60>账户</th><th width=140> ".$username." </th></tr>";
				 echo "<tr><th width=70>序号</th><th width=70>食物</th><th width=70>价格</th></tr>";
				 
				 //ҳ��
	             for($j=1;$j<=$totalpage;$j++)
	             {
                     echo "<a href=orderfood.php?page=".$j.">[".$j."]&nbsp;</a>";  //ͨ��url��������ҳ�洫�ݲ���
                 } 
				 
                 //sql���where����ϲ�ѯ�������limit
				 $str=$str." limit ".$begin.",".$pagesize." ";
				 $result=mysql_query($str,$con)or die(mysql_error());
				 echo "<form action=orderfood.php method=post>";
				 for($i=1;$i<=$pagesize;$i++)      //���һҳ�еĽ��
				 {
				      $row=mysql_fetch_array($result);
					  echo "<tr>";
					  echo "<td width=70>".$i."</td>";
					  echo "<td width=70>".$row['food']." </td>";
					  echo "<td width=70>".$row['price']." </td>";
					  echo "</th>";		  
				 }
				 echo "</table>";
				 
			 ?>
		    </div>
  </div>

</div>
</div>			
       
<div class="footer" style="color: aliceblue">
	<p  align="center" >2019��7��</p>
</div>
</body>


</html>
