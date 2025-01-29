<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Complainants</title>
  <link rel="stylesheet" type="text/css" href="css/complainants.css">
</head>
<body>
  <?php 
include 'top_bar.php';
 ?>
    <div class="complainants">

        <h2 align="center">Complainants</h2>    
        <form method="POST" name="report_crime"> 
               
      <br>
        
        <div class="form">
            
        		<div class="input_field">  

        		<label class="complainantsdetail">Name</label><br>
        		<input class="name" type="text" name="name" placeholder="Enter your name"><br><br>
        		<label class="complainantsdetail">Address</label>
        		<input class="address" type="text" name="address" placeholder="Enter your address"><br><br>
        		<label class="complainantsdetail">Contact no.</label>
        		<input class="contactno" type="text" name="contactno" placeholder="Enter your contact number"><br>
        		<label class="complainantsdetail">Email id</label>
        		<input class="emailid" type="text" name="emailid" placeholder="Enter your emailid"><br>
        		<label class="complainantsdetail">Password</label>
        		<input class="password" type="text" name="password" placeholder="Enter your Password"><br><br>
        		<center>
            <button class="button">Submit</button>
        		</center>

        		</div>
        </div>
          
     </div>
            </form>
        <br>
</body>
</html>
<?php 

if (isset($_POST)&!empty($_POST)) {

  $name          = $database->sanitize($_POST['name']);
  $address       = $database->sanitize($_POST['address']);
  $contactno     = $database->sanitize($_POST['contactno']);
  $emailid       = $database->sanitize($_POST['emailid']);
  $password      = $database->sanitize($_POST['password']);

  include 'complainants_validations.php';
  $validation = new ComplainantsValidator($name,$address,$contactno,$emailid,$password);
  if($validation->emptyinput() == true && $validation->invalidname() == true && $validation->invalidcontactno() == true && $validation->invalidemailid() == true )
  {
      $res = $database->complainants($name,$address,$contactno,$emailid,$password);
      if ($res)
      {
          echo '<script>alert("Data successfully inserted")</script>';
      }
      else
      {
          echo '<script>alert("Failed to insert data")</script>';
      }

  }
}

?>
<?php
include "footer.php";
?>