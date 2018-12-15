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
	
    
	if(isset($_GET['sid']))
	{
			$id = $_GET['sid'];
			include('../db_connect.php');

			$query = "DELETE FROM `student` WHERE `id`= '$id'";

			$run=mysqli_query($conn,$query);

			if(!$run)
			{
				?>
					<script type="text/javascript">
						alert('Failed to delete');
					</script>
				<?php
			}
			else 
			{
				?>
				    <script type="text/javascript">
				    	alert('Deleted Successfully');
				    	window.open('update_student.php','_self');
				    </script>

				<?php
			}
	}


?>