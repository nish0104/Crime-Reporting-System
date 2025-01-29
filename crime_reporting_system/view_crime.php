<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>View Crime</title>
  <link rel="stylesheet" type="text/css" href="css/view_complaints.css">
</head>
<body>
<?php 
include 'top_bar.php';
 ?>
 <div class="view_crime_bytypeofcrime_outer">
    <form method="POST">
        <label class="incidentdetail">Type of Crime:</label>
        		<select id="type_of_crime" name="type_of_crime">
        			<option value=""></option>
        			<option value="Cyber Crime">Cyber Crime</option>
        			<option value="Burglary">Burglary</option>
        			<option value="Robbery">Robbery</option>
        			<option value="Violence">Violence</option>
        			<option value="Arson">Arson</option>
        			<option value="Identity Theft">Identity Theft</option>
        			<option value="kidnapping">Kidnapping</option>
        			<option value="Domestic Violence/Abuse">Domestic Violence/Abuse</option>
        			<option value="Drug Trafficking">Drug Trafficking</option>
        			<option value="Car Jacking">Car Jacking</option>
                    <option value="Others">Others</option>
        		</select>   <br><br>
        <input type="submit" name="submit_view" value="Submit">

    </form>
    </div>
    <?php
    if(isset($_POST['submit_view']))
    {
        
         $type_of_crime = $_POST['type_of_crime'];
         $res=$database->viewcrime($type_of_crime);
    ?>
            <form method="post" name="complaints"> 
               
      <br>
        <center>
         <section>
     	<table border="1">
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
<?php foreach($res as $row) {
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
?>
</table>
</section>
</center>
</form>
</body>
</html>