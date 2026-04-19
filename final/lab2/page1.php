<?php
$theme = null;
if (isset($_COOKIE['theme'])) {
	$theme = $_COOKIE['theme'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
	$newTheme = $_POST['theme'] === 'dark' ? 'dark' : 'light';
	setcookie('theme', $newTheme, time() + (60 * 60 * 24 * 30), '/');
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}
?>
<!doctype html>
<html lang="en">
<style>
	body {
		/* change background-color based on theme; */
		background-color: <?php echo $theme === 'dark' ? '#333' : '#fff'; ?>;
		/* change text color based on theme; */
		color: <?php echo $theme === 'dark' ? '#fff' : '#000'; ?>;
	}

	a {
		background-color: red;
	}
</style>
<body>
	<p>Current theme: <?php echo htmlspecialchars($theme, ENT_QUOTES, 'UTF-8'); ?></p>
	<form method="post">
		<input type="hidden" name="theme" value="<?php echo $theme === 'dark' ? 'light' : 'dark'; ?>">
		<button type="submit">Toggle Theme</button>
	</form>
	<a href="page2.php">Go to Page 2</a>
</body>
</html>
