<?php
include "db.php";

// API endpoint that returns the list of users (Method: GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// get users list from db
	$user_list = getUserList();
	// return 'list of users';
	echo json_encode($user_list);
}
function getUserList()
{
	$dbConnObj = new DBConnection();
	$conn = $dbConnObj->connect();

	// echo "fetching user list";
	$sql = "SELECT * from users;";
	$result = $conn->query($sql);

	// echo "sql generated: " . $sql;
	$users = [];
	$user_count = $result->num_rows;
	// echo "user count: " . $user_count;
	if ($user_count > 0) {
		// some users found
		while ($row = $result->fetch_assoc()) {
			$user = [];
			$user['username'] = $row['username'];
			$user['email'] = $row['email'];
			$user['user_id'] = $row['id'];
			$user['password'] = $row['password'];
			$user['created_at'] = $row['created_at'];
			array_push($users, $user);
		}
	}
	// echo "users fetched: " . count($users);

	return $users;
}
