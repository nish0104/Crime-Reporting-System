<?php
include 'database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ask the User</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/ask.css">
</head>
<body>
       
        
            <br><br><br>
            <form method="post" name="ask" class="form"> 
               
      <br>
        <div class="formspace">
        <center><br><br><br>
     	<label style="font-size: 18px;">Do you want to report crime without doing login?</label><br><br><br>
     	<input type="radio" name="yesno" value="Yes">Yes&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
     	<input type="radio" name="yesno" value="No">No<br><br><br>
     	<input class="button" type="submit" name="submit_btn" value="Submit"/><br>
        </center>
   
        </div>  
     
            </form>
        <br>
        
        
    </body>
</html>
<?php
if (isset($_POST)&!empty($_POST)) {

  $answer    = $_POST['yesno'];
  
  if ($answer=="Yes") {
    header("location:report_crime.php?user=Anonymous");
  } else {
    header("location:login.php");

  }


}

?>
<br><br><br><br><br><br><br><br><br><br><br><!--__-->
<?php
include "footer.php";
?>


