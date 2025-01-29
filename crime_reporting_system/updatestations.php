<?php

include 'database.php';
$id = $_GET['id'];
$res = $database->viewstationdata($id);

if (isset($_POST) & !empty($_POST)) {
  $name          = $database->sanitize($_POST['name']);
  $address       = $database->sanitize($_POST['address']);

  include 'stations_validations.php';
  $validation = new StationsValidator($name,$address);
  if($validation->emptyinput() == true && $validation->invalidname() == true)
  {
      $ress = $database->updatestation($name,$address,$id);
      if ($ress) {
        echo '<script>alert("Data successfully updated")</script>';
      } else {
        echo '<script>alert("Failed to update the data")</script>';
      }
  }
}
foreach($res as $row) {
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Stations</title>
  <link rel="stylesheet" type="text/css" href="css/stations.css">
</head>
<body>
 <?php 
include 'top_bar.php';
 ?>
    <div class="stations">

        <h2 align="center">Update Stations Details</h2>    
        <form method="POST" name="stations"> 
               
      <br>
        
        <div class="form">
            
        <fieldset>
        	<legend>Stations Details:</legend>
        		<div class="input_field">  

        		<label class="stationdetail">Name</label><br>
            <input class="name" type="name" name="name" value="<?php echo $row['name'];?>"><br><br>
            <label class="stationdetail">Address</label>
            <input class="address" type="address" name="address" value="<?php echo $row['address'];?>"><br><br>
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