<?php
// include('db_conn.php');
session_start();
// check if session exists, if not redirect to login page
if (isset($_SESSION['username'])) {
	// session exists
	$username = $_SESSION['username'];
} else {
	// session doesn't exist
	header('Location: login.php');
}
?>
<html>
	<body>
		<form action="insert_user.php" method="post">
			<input type="text" placeholder="username" name="username">
			<br>
			<input type="email" placeholder="email" name="email">
			<br>
			<input type="password" placeholder="password" name="password">
			<br>
			<input type="submit" value="Create User">
		</form>
	</body>
</html>