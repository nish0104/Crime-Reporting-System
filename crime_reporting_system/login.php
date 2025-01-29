<?php
include 'database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Page</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
       <br><br><br>
        <div class="login_container">
            
            <form method="POST" name="login"> 
               
      <br>
        <div class="formspace">

    <p class="formspace2">
         </br>
      </br></br></br>
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <i class="fa fa-home fa-3x" style="font-size:68px;"></i> 
        <div class="form">
            
        <label class="login">LOGIN</label>
        <div class="input_field">  
           
        <label class="userdetail">User Name</label><br>
        <input class="user_name" type="text" name="user_name" placeholder="Enter username"><br>
        <label class="userdetail">Password</label><br>
        <input class="password" type="password" name="password" placeholder="Enter Password"><br>
        <input class="button" type="submit" name="login_btn" value="Login"/><br>
         <a href="registration_page.php" class="help"><u><label class="label_help" >Click here to Register</label></a></u><br>
         <a href="admin_login.php" class="help"><u><i><b><h3><label class="label_help">Only for Admin Login</label></a></u></i></b></h3>


        </div>
        </div>
        </div>  
      </div>
            </form>
        <br>
        
        
    </body>
</html>
<?php
if (isset($_POST)&!empty($_POST)) {

  $user_name    = $database->sanitize($_POST['user_name']);
  $password     = $database->sanitize($_POST['password']);

  include 'validations.php';
  $validation = new UserValidator($user_name,$password);
  if($validation->emptyinput() == true && $validation->invalidusername() == true)
  {
      $res = $database->login($user_name,$password);
      if ($res)
      {
          header("location:home_page.php?user=$user_name");
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