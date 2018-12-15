<!DOCTYPE html>

<html lang = "en_us">

<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>

	<h3 style="text-align:right"><a href="login.php">Admin Login</a></h3>
	<h1 align="center">Welcome to Student Management System</h1>
	<br>

	<div class = "general">
		<form action="index.php" method="post">
			 
			<label><h1>Student Information</h1></label>
			<br>
			<label>Choose Standerd</label>
			<select name="std" required>
				<option value = "1">1st</option>
				<option value = "2">2nd</option>
				<option value = "3">3rd</option>
				<option value = "4">4th</option>
				<option value = "5">5th</option>
				<option value = "6">6th</option>
			</select>
            <br>
			<label>Enter roll: </label>
			<input type = "text" name="roll" value="" required>
            <br>
			<input type="submit" name="submit" value = "Show details">

		</form>
	</div>

</body>


<?php

	if(isset($_POST['submit']))
	{
		$standerd = $_POST['std'];
		$roll = $_POST['roll'];

		include('db_connect.php');

	    $query = "SELECT * FROM `student` WHERE `standerd` = '$standerd' AND `roll` = '$roll'";
	    $run = mysqli_query($conn,$query); 

	    if(mysqli_num_rows($run)<1)
	    {
	    	?>

	    		<script type="text/javascript">
	    			alert('student not found');
	    		</script>

	    	<?php
	    }
	    else
	    {   
	    	$data = mysqli_fetch_assoc($run);
	    	?>
	    		<div class = "details" align="center">
	    			<h3> Student Details</h3>
	    			<img src="/dataimage/<?php echo $data['image']; ?>" >
	    			<br>
	    			<label>Name: <?php echo $data['name']; ?></label>
	    			<br>
	    			<label>standerd: <?php echo $data['standerd']; ?></label>
	    			<br>
	    			<label>Roll: <?php echo $data['roll']; ?></label>
	    			<br>
	    			<label>city: <?php echo $data['city']; ?></label>
	    			<br>
	    			<label>parents contact: <?php echo $data['p_contact']; ?></label>
	    			

	    		</div>

	    	<?php
	    }

	}
?>