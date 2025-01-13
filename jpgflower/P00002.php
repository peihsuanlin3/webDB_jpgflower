<!doctype html>
<html>
 <html lang="en">
<head>
<title>jpgflower</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  background-image: url('../../jpf.svg');
  background-repeat: no-repeat;
  background-size: cover;
  padding: 100px;
  text-align: center;
  font-size: 35px;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: right;
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
  background-image: url('../../jpf2.svg');
  background-repeat: repeat-y;
  background-size: 100% 100%;
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
  background-image: url('../../foot.svg');
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
    height: 280px;
  }
}


table{
  align: right;
  width: 80%;
  height: 280px;
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
  margin: auto;
  item-align: center;
  width: 80%;
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
  <a href="cart.php">
  <img src="cart.png" alt="HTML tutorial" style="float:right;width:80px;height:80px;"></a>

<header>
<img src="../pictures/animals/green_bird.jpg" alt="HTML tutorial" style="float:left;border:10px solid #fabe00;height:280px;"></img>
 <?php
 $link = mysqli_connect("localhost","a0468","pwd0468");
 mysqli_select_db($link,"a0468");
 mysqli_query($link,"SET NAMES UTF8"); 
 
 $sqlstr = "select pname,type,pprice,cname from product where pno='P00002';";
 
 $result = mysqli_query($link,$sqlstr);
echo"<table>";
echo"<div class='main'>";  
 
 
  echo"<tr>"; 
  $record = mysqli_fetch_object($result);
 echo"<th>名稱</th>";
 echo"<td>$record->pname</td>";echo"</tr>";
  echo"<tr>"; 
   echo"<th>分類</th>";
 echo"<td>$record->type</td>";echo"</tr>";
  echo"<tr>"; 
   echo"<th>價格</th>";
 echo"<td>$record->pprice</td>";echo"</tr>";
  echo"<tr>"; 
   echo"<th>作者</th>";
 echo"<td>$record->cname</td>";
  echo"</tr>";
  
 
 
 echo"</table>";
 
 
 
 
 
 
 
 
 mysqli_free_result($result);
 mysqli_close($link);
 
 ?>
  <form name="insert_cart" action="insert_join.php" method="POST">
   <input type="hidden" name ='pno' value='P00002'>
  <input type='submit' value="加入購物車"  style="width:150px;height:50px;">
   </form>
</header>                      
</body>
</html>