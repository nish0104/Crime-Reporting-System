<?php

include 'database.php';
$id = $_GET['id'];
$res = $database->viewpoliceofficerdata($id);

if (isset($_POST) & !empty($_POST)) {

  $station_id = $_POST['station_id'];
  $name          = $database->sanitize($_POST['name']);
  $designation   = $database->sanitize($_POST['designation']);
  $contactno     = $database->sanitize($_POST['contactno']);

  include 'policeofficer_validations.php';
  $validation = new PoliceofficerValidator($station_id,$name, $designation, $contactno);
  if($validation->emptyinput() == true && $validation->invalidname() == true && $validation->invaliddesignation() == true && $validation->invalidcontactno() == true)
  {
      $ress = $database->updatepoliceofficer($station_id,$name,$designation,$contactno,$id);
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
	<title>Police Officer Details</title>
  <link rel="stylesheet" type="text/css" href="css/policeofficer_details.css">
</head>
<body>
 <?php 
include 'top_bar.php';
 ?>
    <div class="policeofficer">

        <h2 align="center">Update Police Officer Details</h2>    
        <form method="POST" name="policeofficer"> 
               
      <br>
        
        <div class="form">
            
        <fieldset>
        	<legend>Police Officer Details:</legend>
        		<div class="input_field">  
 
            <label for="" class="policeofficerdetail">Station</label>
      <select name="station_id" id="" class="custom-select select2">
        <option value=""></option>
        <?php
          $rres = $database->stationname();
          while($rrow= mysqli_fetch_array($rres)):
        ?>
        <option value="<?php echo $rrow['id'] ?>" <?php echo isset($station_id) && $station_id == $rrow['id'] ? 'selected' : '' ?>><?php echo ucwords($rrow['name']) ?></option>
      <?php endwhile; ?>
      </select><br><br>
        		<label class="policeofficerdetail">Name</label>
        		<input class="name" type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
        		<label class="policeofficerdetail">Designation</label>
        		<input class="designation" type="text" name="designation" value="<?php echo $row['designation']; ?>"><br><br>
        		<label class="policeofficerdetail">Contact no.</label>
        		<input class="contactno" type="text" name="contactno" value="<?php echo $row['contactno']; ?>"><br><br><br>
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