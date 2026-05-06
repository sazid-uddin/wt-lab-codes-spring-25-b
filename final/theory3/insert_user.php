<?php
	include("db_conn.php");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
			// $sql = "INSERT into users (username, email, password, created_at)";
			// $sql += "values ('" . $_POST['username'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . time() . "');";
			// INSERT into users (username, email, password, created_at) values ('adam','adam@gmail.com','123', 'current_time');
			$sql = "INSERT INTO USERS (username, email, password, created_at) values (?,?,?,?);";
			echo $sql;
			echo "<br>";
			$statement = $conn->prepare($sql);
			$current_time = date("Y-m-d h:m:s");
			echo $current_time;
			echo "<br>";
			$statement->bind_param("ssss", $_POST['username'], $_POST['email'], $_POST['password'], $current_time);
			print_r($statement);
			echo "<br>";
			if ($statement->execute()) {
				echo "insert successful";
			} else {
				echo "insert unsuccessful";
				echo $statement->error;
			}
		} else {
			echo "invalid submission data";
		}
	}
?>