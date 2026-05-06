<?php
class DBConnection {
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $db_name = 'wt_b';

	public function connect() {
		$conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

		if (empty($conn->connect_error)) {
			// connection successful
			return $conn;
		} else {
			// connection unsuccessful
			echo "connection unsuccessful";
			return null;
		}
	}
}
?>