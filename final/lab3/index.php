<?php
	// if (file_exists("webdictionary.txt")) {
	// 	echo readfile("webdictionary.txt");
	// } else {
	// 	echo "File not found";
	// }

	// read mode
	// $myFile = fopen("webdictionary.txt", "r") or die ("Unable to open file");
	// echo fread($myFile, filesize("webdictionary.txt"));
	// fclose($myFile);

	// write mode
	// $myFile = fopen("webdictionary.txt", "w") or die ("Unable to open file");
	// $content = "test content";
	// fwrite($myFile, $content);
	// fclose($myFile);

	// append mode
	// $myFile = fopen("webdictionary.txt", "a") or die ("Unable to open file");
	// $content = "\n\nextra content\n";
	// fwrite($myFile, $content);
	// fclose($myFile);


	// echo file_get_contents("webdictionary.txt");
	// file_put_contents("webdictionary.txt", "more content");
	
	// create mode
	$myFile = fopen("content.txt", "x") or die ("Unable to open file");
	fwrite($myFile, "test");
	fclose($myFile);
?>