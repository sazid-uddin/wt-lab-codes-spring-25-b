<?php
$theme = 'light';
if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
	$theme = 'dark';
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page 2</title>
	<style>
		body {
			background-color: <?php echo $theme === 'dark' ? '#333' : '#fff'; ?>;
			color: <?php echo $theme === 'dark' ? '#fff' : '#000'; ?>;
		}
	</style>
</head>

<body>
	<p>This is page2.php</p>
	<p>Current theme: <?php echo htmlspecialchars($theme, ENT_QUOTES, 'UTF-8'); ?></p>
</body>

</html>