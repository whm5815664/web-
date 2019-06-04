<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>查询结果</title>
<style type="text/css">
<!--
.STYLE2 {font-size: xx-large}
-->
</style>
</head>

<body>
<div align="center"><span class="STYLE2">查询结果</span></div>
<?php
   
   $con=mysql_connect("localhost","whm","hm5815664");  //创建连接变量
   if(!$con){die("无法连接");}
   mysql_select_db("northwind",$con);                 //为连接变量选择数据库
   
   //$mod=$_POST["mod"];
   //$search=$_POST["findfield"];
   $mod=$_SESSION["mod"];
   $search=$_SESSION["search"];
   
   //模式选择
   if($mod=="EmployeeID") 
   $str="select * from employees where EmployeeID=".$search;
   if($mod=="LastName") 
   $str="select * from employees where LastName='".$search."' order by EmployeeID ASC";
   if($mod=="FirstName") 
   $str="select * from employees where FirstName='".$search."' order by EmployeeID ASC";
   if($mod=="TitleOfCourtesy")
   $str="select * from employees where TitleOfCourtesy='".$search."' order by EmployeeID ASC";
   if($mod=="City")
   $str="select * from employees where City='".$search."' order by EmployeeID ASC";
   if($mod=="高级检索")
   $str=$search;
   
   $result=mysql_query($str,$con)or die(mysql_error());
   $datanum=mysql_num_rows($result);
   
   $pagesize=5;             //每页显示的记录数
   if(isset($_GET["page"])) {$page=$_GET["page"];}   //!用isset消除Notice: Undefined index: page异常
   if(!isset($_GET["page"])) {$page=1;}
   $begin=($page-1) * $pagesize;
   $totalpage=ceil($datanum/$pagesize);  //总页数
   
   //结果输出
   echo "<br><br><hr>";
   echo "<div align='center'>已查询到".$datanum."条记录</div><br>";
   echo "<div align='center'><table border=1>
   <tr><th>雇员号</th><th>姓</th><th>名</th><th>称呼</th><th>城市</th></tr>";
    
	//页码
	for($j=1;$j<=$totalpage;$j++)
	{
        echo "<a href=search.php?page=".$j.">[".$j."]&nbsp;</a>";  //通过url传向其它页面传递参数
    }
    //sql语句where后加上查询输出限制limit
	$query=" limit ".$begin.",".$pagesize." ";
    if($mod=="高级检索"||"EmployeeID")
	    {$str=$str.$query;}    //!
	else
	    {$str=substr($str,0 ,strlen($str)-24).$query.substr($str,strlen($str)-24);}
	$result=mysql_query($str,$con)or die(mysql_error());
	
	
	for($i=1;$i<=$pagesize;$i++)      //输出一页中的结果
   {
      $row=mysql_fetch_array($result);
	  echo "<tr>";
	  echo "<td>".$row['EmployeeID']."</td>";
      echo "<td>".$row['LastName']."</td>";
	  echo "<td>".$row['FirstName']."</td>";
	  echo "<td>".$row['TitleOfCourtesy']."</td>";
	  echo "<td>".$row['City']."</td>";
	  echo "</tr>";
	  echo "</div>";
    }
	echo "</table>";
	mysql_close($con);
	//session_destroy();   
?> 
</body>
</html>
