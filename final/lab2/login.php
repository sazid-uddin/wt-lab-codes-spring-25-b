<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		//login form submitted
		$username = $_POST['username'];
		$password = $_POST['password'];

		// simulate db checking
		if ($username === "regular_user" && $password === "123") {
			//login successful
			$_SESSION["username"] = $username;
			$_SESSION["login_status"] = true;
			$_SESSION["last_login"] = time();
			$_SESSION["role"] = "regular";
			header('Location: home.php');
		} elseif ($username === "admin" && $password === "abc") {
			//login successful
			$_SESSION["username"] = $username;
			$_SESSION["login_status"] = true;
			$_SESSION["last_login"] = time();
			$_SESSION["role"] = "admin";
			header('Location: home.php');
		} else {
			echo "invalid username or password";
		}
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
	<h1>Login Page</h1>	
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="submit" value="Login">
	</form>
</body>
</html>