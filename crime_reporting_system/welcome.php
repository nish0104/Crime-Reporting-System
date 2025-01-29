<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="css/index.css">
   <link rel="shortcut icon" href="img/crimereport.jpeg">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Crime Reporting System</title>
  <link rel="stylesheet" type="text/css" href="css/welcome.css">
</head>
<body>
<div>
	<h2 align="center">Welcome to Crime Reporting System</h2>
</div>
     <ul>
      
     	<li style="float:right"><a href="login.php"><i class="fa fa-fw fa-user"></i>Login</a></li>
     	<li style="float:right"><a class="active" href="welcome.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
     </ul>
    <div class="slider">
     <div class="slideimg"> 
       <img src="img/crimereport.jpeg" alt="Crime Reporting System">
        
        </div>
    </div><br>
    <center>
    	<form action="ask.php">
    	<button class="button butttonrc">Report Crime</button>
    </form>
    </center>
    
</body>
</html>
<?php
include "footer.php";
?>