<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ҳ��</title>
</head>

<body>
<?php
if(empty($_POST["name"]))
{echo "��ʾ�������Ǳ����<br>";exit;}
else
$name=$_POST["name"];
if(empty($_POST["sex"]))
{echo "��ʾ���Ա��Ǳ����<br>";exit;}
else
$sex=$_POST["sex"];
if(empty($_POST["checkbox"]))
{echo "��ʾ�������Ǳ����<br>";exit;}
else
{$hobby=$_POST["checkbox"];}

if($sex=="Ů") $str="Ůʿ"; else $str="����";
echo $name.$str.",��ӭ�����ʱ�ҳ��<br>";
echo "��ĸ����������£�<br>";
echo "����:".$name."<br>";
echo "�Ա�:".$sex."<br>";
echo "����:".implode(" ",$hobby);   //���������ַ���
?>
</body>
</html>
