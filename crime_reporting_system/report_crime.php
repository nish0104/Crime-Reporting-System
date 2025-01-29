<?php

include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Report Crime</title>
  <link rel="stylesheet" type="text/css" href="css/report_crime.css">
</head>
<body>
 
    <div class="report_crime">

        <h2 align="center">Report Crime</h2>    
        <form method="POST" name="report_crime" enctype="multipart/form-data"> 
               
      <br>
        
        <div class="form">
            
        
        		<div class="input_field">  
           
            <label class="incidentdetail">Username</label><br>
            <input class="user" type="user" name="user" placeholder="Enter username(if any)"><br><br>
        		<label class="incidentdetail">Date</label><br>
        		<input class="date" type="date" name="date"><br><br>
        		<label class="incidentdetail">Type of Crime:</label>
        		<select id="type_of_crime" name="type_of_crime">
        			<option value=""></option>
        			<option value="Cyber Crime">Cyber Crime</option>
        			<option value="Burglary">Burglary</option>
        			<option value="Robbery">Robbery</option>
        			<option value="Violence">Violence</option>
        			<option value="Arson">Arson</option>
        			<option value="Identity Theft">Identity Theft</option>
        			<option value="Kidnapping">Kidnapping</option>
        			<option value="Domestic Violence/Abuse">Domestic Violence/Abuse</option>
        			<option value="Drug Trafficking">Drug Trafficking</option>
        			<option value="Car Jacking">Car Jacking</option>
              <option value="Others">Others</option>
        		</select>   <br><br>
        		<label class="incidentdetail">Incident</label><br>
        		<input class="incident" type="text" name="incident" placeholder="Enter incident details"><br>
            <label class="incidentdetail">Any criminal/crime scene details to be specified:</label><br>
            <input class="criminal" type="text" name="criminal" placeholder="Enter criminal details"><br><br>
        		<label class="incidentdetail">Image</label><br>
        		
            &emsp;Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
           
        		<center>
            <button class="button" name="submit">Submit</button>
        		</center><br><br>
            &emsp;&emsp;&emsp;
            <a href="login.php">Login</a>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="welcome.php">Go Back</a>
        		</div>
          </div>
       
          </form>

     </div>
        </br>
        </br></br></br></br></br></br></br></br>    
        <br>
</body>
</html>
<?php 


if(isset($_POST['submit']))
{

    if (isset($_POST)&!empty($_POST)) 
    {

        $user  = $database->sanitize($_POST['user']);
        $date          = $_POST['date'];
        $type_of_crime = $database->sanitize($_POST['type_of_crime']);
        $incident      = $database->sanitize($_POST['incident']);
        $criminaldetail      = $database->sanitize($_POST['criminal']);
        $image         = $_FILES['fileToUpload']['name'];
   
        $allowed_extension  = array('gif','png','jpg','jpeg');
        $filename = $_FILES['fileToUpload']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

         include 'reportcrime_validations.php';
         $validation = new ReportcrimeValidator($user,$date, $type_of_crime, $incident,$criminaldetail);
         if($validation->emptyinput() == true && $validation->invalidusername() == true && $validation->invaliddate() == true)
         {
            if(!in_array($file_extension, $allowed_extension))
            {
                echo '<script>alert("You are allowed with only gif , png , jpg and jpeg")</script>';
            }
            else
            {
              /*if( file_exists("uploads/" . $_FILES['fileToUpload']['name']))
              {
                    $filename  = $_FILES['fileToUpload']['name'];
                    echo "Image already exists " . $filename;
              }
              else
              {*/
                
                    $res = $database->reportcrime($user,$date, $type_of_crime, $incident,$criminaldetail,$image);
                    if ($res)
                   {
                       move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $_FILES["fileToUpload"]["name"]);
                        echo '<script>alert("Data successfully inserted")</script>';

                    } 
                    else 
                    {
                        echo '<script>alert("Failed to insert data")</script>';
                    }
         
           /*   }*/
           } 
         }
     }
}

?>
<?php
include "footer.php";
?>