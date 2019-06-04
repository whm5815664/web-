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
      //将html值存入session
	  $mod=$_POST["mod"];
      $search=$_POST["findfield"];
      
	  $_SESSION["mod"]=$mod;
      $_SESSION["search"]=$search;
	  header("location:search.php");  //跳转至search.php
	  
	  
?>
</body>
</html>
