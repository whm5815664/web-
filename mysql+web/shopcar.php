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
<!-- 新 Bootstrap4 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
 
<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
 
<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人主页</title>
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
	   //创建连接变量 接入数据库
	   $con=mysql_connect("localhost","whm","hm5815664");  
	   if(!$con){die("无法连接");}
	   //选择订餐数据库
	   mysql_select_db("ding can",$con); 
	   
	   //读取用户信息
	   $username=$_SESSION["username"];  
	   $str="select * from user where username=".$username;  
	   $result=mysql_query($str,$con)or die(mysql_error());
	   $row=mysql_fetch_array($result);
	   
	   $truename=$row['truename'];
	   $address=$row['address'];
	   $tel=$row['tel'];          
	?>
	
	
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
 <!-- 连接商店 -->
  <a href="#" class="navbar-brand STYLE1">返回商城</a>&nbsp;&nbsp;
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
			<p align="left"  class="text-muted STYLE2">账号：<?php echo $username ?></p>
			<p align="left"  class="text-muted STYLE2">用户名：<?php echo $truename ?></p>
			<p align="left"  class="text-muted STYLE2">所在地：<?php echo $address ?> </p>
			<p align="left"  class="text-muted STYLE2">电话：<?php echo $tel ?></p>		
		</div>
	</div>

    <!-- 订单信息 -->
	<div class="right">
        <div class="r_sub_left">
			
			<p>
			  <div align='center'><table border=1>
              <tr class='text-muted STYLE1'><th>购物车</th></tr>
			  <?php
			     $str="select * from shopcar";
			     $result=mysql_query($str,$con)or die(mysql_error());
				 $datanum=mysql_num_rows($result);
				 
				 //购物车为空，返回
				 if($datanum<1)
				 {
				     echo "<script>alert('当前购物车为空');location.href='order.php';</script>";
				 }
				 
                 //购物车不为空，打印购物车
				 $pagesize=5;             //每页显示的记录数
				 if(isset($_GET["page"])) {$page=$_GET["page"];}   //!用isset消除异常
                 if(!isset($_GET["page"])) {$page=1;}
                 $begin=($page-1) * $pagesize;
                 $totalpage=ceil($datanum/$pagesize);  //总页数
				 
				 //结果输出
                 echo "<br><br><hr>";
                 echo "<div align='center' class='text-muted STYLE2'>已查询到".$datanum."条记录</div><br>";
                 echo "<div align='center'><table border=1 width=210>
                       <tr height=50><th width=60><div class='text-muted STYLE3'>用户</div></th><th width=140><div class='text-muted STYLE3'>".$username."</div></th></tr>";
				 //创建订单号
				 echo "<tr height=50><th width=60><div class='text-muted STYLE3'>订单号：</div></th>";
				 $str2="select * from orderlist";
				 $result2=mysql_query($str2,$con)or die(mysql_error());
				 $ordernumber=mysql_num_rows($result)+1;
				 echo "<th width=140><div class='text-muted STYLE3'>".$ordernumber."</div></th>";
				 
				 //页码
				 echo "<tr height=50><th width=70><div align=center class='text-muted STYLE3'>序号</th><th width=70><div align=center class='text-muted STYLE3'>食品</th><th width=70><div align=center class='text-muted STYLE3'>价格</th>";
	             for($j=1;$j<=$totalpage;$j++)
	             {
                     echo "<a href=order.php?page=".$j.">[".$j."]&nbsp;</a>";  //通过url传向其它页面传递参数
                 } 
				 
                 //sql语句where后加上查询输出限制limit
				 $str=$str." limit ".$begin.",".$pagesize." ";
				 $result=mysql_query($str,$con)or die("133");                   
				 for($i=1;$i<=$pagesize&&$i<=mysql_num_rows($result);$i++)      //输出一页中的结果
				 {
				      $row=mysql_fetch_array($result);
					  echo "<tr height=50>";
					  echo "<td width=70><div align=center class='text-muted STYLE3'>".$i."</td>";
					  
					  $foodID=$row['foodID']; $restaurantID=$row['restaurantID'];
					  $str2="select * from food where foodID='".$foodID."' And restaurantID='".$restaurantID."'";
					  $result2=mysql_query($str2,$con)or die("143");
					  $row2=mysql_fetch_array($result2);
					  
					  echo "<td width=70><div align=center class='text-muted STYLE3'>".$row2['food']." </td>";
					  echo "<td width=70><div align=center class='text-muted STYLE3'>".$row2['price']." </td>";
					  echo "</th>";		  
				 }
				 echo "</table>";
				 
				 echo "<form action=buy.php method=post>";
				 echo "<br><input name=choose type=radio value=1>购买&nbsp;&nbsp;&nbsp;<input name=choose type=radio value=0>取消";
				 echo "<br><br><button type=submit class='text-muted STYLE2'>提交</button>";
				 echo "</form>";
			 ?>
		    </div>
  </div>

</div>
</div>			
       
<div class="footer" style="color: aliceblue">
	<p  align="center" >2019年7月</p>
</div>
</body>


</html>
