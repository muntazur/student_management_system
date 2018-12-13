<?php

	session_start();

	if(isset($_SESSION['user_id']))
	{
		echo "";

	}
	else
	{
		header('location:../login.php');
	}
?>


<?php 

   include('header.php');

?>

   <div class = "admin_title" align="center">
   	        <h2><a href="log_out.php" style="float:right; margin-right:20px; color:white; font-size = 18px">Logout</a></h2>
   			<h2> Welcome to admin Dashboard </h2>
   	</div>

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

