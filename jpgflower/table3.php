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
table{
  width: 100%;
  border-collapse: collapse;
	 font-size:20px;
}

table tr{
  border-bottom: solid 2px white;
}

table tr:last-child{
  border-bottom: none;
}

table th{
  position: relative;
  width: 30%;
  background-color: #fabe00;
  color: white;
  text-align: center;
  padding: 10px 0;
}

table th:after{
  display: block;
  content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  top:calc(50% - 10px);
  right:-10px;
  border-left: 10px solid #f18d44;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}

table td{
  text-align: left;
  width: 70%;
  text-align: center;
  background-color: #efefef;
  padding: 10px 0;
}

.main {
  margin: 20px auto;
  item-align: center;
  width: 80%;
}
</style>
</head>
<body>
<button onclick="document.location='table1.php'">報表1</button>
<button onclick="document.location='table2.php'">報表2</button>
<button onclick="document.location='table3.php'">報表3</button>

<header>
  
  
<h1>#報表3</h1><br>
		  <h2>創作者作品數總覽表</h2>
		  <h3>（查看各創作者之商品數貢獻）</h3>
</header>

<?php
	
 $link = mysqli_connect("localhost","a0468","pwd0468");
 mysqli_select_db($link,"a0468");
 mysqli_query($link,"SET NAMES UTF8"); 
 
 $sqlstr = "SELECT cname, count(*) FROM product GROUP BY cname HAVING count(*) >=1 ORDER BY count(*) DESC";
 $result = mysqli_query($link,$sqlstr);
 
 $nrow = mysqli_num_rows($result);
 $i=1;
 echo"<div class='main'>";		
 echo"<table><tr><th>創作者名稱</th><td>作品數量</td></tr>";
 while($i<=$nrow){
	 
  echo"<tr>";
  $record = mysqli_fetch_assoc($result);
 echo"<th>{$record['cname']}</th>";
 echo"<td>{$record['count(*)']}</td>";
 
  $i++;
  echo"</tr>";
  
 }
 
 echo"</table></div>";
 
 
 
 mysqli_free_result($result);
 mysqli_close($link);
	?>

</body>
</html>