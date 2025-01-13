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
  padding: 100px;
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
  background-size: cover;
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
  padding-bottom: 310px;
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
table {
  font-family: "Helvetica Neue", Helvetica, sans-serif
}

caption {
  text-align: center;
  font-size: 15px
  color:  rgb(141, 80, 111);
  font-weight: bold;
  text-transform: uppercase;
  padding: 5px;
}

thead {
  background: #fabe00;
  color: white;
}

th,
td {
  padding: 5px 10px;
}

tbody tr td{
  background:white;
}



tfoot {
  background: #f18d44;
  color: white;
  text-align: right;
}

tfoot tr th:last-child {
  font-family: monospace;
}
input{border:0;
  background-color:#fabe00;
  color:#fff;
  border-radius:10px;
  cursor:pointer;}

input:hover{
  color:#fff;
  background-color:#f18d44;
  border:2px #fabe00 solid;
}
</style>
</head>
<body>
  <a href="member.php">
  <img src="member.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>
  <a href="mainsuccess.html">
  <img src="home.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>
<header>

<?php
	
 $link = mysqli_connect("localhost","a0468","pwd0468");
 mysqli_select_db($link,"a0468");
 mysqli_query($link,"SET NAMES UTF8"); 
 session_start();
 $mid = $_SESSION['mid'];	  
 
 $sqlstr = "SELECT item,pprice FROM `join`,product where `join`.mid ='".$mid."' and product.pno = `join`.pno;";
 $result = mysqli_query($link,$sqlstr);
 
 $nrow = mysqli_num_rows($result);
 $i=1;
$total =0;
 		
 echo"<table><caption>購物車</caption>";
echo"<thead>
    <tr>
      <th>商品名稱</th>
      <th>價格</th>
      
    </tr></thead><tbody>";	  
 while($i<=$nrow){
	 $record = mysqli_fetch_assoc($result);
	 $total = $total+$record['pprice'];
  echo"<tr>";
  
	 
 echo"<td>{$record['item']}</td>";
 echo"<td>$";echo"{$record['pprice']}</td>";
 
  $i++;
  echo"</tr>";
  
 }
 
 echo"</tbody><tfoot>";
   echo" <tr>";
      echo"<th colspan='1'>Grand Total</th>";
      echo"<th>$";echo"{$total}</th>";
   echo" </tr>";
 echo" </tfoot></table>";
 
	  echo"<form name='transaction' action='transaction.php' method='POST'>
			<input type='hidden' name ='total' value={$total}>
		<input type='submit' value='結帳'  style='width:150px;height:50px;'>
			</form>";
	  echo"<form name='clean_cart' action='clean_cart.php' method='POST'>
			<input type='hidden' name ='mid' value={$mid}>
		<input type='submit' value='清空購物車'  style='width:150px;height:50px;'>
			</form>";
 
 
 mysqli_free_result($result);
 mysqli_close($link);
	?>
</header>

</body>
</html>