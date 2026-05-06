<?php
class DBConnection {
	private $hostname = "localhost";
	private $db_username = "root";
	private $db_password = "";
	private $db_name = "wt_b";

	public function connect() {
		$conn = new mysqli(
			$this->hostname,
			$this->db_username,
			$this->db_password,
			$this->db_name,
		);

		if ($conn->connect_error) {
			echo "Database connection failed: " . $conn->error;
		}

		return $conn;
	}
}

?>