<?php
	// check if session exists
	session_start();
	if (isset($_SESSION['username'])) {
		header("Location: home-view.php");
	}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Page Title</title>
	<link rel='stylesheet' href='main.css'>
</head>
<body>
	<h1>Login</h1>
	<form action='../controller/login-controller.php' method='post'>
		<label for='username'>Username:</label><br>
		<input type='text' id='username' name='username'><br>
		<label for='password'>Password:</label><br>
		<input type='password' id='password' name='password'><br><br>
		<input type='submit' value='Submit'>
	</form>	
</body>
</html>