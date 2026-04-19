<?php
	session_start();
	if (isset($_SESSION["username"]) && isset($_SESSION["login_status"]) && isset($_SESSION["last_login"])) {
		// user is logged in
		if (isset($_SESSION['role'])){
			if ($_SESSION["role"] === 'admin') {
				$username = $_SESSION["username"];
			} else {
				header('Location: home.php');
			}
		} else {
			header('Location: login.php');
		}
	} else {
		// user is NOT logged in, redirect to login page
		header('Location: login.php');
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
	<h1>Welcome to admin panel, <?php echo $username?></h1>	
</body>
</html>