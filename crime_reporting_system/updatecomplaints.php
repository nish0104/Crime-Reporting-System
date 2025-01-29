<?php
include 'database.php';
$id = $_GET['id'];
$res = $database->viewcomplaintsdata($id);

if(isset($_POST['updatesubmit']))
{

        if (isset($_POST) & !empty($_POST)) {
          $user  = $database->sanitize($_POST['user']);  
          $date          = $_POST['date'];
          $type_of_crime = $database->sanitize($_POST['type_of_crime']);
          $incident      = $database->sanitize($_POST['incident']);
          $criminaldetail      = $database->sanitize($_POST['criminal']);
          $newimage = $_FILES['fileToUpload']['name'];
          $oldimage = $_POST['fileToUpload_old'];
          if($newimage != '')
          {
              $update_filename = $_FILES['fileToUpload']['name'];
          } 
          else
          {
              $update_filename = $oldimage;
          } 
   
            $allowed_extension  = array('gif','png','jpg','jpeg');
            $filename = $_FILES['fileToUpload']['name'];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            if($_FILES['fileToUpload']['name'] != '')
            {
                 if(!in_array($file_extension, $allowed_extension))
                {
                  echo '<script>alert("You are allowed with only gif , png , jpg and jpeg")</script>';
                }
               else
               {
                  if( $_FILES['fileToUpload']['name'] != '')
                  {
                       /*if( file_exists("uploads/" . $_FILES['fileToUpload']['name']))
                        {
                            $filename  = $_FILES['fileToUpload']['name'];
                            echo "Image already exists " . $filename;
                        }
                        else
                        {*/
                              $ress = $database->updatecomplaints($date,$type_of_crime,$incident,$criminaldetail,$update_filename,$id);
                              if ($ress)
                             {
                                 if( $_FILES['fileToUpload']['name'] != '')
                                 {
                                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $_FILES["fileToUpload"]["name"]);
                                   /* unlink("uploads/" . $oldimage);*/
                                 }
                                 
                                  echo '<script>alert("Data successfully updated")</script>';

                              } 
                              else 
                              {
                                  echo '<script>alert("Failed to insert data")</script>';
                              }

                     /* }*/
                  }
                }
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
	<title>Crime/Complaints</title>
  <link rel="stylesheet" type="text/css" href="css/report_crime.css">
</head>
<body>
 <?php 
include('top_bar.php');

?> 
    <div class="report_crime">

        <h2 align="center">Update Crime/Complaints</h2>    
        <form method="POST" name="report_crime" enctype="multipart/form-data"> 
               
      <br>
        
        <div class="form">
            
        <fieldset>
            <legend>Crime Details:</legend>
        		<div class="input_field">  
           
                <label class="incidentdetail">Username</label><br>
                <input class="user" type="user" name="user" value="<?php echo $row['username'];?>"><br><br>
        		<label class="incidentdetail">Date</label><br>
        		<input class="date" type="date" name="date" value="<?php echo $row['todaydate']; ?>"><br><br>
        		<label class="incidentdetail">Type of Crime:</label>
        		<select id="section" name="type_of_crime">
        			<option value=""></option>
        			<option value="Cyber Crime" <?php if($row['type_of_crime'] == 'Cyber Crime')
                        {
                        	echo 'selected';
                        }
        			?>>Cyber Crime</option>
        			<option value="Burglary" <?php if($row['type_of_crime'] == 'Burglary')
                        {
                        	echo 'selected';
                        }
        			?>>Burglary</option>
        			<option value="Robbery" <?php if($row['type_of_crime'] == 'Robbery')
                        {
                        	echo 'selected';
                        }
        			?>>Robbery</option>
        			<option value="Violence" <?php if($row['type_of_crime'] == 'Violence')
                        {
                        	echo 'selected';
                        }
        			?>>Violence</option>
        			<option value="Arson" <?php if($row['type_of_crime'] == 'Arson')
                        {
                        	echo 'selected';
                        }
        			?>>Arson</option>
        			<option value="Identity Theft" <?php if($row['type_of_crime'] == 'Identity Theft')
                        {
                        	echo 'selected';
                        }
        			?>>Identity Theft</option>
        			<option value="Kidnapping" <?php if($row['type_of_crime'] == 'Kidnapping')
                        {
                        	echo 'selected';
                        }
        			?>>Kidnapping</option>
        			<option value="Domestic Violence/Abuse" <?php if($row['type_of_crime'] == 'Domestic Violence/Abuse')
                        {
                        	echo 'selected';
                        }
        			?>>Domestic Violence/Abuse</option>
        			<option value="Drug Trafficking" <?php if($row['type_of_crime'] == 'Drug Trafficking')
                        {
                        	echo 'selected';
                        }
        			?>>Drug Trafficking</option>
        			<option value="Car Jacking" <?php if($row['type_of_crime'] == 'Car Jacking')
                        {
                        	echo 'selected';
                        }
        			?>>Car Jacking</option>
                    <option value="Others" <?php if($row['type_of_crime'] == 'Others')
                        {
                        	echo 'selected';
                        }
        			?>>Others</option>
        		</select>   <br><br>
        		<label class="incidentdetail">Incident</label><br>
        		<input class="incident" type="text" name="incident" value="<?php echo $row['incident']; ?>"><br>
        		<label class="incidentdetail">Any criminal/crime scene details to be specified:</label><br>
            	<input class="criminal" type="text" name="criminal" value="<?php echo $row['criminaldetail'];?>"><br><br>
        		<label class="incidentdetail">Image</label><br>
                &emsp;Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        		    <input type="hidden" name="fileToUpload_old" value="<?php echo $row['img'];?>"><br>
                <img src="<?php echo "uploads/".$row['img'];?>" alt="Image" width="100" height="60"><br>
        		<center>
                  <button class="button" name="updatesubmit">Submit</button>
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