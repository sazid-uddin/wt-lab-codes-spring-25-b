<?php
session_start();

$user_count = 0;
$users_list = [];

if (isset($_SESSION['users_list'])) {
	$users_list = $_SESSION['users_list'];
	$user_count = count($users_list);
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
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	<h1>Home page</h1>
	<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>	
	<table>
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<!-- print rows with $users_array -->
		<?php
		for ($i=0;$i<$user_count;$i++) {
			echo "<tr>";
				echo "<td>";
					echo $users_list[$i]['username'];
				echo "</td>";
				echo "<td>";
					echo $users_list[$i]['email'];
				echo "</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>