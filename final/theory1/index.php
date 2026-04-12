<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Page Title</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='main.css'>
	<script src='main.js'></script>
</head>
<body>
	<h1>Welcome to PHP</h1>
	<p>This is a .php file</p>
	<?php 
		// echo "Printing from PHP <br>";

		// # $name = "ABC";
		// // $email = "someone@aiub.edu";

		// /*
		// echo "<table>";
		// echo "<tr>";
		// echo "<td>".$name."</td>";
		// echo "<td>".$email."</td>";
		// echo "</tr>";
		// echo "</table";
		// */

		// for ($i = 0; $i < 5; $i++){
		// 	echo $i . "<br>";
		// }

		$i = 2;
		$f = 1.2;
		$str = "hello world";
		$b = true;
		// $a = [1,2,3];
		$a = array(1,2,3, "str", ["a", "b"]);
		
		var_dump($i);
		echo "<br>";
		var_dump($f);
		echo "<br>";
		var_dump($str);
		echo "<br>";
		var_dump($a);


		//Associative Array
		$student = array("id"=>"23-12422-1", "name"=>"ABC", "CGPA"=>3.5);

		$numbers = [5,10,15,20];

		for ($i=0; $i<4; $i++) {
			echo $numbers[$i] . "<br>";
		}

		foreach ($numbers as $value) {
			echo $value . "<br>";
		}

		foreach ($student as $key => $value) {
			// echo "Key: " . $key . ": " . "Value: " . $value . "<br>";
			echo $key . $value;
		}

		$age=array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

		foreach ($age as $person => $age) {
			echo $person . " is " . $age . " years old <br>";
		}

	?>
</body>
</html>