<?php

	session_start();

	if(isset($_SESSION['user_id']))
	{
		echo "";

	}
	else
	{   // if session is not set up redirect to login page
		header('location:../login.php');
	}
?>

<?php 

   include('header.php');
   include('title.php');

?>

	<div class = "add_student" align="center">

		<form action="" method="post" enctype="multipart/form-data">
			<label>Roll No: </label>
			<input type="text" name="roll" placeholder="Enter your roll no" required>
			<br>

			<label>Name: </label>
			<input type="text" name="name" placeholder="Enter your fullname" required>

			<br>

			<label>City: </label>
			<input type="text" name="city" placeholder="Enter your city" required>

			<br>

			<label>Parents contact: </label>
			<input type="text" name="contact" placeholder="Enter your parent phone no" required>
			<br>

			<label>Standerd: </label>
			<input type="number" name="standerd" placeholder="Enter standerd" required>

			<br>

			<label>Image: </label>
			<input type="file" name="img" required>
			<br>

			<input style="cursor:pointer" type="submit" name="submit" value="submit" required>

		</form>

	</div>

</body>
</html>

<?php 

	include('../db_connect.php');

	if(isset($_POST['submit']))
	{
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$standerd = $_POST['standerd'];
		$image = $_FILES['img']['name'];
		$temp_name = $_FILES['img']['tmp_name'];

		move_uploaded_file($temp_name,"../dataimage/$image");

		$query = "select * from student where roll = '$roll' and standerd = '$standerd'";

	    $run = mysqli_query($conn,$query);

	    if($run)
	    {
	    	$row = mysqli_fetch_array($run);
	    	if($row['roll']==$roll and $row['standerd']==$standerd)
	    	{
	    		?>

	    		<script type="text/javascript">
	    			alert('Already exists');
	    		</script>

	    		<?php
	    	}
	    	else
	    	{
	    		$query = "INSERT INTO `student`(`roll`, `name`, `city`, `p_contact`, `standerd`, `image`) VALUES ('$roll','$name','$city','$contact','$standerd','$image')";
	    		$run = mysqli_query($conn,$query);
	    		if($run)
	    		{
	    			?>
	    				<script type="text/javascript">
	    					alert('Data Inserted Successfully');
	    				</script>

	    			<?php
	    		}
	    		else
	    		{
	    			?>

	    				<script type="text/javascript">
	    					alert('insertion failed');
	    				</script>

	    			<?php
	    		}
	    	}
	    }

	}

?>