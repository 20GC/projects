
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>GC Tic Tac Toe Login</title>
	<link rel="stylesheet" href="auth.css">
</head>

<body>
	<h1>Tic Tac Toe Login</h1>
	<h3><a href="register.php">Register</a><br>
		<a href="login.php">Login</a></h3><br>

	<form method="post" action="">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="submit" name="submit"/>
	</form>
	
	<!--Adapted from PHPpot User Authentication tutorial-->
	<?php
		namespace GC;
		use \GC\DataSource;

		$message = "";
		if (count($_POST) > 0) {
		    $isSuccess = 0;
		    require_once __DIR__ . '/DataSource.php';
		    $conn = new DataSource();
		    $query = 'SELECT * FROM users WHERE username= ?';
		    $paramType = 's';
		    $paramValue = array(
		        $_POST["username"];
		    );
		    $result = $conn->select($query, $paramType, $paramValue);

		    if (! empty($result)) {

		        $hashedPassword = $result[0]["password"];
		        if (password_verify($_POST["password"], $hashedPassword)) {
		            $isSuccess = 1;
		        }
		    }
		    if ($isSuccess == 0) {
		        $message = "Invalid Username or Password!";
		    } else {
		        header("Location:  ./success-message.php");
		    }
		}
	?>

</body>
</html>