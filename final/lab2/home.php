<?php
	session_start();
	if (isset($_SESSION["username"]) && isset($_SESSION["login_status"]) && isset($_SESSION["last_login"])) {
		// user is logged in
		$username = $_SESSION["username"];
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
	<h1>Welcome to home, <?php echo $username; ?></h1>
	<?php 
		if(isset($_SESSION["role"]) && $_SESSION["role"] === 'admin') {
			echo '<a href="admin_panel.php">Admin Panel</a>';
		}
	?>
	<form method="post" action="logout.php">
		<input type="submit" value="Logout">
	</form>

</body>
</html>