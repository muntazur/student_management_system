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
  
  <!Making update form of students>
<form action="update_student.php" method="post">
  <div class = "update_student" align="center">


  			<label>Enter standerd: </label>
			<input type="number" name="standerd" required>

			<label>Enter name: </label>
			<input type="text" name="name" required>
			<label>
				<input style="cursor:pointer" type="submit" name="submit" value="search" required>
			</label>



  </div>

</form>

</body>
</html>

<!collecting data>

<?php
	
	if(isset($_POST['submit']))
	{
		$standerd = $_POST['standerd'];
		$name = $_POST['name'];
	
		include('../db_connect.php');

		$query = "SELECT * FROM `student` WHERE `standerd` = '$standerd' AND name LIKE '%$name%'";
		$run = mysqli_query($conn,$query);

		if(mysqli_num_rows($run)<1)
		{
			?>
				<script type="text/javascript">
				alert('oops! record not found');
				</script>

		    <?php

		}
		else
		{   
			
			?>
			<div class="edit_container">
				<table>
					<tr>
						<th>No</th>
						<th>Image</th>
						<th>Roll</th>
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>

					</tr>
		    <?php
		    $count=0;
			while($data=mysqli_fetch_assoc($run))
			{
				?>
					<tr>
						<td><?php echo ++$count; ?></td>
						<td><img src="../dataimage/<?php echo $data['image']; ?>"></td>
						<td><?php echo $data['roll']; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><a href="update_form.php?sid=<?php echo $data['id'];?>" >edit</a></td>
						<td><a href="delete_student.php?sid=<?php echo $data['id'];?>">delete</a></td>
					</tr>
				<?php
			}
            ?>

			</table>
		</div>

		<?php
		}
	}

?>