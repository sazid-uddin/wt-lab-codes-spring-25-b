<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Page Title</title>
	<link rel='stylesheet' href='main.css'>
</head>
<body>
	<form method="post" action="upload.php" enctype="multipart/form-data">
		<p>Please upload your profile picture</p>
		<p>Only JPG, JPEG and PNG files are allowed</p>
		<input type="file" name="myFile">
		<input type="submit" value="Upload">
	</form>	
</body>
</html>