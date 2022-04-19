<?php
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($username) && !empty($password) && !is_numeric($username)) {
			//save to database
			$userid = random_num(20);
			$query = "insert into users (userid,username,password,wins,losses) values ('$userid','$username','$password',0,0)";
			mysqli_query($con,$query);
			header("Location: login.php");
			die;
		}
		else {
			echo "Please enter valid information.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tic Tac Toe Signup</title>
</head>
<body>
	<style type="text/css">
		.text {
			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {
			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}

		#box {
			background-color: grey;
			margin: auto;
			width: 300px;
			padding: 20px;
		}
	</style>

	<div id="box">
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Sign Up</div>
			<input class="text" type="text" name="username"><br><br>
			<input class="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Log In</a><br><br>
		</form>
	</div>
</body>
</html>