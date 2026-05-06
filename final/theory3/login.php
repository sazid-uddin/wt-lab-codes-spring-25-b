<?php
session_start();

include("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	//login form submitted
	$username = $_POST['username'];
	$password = $_POST['password'];

	// actual db checking

	$sql = "SELECT * FROM users WHERE username = '" . $username . "';";
	$result = $conn->query($sql); // table
	echo $sql;
	echo "<br>";

	// check if result is not empty
	if ($result->num_rows > 0) {
		// at least 1 row was returned (username exists)
		while ($row = $result->fetch_assoc()) { // ["password"=>"123", "email"=>"abc@gmail.com"]
			if ($row["password"] === $password) {
				// password is correct & login is successfull
				$_SESSION['username'] = $username;
				header('Location: home.php');
			} else {
				// password is incorrect
				echo "password is invalid";
			}

		}
	} else {
		// no rows were returned (username doesn't exist)
		echo "invalid username";
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
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="submit" value="Login">
	</form>
</body>

</html>