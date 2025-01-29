<?php 
include 'database.php';
$res = $database->viewcomplaints();
$r = $database->totalcomplaints();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Manage Complaints</title>
    <link rel="stylesheet" type="text/css" href="css/manage_complaints.css">
</head>
<body>
<?php 
include 'top_bar.php';
 ?>
    <div class="complaints">
        <br><br>
        <h2 align="center">Complaints</h2>    
        <form method="post" name="complaints"> 
               
      <br>
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label>Enteries:</label>
        <input type="" name="totentries" style="font-size: 25px;" size="4" value="<?php echo $r; ?>">
        <br><br>

        <center>
         <section>
            
     	<table border="1" id="complaints">
                <tr>
                	<th>Id</th>
                    <th>Username</th>
                	<th>Date</th>
                	<th>Type of Crime</th>
                	<th>Incident</th>
                    <th>Criminal Details</th>
                    <th>Image</th>
                	<th>Action</th>
                </tr>
<?php 
if($r > 0)
{
   foreach($res as $row) {
	?>
		<tr>
			<td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username'];?></td>
	    	<td><?php echo $row['todaydate']; ?></td>
			<td><?php echo $row['type_of_crime']; ?></td>
			<td><?php echo $row['incident']; ?></td>
            <td><?php echo $row['criminaldetail'];?></td>
            <td><img src="<?php echo "uploads/".$row['img'];?>" width="100" height="50"></td>
			<td><a href="updatecomplaints.php?id=<?php echo $row['id']; ?>">Update</a></td>
		</tr>
	<?php
   }
}
else
{
?>
    <tr>
        <td>No record available</td>
    </tr>
    <?php
}
?>
</table>
</section>
</center>
</form>
</div>
</body>
</html>
<?php
include "footer.php";
?>