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

	if(isset($_POST['submit']))
	{
		include('../db_connect.php');
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$p_contact=$_POST['contact'];
		$standerd = $_POST['standerd'];
		$image = $_FILES['img']['name'];
		$tmp_name=$_FILES['img']['tmp_name'];
		$sid = $_POST['sid'];

		move_uploaded_file($tmp_name,"../dataimage/$image");

		$query = "UPDATE `student` SET `roll`='$roll',`name`='$name',`city`='$city',`p_contact`='$p_contact',`standerd`='$standerd',`image`= '$image' WHERE `id`='$sid'";
		$run = mysqli_query($conn,$query);
		
		if($run)
		{
		    ?>
		       <script type="text/javascript">
		       	 alert('Data updated successfully.');
		       	 window.open('update_form.php?sid=<?php echo $sid;?>','_self');	
		       </script>

		      


		    <?php

		}
		else
		{
			?>

				<script type="text/javascript">
					alert('Data not updated');
				</script>
			<?php
		}
	}
?>