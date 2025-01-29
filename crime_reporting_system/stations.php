<?php
include 'database.php';
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
include('top_bar.php');
?> 

<div class="stations">
	<h2 align="center">Police Stations Details</h2>

    <form method="POST" name="stations">
      <br>
      <div class="form">
         <fieldset>
         <legend>Police Stations Details:</legend>
        <div class="input_field">  
           
        		<label class="stationdetail">Name</label><br>
        		<input class="name" type="name" name="name" placeholder="Enter Station name"><br><br>
        		<label class="stationdetail">Address</label>
        		<input class="address" type="address" name="address" placeholder="Enter Station address"><br><br>
        		
        		<center>
            <button class="button">Submit</button>
        		</center>

        		</div>
            </fieldset>
        	</div>
    </form>
</div>

</body>
</html>
<?php 

if (isset($_POST)&!empty($_POST)) {

  $name          = $database->sanitize($_POST['name']);
  $address       = $database->sanitize($_POST['address']);
 
  include 'stations_validations.php';
  $validation = new StationsValidator($name,$address);
  if($validation->emptyinput() == true && $validation->invalidname() == true)
  {
      $res = $database->stations($name, $address);
      if ($res) {
        echo '<script>alert("Data successfully inserted")</script>';

      } else {
        echo '<script>alert("Failed to insert data")</script>';
      }
  }

}

?>
<?php
include "footer.php";
?>