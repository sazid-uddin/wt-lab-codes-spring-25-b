<?php
	// check if session exists
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: login-view.php");
	}

	$users_list = $_SESSION['users_list'] ?? [];
	$users_count = count($users_list);
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
	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	</style>
	<table>
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Created At</th>
			<th>Action</th>
		</tr>
		<?php
			for ($i=0; $i<$users_count; $i++) {
				echo "<tr>";
				echo "<td>" . $users_list[$i]['id'] . "</td>";
				echo "<td>" . $users_list[$i]['username'] . "</td>";
				echo "<td>" . $users_list[$i]['email'] . "</td>";
				echo "<td>" . $users_list[$i]['created_at'] . "</td>";
				echo "<td><form action='../controller/delete-user-controller.php' method='POST'><input type='hidden' name='username' value='" . $users_list[$i]['username'] . "'><input type='submit' value='Delete'></form></td>";
				echo "</tr>";
			}
		?>
	</table>
	<a href="../controller/logout-controller.php">Logout</a>
</body>
</html>