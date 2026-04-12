<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$error = [];

	// validation code
	$fullname = $_POST["fullname"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pass = $_POST["pass"];

	// var_dump($_POST);

	// Rule 1: fullname has to be at least 3 chars long
	if (strlen($fullname) < 3) {
		$error["fullname"] = "Fullname is too short";
	}

	// Rule 2: username has to be at least 3 chars long
	if (strlen($username) < 3) {
		$error["username"] = "Username is too short";
	}

	// Rule 3:
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
	<form method="POST" action="index.php">
		<label for="fullname">Fullname:</label>
		<input type="text" id="fullname" name="fullname">
		<?php if (!empty($error["fullname"])) echo $error["fullname"]; ?>
		<br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email">
		<br>
		<label for="username">Username:</label>
		<input type="username" id="username" name="username">
		<?php if (!empty($error["username"])) echo $error["username"]; ?>
		<br>
		<label for="pass">Password:</label>
		<input type="password" id="pass" name="pass">
		<br>
		<input type="submit">
	</form>	
</body>
</html>