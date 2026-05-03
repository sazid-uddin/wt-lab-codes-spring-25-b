<?php
session_start();
include_once("../db.php");
class UserModel
{
	private $conn = null;

	function __construct()
	{
		echo 'UserModel constructor called';
		$dbConnObj = new DBConnection();
		echo 'DBConnection object created';
		$this->conn = $dbConnObj->connect();
	}

	public function getAllUsersList()
	{
		$sql = "SELECT username, email FROM users;";
		$result = $this->conn->query($sql);
		$user_count = $result->num_rows;
		$users_array = []; // indexed array

		// $users_array: 
		// [0] -> ["username"=>"john", "email"=>"john@example.com, "id"=>1...] 
		// [1] -> ["username"=>"jane", "email"=>"jane@example.com, "id"=>2...] 

		if ($user_count > 0) {
			while ($row = $result->fetch_assoc()) { // this loop iterates over all rows that were returned
				// for each row, create a user object that will be insterted into users_array	
				$user = []; // associative array
				$user['username'] = $row['username'];
				$user['id'] = $row['id'];
				$user['email'] = $row['email'];
				$user['created_at'] = $row['created_at'];

				array_push($users_array, $user);
			}
		} else {
			echo "No users found in db";
		}

		return $users_array;
	}

	public function checkLogin(string $username, string $password)
	{
		$sql = "SELECT * FROM users WHERE username = '" . $username . "';";
		echo 'SQL query: ' . $sql;
		$result = $this->conn->query($sql);
		echo 'SQL query executed, result: ' . print_r($result, true);
		// check if at least one row was returned
		if ($result->num_rows > 0) {
			//at least one user was found
			while ($row = $result->fetch_assoc()) {
				// echo print_r($row['passwordk']);
				// echo "<br>";
				if ($row['password'] === $password) {
					//login successful
					// store username in session
					echo 'Login successful for user: ' . $username;
					$_SESSION['username'] = $username;
					// header('Location: home.php');
					return true;
				} else {
					// login unsuccessful
					// echo "invalid password";
					$_SESSION['error']['login'] = 'Invalid password';
					return false;
				}
			}
		} else {
			// no user was found with the username
			// echo "Invalid username";
			$_SESSION['error']['login'] = 'Invalid username';
			return false;
		}
	}
}
