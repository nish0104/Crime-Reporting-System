<?php
include 'database.php';
$res = $database->viewpoliceofficer();
$r = $database->totalpoliceofficer();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Police Officer</title>
  <link rel="stylesheet" type="text/css" href="css/manage_complainants.css">
</head>
<body>
  <?php 
include 'top_bar.php';
 ?>
    <div class="policeofficer">
        <br><br>
        <h2 align="center">Police Officer</h2>     
               
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
                  <th>Station Id</th>
                	<th>Name</th>
                	<th>Designation</th>
                	<th>Contact No.</th>
                	<th>Action</th>
                </tr>
<?php 

foreach($res as $r)
 {

?>
					<tr>
						<td><?php echo $r['id']; ?></td>
            <td><?php echo $r['station_id']; ?></td>
						<td><?php echo $r['name']; ?></td>
						<td><?php echo $r['designation']; ?></td>
						<td><?php echo $r['contactno']; ?></td>
						<td><a href="updatepoliceofficer.php?id=<?php echo $r['id']; ?>">Update</a>
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

