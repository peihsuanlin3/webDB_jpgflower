<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>logout</title>
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
<a href="main.html">
<img src="home.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>
<header>
<h1>登出成功！</h1>
</header>

<?php
session_start();
unset($_SESSION['mid']);
	
    session_destroy();
	
?>
</body>
</html>
