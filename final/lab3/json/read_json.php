<?php
	$json_data = file_get_contents('data.json');
	echo $json_data;
	echo "<br>";
	echo "<br>";
	$assoc_array_from_json = json_decode($json_data, true);
	print_r($assoc_array_from_json);

	// json_encode
	$data_for_encoding = ["key"=>"value"];
	$encoded_data = json_encode($data_for_encoding);
	echo "<br>";
	echo "<br>";
	echo $encoded_data;
?>