<?php 
	extract ($_POST);
	$name = $_POST["username"];
	$comments = $_POST["comments"];
	$time = date("r");

	if (check($comments) && check($name)){
		$str = $name."\n".$time."\n".$comments."\n\n";
		$file = fopen("./comments.txt", "a");
		fwrite($file, $str);
		fclose($file);
	}

	function check($str){
		if (strpos($str." ", "damn ") !== FALSE){
			return FALSE;
		}
		else if (strpos($str." ", "hell ") !== FALSE){
			return FALSE;
		}
		else if (strpos($str." ", "pox ") !== FALSE){
			return FALSE;
		}
		else{
			return TRUE;
		}	
	}

	print <<< THANKS
	<html>
		<head>
			<title>Thank You</title>
		</head>
		<body>
			<h2> Thank You for Submitting Your Comments </h2>
		</body>
	</html>

THANKS;
?>