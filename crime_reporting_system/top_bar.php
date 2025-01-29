<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/topbar.css">
</head>
<body>

<div class="navbar">
  <a href="welcome.php">Logout</a>
  <a href="home_page.php">Home</a>
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Crime Reporting System
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
    
    <a href="manage_complaints.php">Manage Crime/Complaints</a>
    <a href="complainants.php">Add Complainants</a>
    <a href="manage_complainants.php">Manage Complainants</a>
    <a href="stations.php">Add Police Station Details</a>
    <a href="manage_stations.php">Manage Stations Details</a>
    <a href="policeofficer_details.php">Add Police Officer Details</a>
    <a href="manage_policeofficer.php">Manage Police Officer Details</a>
  </div>
  </div> 
  <a href="view_crime.php">View Crimewise Details</a>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html>
