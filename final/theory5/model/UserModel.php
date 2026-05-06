<?php
include '../db.php';
class UserModel {
	private $conn;

	public function __construct() {
		$dbConnectionObj = new DBConnection();
		$this->conn = $dbConnectionObj->connect();
	}

	public function deleteUser(string $username) {
		$query = "DELETE FROM users WHERE username='$username'";
		$result = mysqli_query($this->conn, $query);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function getUsersList() {
		$query = "SELECT * FROM users";
		$result = mysqli_query($this->conn, $query);

		if ($result->num_rows > 0) {
			$users_list = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($users_list, $row);
			}
			return $users_list;
		} else {
			return [];
		}
	}

	public function checkLogin(string $username, string $password) {
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($this->conn, $query);

		if (mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>