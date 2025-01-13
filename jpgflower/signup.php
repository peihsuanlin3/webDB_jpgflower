<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: rgb(253, 186, 198);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

/* Style the header */
header {
  background-color: rgb(253, 186, 198);
  background-repeat: no-repeat;
  background-size: cover;
  padding: 210px;
  text-align: center;
  font-size: 35px;
  color: rgb(141, 80, 111);
}
</style>
</head>

<body>
<header>
<?php
	
$name=$_POST['name'];
$email=$_POST['email'];
$birthday=$_POST['birthday'];
$phone=$_POST['phone'];
$pwd=$_POST['pwd'];
	
//connection
$link=mysqli_connect("localhost","a0468","pwd0468");

mysqli_select_db($link,"a0468");
mysqli_query($link,"SET NAMES UTF8");	
	
$sqlstr_0 = "select * from member;";
$result = mysqli_query($link,$sqlstr_0);
$nrow = mysqli_num_rows($result)+1;

//query
$sqlstr="insert into member values('A".$nrow."','".$name."','".$birthday."','".$phone."','".$email."','crm01','".$pwd."');";
$sqlstr2 = "insert into creator values('A".$nrow."','".$name."','crc02');";
$sqlstr3 = "insert into wallet values('A".$nrow."','".$pwd."',0);";
$today = date("Y-m-d H:i:s"); 
$sqlstr4 = "insert into cart values('A".$nrow."','".$today."');";
	
mysqli_query($link,$sqlstr);
	
mysqli_query($link,$sqlstr2);
	
mysqli_query($link,$sqlstr3);
	
mysqli_query($link,$sqlstr4);
	
	mysqli_close($link);
	echo"<a href='login.html' target='_self'>註冊成功!</a>";
	
?>
</header>
</body>
</html>