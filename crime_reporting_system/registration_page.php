<?php
include 'database.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="css/registration_page.css">
</head>
<body>
    <div class="registration_container">
        <h2 align="center">Registration Page</h2>    
        <form method="POST" name="registration" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
               
      <br>
        
        <div class="form">
            
        <label class="Registration">Registration</label>
        <p style="color: red;"><span class="error">* required field</span></p>
        <div class="input_field">  
        <label class="userdetail">Name</label><br>
        <input class="name" type="text" name="name" placeholder="Enter your Name"><span class="error" style="color: red;">* </span><br>   
        <label class="userdetail">User Name</label><br>
        <input class="user_name" type="text" name="user_name" placeholder="Enter your username"><span class="error" style="color: red;">* </span><br>
        <label class="userdetail">Email-id</label><br>
        <input class="email_id" type="text" name="email_id" placeholder="Enter your emailid"><span class="error" style="color: red;">* </span><br>
        <label class="userdetail">Contact Number</label><br>
        <input class="contact_no" type="text" name="contact_no" placeholder="Enter your Contact number"><span class="error" style="color: red;">* </span><br>
        <label class="userdetail">Create Password</label><br>
        <input class="create_password" type="password" name="create_password" placeholder="Create a password"><span class="error" style="color: red;">* </span><br>
        <label class="userdetail">Confirm Password</label><br>
        <input class="confirm_password" type="password" name="confirm_password" placeholder="Confirm the password"><span class="error" style="color: red;">* </span><br>
        <input class="button" type="submit" name="submit" value="Submit" ><br>
       <a href="login.php" class="help"><u><label class="label_help" >Login</label></a></u><br>


        </div>
        </div>
          
     </div>
            </form>
        <br>
</body>
</html>
<?php 

if (isset($_POST)&!empty($_POST)) {

if(isset($_POST['submit']))
{

  $name                = $database->sanitize($_POST['name']);
  $user_name           = $database->sanitize($_POST['user_name']);
  $email_id            = $database->sanitize($_POST['email_id']);
  $contact_no          = $database->sanitize($_POST['contact_no']);
  $create_password     = $database->sanitize($_POST['create_password']);
  $confirm_password    = $database->sanitize($_POST['confirm_password']);
 
  $emailquery = $database->email($email_id);

  if($emailquery > 0)
  {
    echo '<script>alert("Email already exists")</script>';
  }
  else
  {
         include 'registration_validations.php';
         $validation = new UserValidator($name,$user_name,$email_id,$contact_no,$create_password,$confirm_password);
         if($validation->emptyinput() == true && $validation->invalidname() == true && $validation->invalidusername() == true && $validation->invalidemailid() == true && $validation->invalidcontactno() == true && $validation->passwordmatch() == true)
         {    
               $res = $database->registration($name,$user_name,$email_id,$contact_no,$create_password,$confirm_password);
                if ($res) {
                  echo '<script>alert("Thank You!You are Successfully Registered")</script>';
                } else {
                   echo '<script>alert("Failed to Register")</script>';
                }
         }
  }
}
else
{
  echo '<script>alert("No button has been clicked")</script>';
}

}

?>
<?php
include "footer.php";
?>