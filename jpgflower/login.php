<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: rgb(253, 186, 198);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
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
	
$accid=$_POST['email'];
$accpd=$_POST['password'];

//connection
$link=mysqli_connect("localhost","a0468","pwd0468");

mysqli_select_db($link,"a0468");

//query
$sqlstr="SELECT * FROM member WHERE password='".$accpd."' AND email='".$accid."'";
$result = mysqli_query($link,$sqlstr);

$sqlstr2="SELECT mid FROM member WHERE password='".$accpd."' AND email='".$accid."'";	
$cart_mid = mysqli_query($link,$sqlstr2);
$cart_mid = $cart_mid->fetch_assoc();
//process
if(mysqli_num_rows($result)==1)
{ 
    echo "<a href='mainsuccess.html' target='_self'>login success!</a>";
	session_start();
	$_SESSION['mid'] = $cart_mid['mid'];
header("Location: mainsuccess.html"); 

}
else if($accid=="jpgflower@.gmail.com" && $accpd=='12345')
{ 
    echo "<a href='manager.html' target='_self'>login success!</a>";
    session_start();
    $_SESSION['aid'] = 12345;
header("Location: manager.html"); 

	
}
else
{ 
echo "<a href='login.html' target='_self'>登入失敗!</a>"; 

}



mysqli_free_result($result);
mysqli_close($link);

?>
</header>

</body>
</html>