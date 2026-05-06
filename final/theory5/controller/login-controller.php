<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			echo "username: $username, password: $password";

			include '../model/UserModel.php';
			$userModelObj = new UserModel();
			echo "userModelObj created";
			$loginSucess = $userModelObj->checkLogin($username, $password);
			echo "loginSucess: $loginSucess";

			if ($loginSucess === true) {
				$_SESSION['username'] = $username;

				// collect data for home page
				$users_list = $userModelObj->getUsersList();
				$_SESSION['users_list'] = $users_list;

				header("Location: ../view/home-view.php");
			} else {
				echo "Login failed";
				header("Location: ../view/login-view.php");
			}
		}
	}
?>