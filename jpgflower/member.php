<!DOCTYPE html>
<html lang="en">
<head>
<title>jpgflower</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<style>
* {
  box-sizing: border-box;
}

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
  padding: 50px;
  text-align: center;
  font-size: 35px;
  color: rgb(141, 80, 111);
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 20%;
  height: 500px; /* only for demonstration, should be removed */
  background: rgb(255, 249, 172);
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  padding: 150px;
  width: 100%;
  background-image: url('jpf2.svg');
  background-repeat: repeat-y;
  background-size: 100% 100%r;
  height: 100%; /* only for demonstration, should be removed */
  text-align: center;
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-image: url('foot.svg');
  background-repeat: no-repeat;
  background-size: cover;
  padding-bottom: 280px;
  text-align: left;
  color: rgb(236, 172, 248);
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
th {
  background: #fabe00;
  color: white;
}
tbody tr td{
  background:white;
}
</style>
</head>
<body>
  <a href="cart.php">
  <img src="cart.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>
  <a href="member_record.php">
  <img src="record.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>
  <a href="mainsuccess.html">
  <img src="home.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>
  <a href="creator.php">
  <img src="creator.png" alt="HTML tutorial" style="float:left;width:80px;height:80px;"></a>
<header>


<h1>會員資料</h1>  

<center><?php
	
 	
 $link = mysqli_connect("localhost","a0468","pwd0468");
 mysqli_select_db($link,"a0468");
 mysqli_query($link,"SET NAMES UTF8"); 
 session_start();
 $mid = $_SESSION['mid'];
	  
 $sqlstr = "SELECT name,birthday,phone,email FROM member WHERE mid='".$mid."';";
 $result = mysqli_query($link,$sqlstr);
 $wallet = "select amount from wallet where mid ='".$mid."';";
	  $money = mysqli_query($link,$wallet);
	  $money = mysqli_fetch_assoc($money);
 $record = mysqli_fetch_assoc($result);
 
 echo"<div class='main'>";		
 


  echo"<table><tr>";
 echo"<th>用戶名稱</th>";
 echo"<td>{$record['name']}</td>";
 echo"</tr>";
  
	  echo"<tr>";
 echo"<th>生日</th>";
 echo"<td>{$record['birthday']}</td>";
 echo"</tr>";
  
	  echo"<tr>";
 echo"<th>電話</th>";
 echo"<td>{$record['phone']}</td>";
 echo"</tr>";
  
 echo"<tr>";
 echo"<th>e-mail</th>";
 echo"<td>{$record['email']}</td>";
 echo"</tr>";
 
	  
 echo"<tr>";
 echo"<th>錢包餘額</th>";
 echo"<td>$";echo"{$money['amount']}</td>";
 echo"</tr>";
 echo"</table></div>";
 
 
 
 mysqli_free_result($result);
 mysqli_close($link);
	?></center>

 <img src="wallet.png" alt="HTML tutorial" style="width:80px;height:80px;">
</header>





</body>
</html>
