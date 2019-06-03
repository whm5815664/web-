<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>本页面</title>
</head>

<body>
<?php
if(empty($_POST["name"]))
{echo "提示：名字是必填的<br>";exit;}
else
$name=$_POST["name"];
if(empty($_POST["sex"]))
{echo "提示：性别是必填的<br>";exit;}
else
$sex=$_POST["sex"];
if(empty($_POST["checkbox"]))
{echo "提示：爱好是必填的<br>";exit;}
else
{$hobby=$_POST["checkbox"];}

if($sex=="女") $str="女士"; else $str="先生";
echo $name.$str.",欢迎您访问本页面<br>";
echo "你的个人资料如下：<br>";
echo "姓名:".$name."<br>";
echo "性别:".$sex."<br>";
echo "爱好:".implode(" ",$hobby);   //将数组变成字符串
?>
</body>
</html>
