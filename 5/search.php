<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ѯ���</title>
<style type="text/css">
<!--
.STYLE2 {font-size: xx-large}
-->
</style>
</head>

<body>
<div align="center"><span class="STYLE2">��ѯ���</span></div>
<?php
   
   $con=mysql_connect("localhost","whm","hm5815664");  //�������ӱ���
   if(!$con){die("�޷�����");}
   mysql_select_db("northwind",$con);                 //Ϊ���ӱ���ѡ�����ݿ�
   
   //$mod=$_POST["mod"];
   //$search=$_POST["findfield"];
   $mod=$_SESSION["mod"];
   $search=$_SESSION["search"];
   
   //ģʽѡ��
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
   if($mod=="�߼�����")
   $str=$search;
   
   $result=mysql_query($str,$con)or die(mysql_error());
   $datanum=mysql_num_rows($result);
   
   $pagesize=5;             //ÿҳ��ʾ�ļ�¼��
   if(isset($_GET["page"])) {$page=$_GET["page"];}   //!��isset����Notice: Undefined index: page�쳣
   if(!isset($_GET["page"])) {$page=1;}
   $begin=($page-1) * $pagesize;
   $totalpage=ceil($datanum/$pagesize);  //��ҳ��
   
   //������
   echo "<br><br><hr>";
   echo "<div align='center'>�Ѳ�ѯ��".$datanum."����¼</div><br>";
   echo "<div align='center'><table border=1>
   <tr><th>��Ա��</th><th>��</th><th>��</th><th>�ƺ�</th><th>����</th></tr>";
    
	//ҳ��
	for($j=1;$j<=$totalpage;$j++)
	{
        echo "<a href=search.php?page=".$j.">[".$j."]&nbsp;</a>";  //ͨ��url��������ҳ�洫�ݲ���
    }
    //sql���where����ϲ�ѯ�������limit
	$query=" limit ".$begin.",".$pagesize." ";
    if($mod=="�߼�����"||"EmployeeID")
	    {$str=$str.$query;}    //!
	else
	    {$str=substr($str,0 ,strlen($str)-24).$query.substr($str,strlen($str)-24);}
	$result=mysql_query($str,$con)or die(mysql_error());
	
	
	for($i=1;$i<=$pagesize;$i++)      //���һҳ�еĽ��
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
