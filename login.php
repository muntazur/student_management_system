<?php

   session_start();

   if(isset($_SESSION['user_id']))
   {
   	  header('location:admin/admin_dash.php');
   }
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
		<h1 align="center">Admin Login</h1>

		<div class = "general">
        
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">

         	<label>Username:</label>
            <input type="text" name="uname" required>
            <br>
            <label>Password:</label>
            <input type="password" name="pasw" required>

            <br>

            <input type="submit" name="login" value="login">
                    	
         </form>

        </div>

</body>

</html>

<?php

	require 'db_connect.php';

	if(isset($_POST['login']))
	{
		$username = $_POST['uname'];
		$password = $_POST['pasw'];

		$query = "select * from admin where username = '$username' and password = '$password'";
		$run = mysqli_query($conn,$query); 

		$row = mysqli_num_rows($run);

		if(!$row)
		{
			?>

			<script>
				alert('username or password not mathched !!')
				window.open('login.php','_self');
		   </script>


			<?php
		}
		else
		{
			$data = mysqli_fetch_array($run);
			$user_id = $data['id'];

			
			$_SESSION['user_id'] = $user_id;

			
			header('location:admin/admin_dash.php');
		}
	}
?>