<?php
	include '../model/UserModel.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$userModelObj = new UserModel();
		$deleteSuccess = $userModelObj->deleteUser($_POST['username']);
		
		if ($deleteSuccess === true) {
			header("Location: ../view/home-view.php");
		} else {
			echo "User deletion failed";
			header("Location: ../view/home-view.php");
		}
	}
?>