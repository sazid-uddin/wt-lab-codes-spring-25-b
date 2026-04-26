<?php
	$books = new SimpleXMLElement('<?xml version="1.0"?><books/>');

	$book1 = $books->addChild("book");
	$book1->addChild("BookTitle", "Harry Potter");
	$book1->addChild("PublicationYear", "1998");

	$book2 = $books->addChild("book");
	$book2->addChild("BookTitle", "Lord of the Rings");
	$book2->addChild("PublicationYear", "1970");

	file_put_contents('new_books.xml', $books->asXML());
	echo "XML created";
?>