<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Police Officer</title>
	<link rel="stylesheet" type="text/css" href="css/policeofficer_details.css">
</head>
<body>
<?php 
include('top_bar.php');
?> 

<div class="policeofficer">
	<h2 align="center">Police Officer Details</h2>

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
          $res = $database->stationname();
          while($row= mysqli_fetch_array($res)):
        ?>
        <option value="<?php echo $row['id'] ?>" <?php echo isset($station_id) && $station_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
      <?php endwhile; ?>
      </select><br><br>

        		<label class="policeofficerdetail">Name</label><br>
        		<input class="name" type="name" name="name" placeholder="Enter Police Officer Name"><br><br>
        		<label class="policeofficerdetail">Designation</label>
        		<input class="designation" type="designation" name="designation" placeholder="Enter Designation"><br><br>
        		<label class="policeofficerdetail">Contact no.</label>
            <input class="contactno" type="text" name="contactno" placeholder="Enter Contact number"><br><br>
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
  
  $station_id = $_POST['station_id'];
  $name          = $database->sanitize($_POST['name']);
  $designation   = $database->sanitize($_POST['designation']);
  $contactno     = $database->sanitize($_POST['contactno']);
 
  include 'policeofficer_validations.php';
  $validation = new PoliceofficerValidator($station_id,$name, $designation, $contactno);
  if($validation->emptyinput() == true && $validation->invalidname() == true && $validation->invaliddesignation() == true && $validation->invalidcontactno() == true)
  {
      $res = $database->policeofficerdetail($station_id,$name, $designation, $contactno);
      if ($res) 
      {
        echo '<script>alert("Data successfully inserted")</script>';
      }
      else 
      {
        echo '<script>alert("Failed to Login")</script>';
      }
  }

}

?>
<?php
include "footer.php";
?>