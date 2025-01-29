<?php
include 'database.php';
$res = $database->viewstations();
$r = $database->totalstations();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Stations</title>
  <link rel="stylesheet" type="text/css" href="css/manage_stations.css">
</head>
<body>
  <?php 
include 'top_bar.php';
 ?>
    <div class="stations">
        <br><br>
        <h2 align="center">Stations</h2>     
               
      <br>
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label>Enteries:</label>
        <input type="" name="totentries" style="font-size: 25px;" size="4" value="<?php echo $r; ?>">
        <br><br>

        <center>
         <section>
     	<table border="1" id="stations">
                <tr>
                	<th>Id</th>
                	<th>Name</th>
                	<th>Address</th>
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
						<td><a href="updatestations.php?id=<?php echo $r['id']; ?>">Update</a>
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

