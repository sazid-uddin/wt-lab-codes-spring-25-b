<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// print_r($_FILES);
		echo $_FILES['myFile']['name'];
		echo "<br>";
		echo $_FILES['myFile']['tmp_name'];
		echo "<br>";
		echo $_FILES['myFile']['type'];
		echo "<br>";
		echo $_FILES['myFile']['size'];
		echo "<br>";
		echo "<br>";


		// permamently store file in uploads folder
		$temp_file = $_FILES['myFile']['tmp_name'];
		$target_file_name = $_FILES['myFile']['name'];
		$target_dir = 'uploads/';
		$target_file = $target_dir . $target_file_name;
		echo "Taget file: " . $target_file;
		echo "<br>"; 
		$target_file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		echo "<br>"; 

		// file type validation
		$allowed_types = ['jpg', 'jpeg', 'png', 'webp'];

		if (in_array($target_file_extension, $allowed_types)) {
			// file size validation (2MB MAX upload size)
			$MAX_ALLOWED_SIZE = 2*1024; // in bytes
			$target_file_size = $_FILES['myFile']['size']; // in bytes

			if ($target_file_size > $MAX_ALLOWED_SIZE) {
				echo "File too big";
			} else {
				if (move_uploaded_file($temp_file, $target_file)) {
					echo 'uploaded and stored in uploads folder';
				} else {
					echo "File not uploaded";
				}
			}
		} else {
			echo "File type not allowed";
		}


	}
?>