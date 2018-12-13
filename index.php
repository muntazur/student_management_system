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