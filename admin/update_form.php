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
   include('../db_connect.php');

   $sid = $_GET['sid'];

   $query = "SELECT * FROM `student` WHERE `id` = '$sid'";
   $run = mysqli_query($conn,$query);

   $data = mysqli_fetch_assoc($run);

?>


	<div class = "add_student" align="center">

		<form action="update.php" method="post" enctype="multipart/form-data">
			<label>Roll No: </label>
			<input type="text" name="roll" placeholder="Enter your roll no" value="<?php echo $data['roll']; ?>" required>
			<br>

			<label>Name: </label>
			<input type="text" name="name" placeholder="Enter your fullname" value="<?php echo $data['name']; ?>" required>

			<br>

			<label>City: </label>
			<input type="text" name="city" placeholder="Enter your city" value="<?php echo $data['city']; ?>" required>

			<br>

			<label>Parents contact: </label>
			<input type="text" name="contact" placeholder="Enter your parent phone no" value="<?php echo $data['p_contact']; ?>" required>
			<br>

			<label>Standerd: </label>
			<input type="number" name="standerd" placeholder="Enter standerd" value="<?php echo $data['standerd']; ?>" required>

			<br>

			<label>Image: </label>
			<input type="file" name="img" required>
			<br>

			<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">

			<input style="cursor:pointer" type="submit" name="submit" value="submit" required>

		</form>

	</div>

</body>
</html>
