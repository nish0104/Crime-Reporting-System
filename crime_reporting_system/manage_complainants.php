<?php
include 'database.php';
$res = $database->viewcomplainants();
$r = $database->totalcomplainants();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Complainants</title>
  <link rel="stylesheet" type="text/css" href="css/manage_complainants.css">
</head>
<body>
  <?php 
include 'top_bar.php';
 ?>
    <div class="complainants">
        <br><br>
        <h2 align="center">Complainants</h2>     
               
      <br>
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label>Enteries:</label>
        <input type="" name="totentries" style="font-size: 25px;" size="4" value="<?php echo $r; ?>">
        <br><br>

        <center>
         <section>
     	<table border="1" id="complainants">
                <tr>
                	<th>Id</th>
                	<th>Name</th>
                	<th>Address</th>
                	<th>Contact No.</th>
                	<th>Email Id</th>
                	<th>Password</th>
                	<th>Action</th>
                </tr>
<?php 

foreach($res as $r)
 {

?>
					<tr>
						<td><?php echo $r['id']; ?></td>
						<td><?php echo $r['name']; ?></td>
						<td><?php echo $r['address']; ?></td>
						<td><?php echo $r['contact']; ?></td>
						<td><?php echo $r['emailid']; ?></td>
						<td><?php echo $r['password']; ?></td>
						<td><a href="updatecomplainants.php?id=<?php echo $r['id']; ?>">Update</a>
            </td>
					</tr>
<?php
}

?>
</table>
</section>
</center>
</div>
</body>
</html>
<?php
include "footer.php";
?>

