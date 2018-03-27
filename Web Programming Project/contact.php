<?php 
	extract($_POST);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	$str = $name . "\n" . $email  . "\n" . $message . "\n\n";

	$file = fopen('contact.txt', 'a');
	fwrite($file, $str);
	fclose($file);

	echo "<h2> Your message has been sent </h2>";
	echo "<p><a href='contact.html'>Back to contact page</a></p>";

 ?>