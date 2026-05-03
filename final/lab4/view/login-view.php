<?php
	if (isset($_SESSION['username'])) {
		// already logged in, redirect to home page
		header('Location: home-view.php');
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
	<h1>Login page</h1>
	<form method="post" action="../controller/login-controller.php">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="submit" value="Login">
	</form>	
	<?php
	if (isset($_SESSION['error']['login'])) {
		echo $_SESSION['error']['login'];
	}
	?>
</body>
</html>