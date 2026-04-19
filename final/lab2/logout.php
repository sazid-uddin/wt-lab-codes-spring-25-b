<?php
	session_start();
	session_unset(); // delete all values from session
	session_destroy();
	header('Location: login.php');
?>