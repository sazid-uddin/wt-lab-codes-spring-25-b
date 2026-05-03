<?php
include_once("../model/UserModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo 'validation passed';

		$userModelObj = new UserModel();
		echo 'model object created';
		$loginSuccess = $userModelObj->checkLogin($username, $password);
		echo 'login checked: ' . $loginSuccess;

		if ($loginSuccess === true) {
			// collect all data needed for home page and store in session
			$users_list = $userModelObj->getAllUsersList();
			$_SESSION['users_list'] = $users_list;
			header('Location: ../view/home-view.php');
	 	} else {
			header('Location: ../view/login-view.php');
		}

	}
}
?>