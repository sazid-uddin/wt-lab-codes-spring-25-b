<?php
// this API endpoint recieves an username and tries to delete that user from db
// (Method: POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$raw = file_get_contents('php://input');
	// echo $raw;
	$data_assoc = json_decode($raw, true);
	// print_r($data_assoc);
	$username = $data_assoc['username'] ?? ($_POST['username'] ?? '');
	// echo $username;
	deleteUser($username);
}

function deleteUser(string $username) {
	include_once("db.php");
	$dbConnObj = new DBConnection();
	$conn = $dbConnObj->connect();

	$sql = "DELETE FROM users WHERE username = '" . $username ."';";
	// echo $sql;
	$success = $conn->query($sql);

	if ($success === true) {
		echo '{"success":"true"}';
	} else {
		echo '{"success":"false"}';
	}

}
?>