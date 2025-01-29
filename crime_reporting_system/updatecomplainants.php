<?php

include 'database.php';
$id = $_GET['id'];
$res = $database->viewcomplainantsdata($id);

if (isset($_POST) & !empty($_POST)) {
  $name          = $database->sanitize($_POST['name']);
  $address       = $database->sanitize($_POST['address']);
  $contactno     = $database->sanitize($_POST['contactno']);
  $emailid       = $database->sanitize($_POST['emailid']);
  $password      = $database->sanitize($_POST['password']);

  include 'complainants_validations.php';
  $validation = new ComplainantsValidator($name,$address,$contactno,$emailid,$password);
  if($validation->emptyinput() == true && $validation->invalidname() == true && $validation->invalidcontactno() == true && $validation->invalidemailid() == true )
  {
      $ress = $database->updatecomplainants($name,$address,$contactno,$emailid,$password,$id);
      if ($ress) {
        echo '<script>alert("Data successfully updated")</script>';

      } else {
        echo '<script>alert("Failed to update the data")</script>';

      }
  }
}

while ($row = mysqli_fetch_array($res)) {
  

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

        <h2 align="center">Update Complainants Details</h2>    
        <form method="POST" name="complainants"> 
               
      <br>
        
        <div class="form">
            
        <fieldset>
        	<legend>Complainants Details:</legend>
        		<div class="input_field">  

        		<label class="complainantsdetail">Name</label>
        		<input class="name" type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
        		<label class="complainantsdetail">Address</label>
        		<input class="address" type="text" name="address" value="<?php echo $row['address']; ?>"><br><br>
        		<label class="complainantsdetail">Contact no.</label>
        		<input class="contactno" type="text" name="contactno" value="<?php echo $row['contact']; ?>"><br>
        		<label class="complainantsdetail">Email id</label>
        		<input class="emailid" type="text" name="emailid" value="<?php echo $row['emailid']; ?>"><br>
        		<label class="complainantsdetail">Password</label>
        		<input class="password" type="text" name="password" value="<?php echo $row['password']; ?>"><br><br><br>
        		<center>
            <button class="button">Submit</button>
        		</center>

        		</div>
        </fieldset>
        </div>
          
     </div>
            </form>
        <br>
</body>
</html>
<?php 
}
?>
<?php
include "footer.php";
?>