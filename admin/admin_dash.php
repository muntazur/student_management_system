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

?>

    <?php include('title.php') ?>

   	<div class  = "dashboard">

   		<table border="1" style="width:50%" align="center">
   			<tr>
   				<td>1.</td><td> <a href="add_student.php">Insert Student Details</a></td>
   			</tr>
   			<tr>
   				<td>2.</td><td> <a href="update_student.php">Update Student Details</a></td>
   			</tr>
   			<tr>
   				<td>3.</td><td> <a href="delete_student.php">Delete Students Details</a></td>
   			</tr>
   			
   		</table>

</body>
</html>

