<?php 
	extract ($_POST);
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == "GET"){
		if (isset($_COOKIE['time'])){
			echo "You don't listen do you?";
			if ($_SESSION['question'] == 'q6'){
				question6();
			}
			else if ($_SESSION['question'] == 'q5'){
				question5();
			}
			else if ($_SESSION['question'] == 'q4'){
				question4();
			}
			else if ($_SESSION['question'] == 'q3'){
				question3();
			}
			else if ($_SESSION['question'] == 'q2'){
				question2();
			}
			else if ($_SESSION['question'] == 'q1'){
				question1();
			}
		}
		else {
			login();
		}
	}

	else if (isset($_SESSION['question'])){
		if ($_SESSION['question'] == 'q6'){
			timer();
			if (isset($_POST['q6'])){
				$selected = trim(strtolower($_POST['q6']));
				$answer = 'age';
				if ($selected == $answer){
					$_SESSION['correct']++;
				}
				if ($selected == ""){
					echo "<p> Please type in an answer. </p>";
					question6();
				}
				else{
					grade($_COOKIE['username']);
				}

			}
			else {
				question6();
			}
		}

		else if ($_SESSION['question'] == 'q5'){
			timer();
			if (isset($_POST['q5'])){
				$selected = trim(strtolower($_POST['q5']));
				$answer = 'galaxy';
				if ($selected == $answer){
					$_SESSION['correct']++;
				}
				if ($selected == ""){
					echo "<p> Please type in an answer. </p>";
					question5();
				}
				else {
					$_SESSION['question'] = "q6";
					question6();
				}
			}
			else {
				question5();
			}
		}
		
		else if ($_SESSION['question'] == 'q4'){
			timer();
			if (isset($_POST['q4'])){
				$selected = $_POST['q4'];
				$answer = 'd';
				if ($selected == $answer){
					$_SESSION['correct']++;
				}
				$_SESSION['question'] = "q5";
				question5();
			}	
			else {
				question4();
			}
		}
		
		else if ($_SESSION['question'] == 'q3'){
			timer();
			if (isset($_POST['q3'])){
				$selected = $_POST['q3'];
				$answer = 'b';
				if ($selected == $answer){
					$_SESSION['correct']++;
				}
				$_SESSION['question'] = "q4";
				question4();
			}
			else {
				question3();
			}
		}
		
		else if ($_SESSION['question'] == 'q2'){
			timer();
			if (isset($_POST['q2'])){
				$selected = $_POST['q2'];
				$answer = "TRUE";
				if ($selected == $answer){
					$_SESSION['correct']++;
				}
				$_SESSION['question'] = "q3";
				question3();
			}
			else {
				question2();
			}
		}

		else if ($_SESSION['question'] == 'q1'){
			timer();
			if (isset($_POST['q1'])){
				$selected = $_POST['q1'];
				$answer = "FALSE";
				if ($selected == $answer){
					$_SESSION['correct']++;
				}
				$_SESSION['question'] = "q2";
				question2();
			}
			else {
				question1();
			}
		}
	}

	else {
		if (isset($_POST['login'])){
			$success = FALSE;
			$taken = FALSE;
			$username = $_POST['username'];
			$password = $_POST['password'];

			//checking if already completed quiz
			$results = fopen('results.txt', "r");
			while(TRUE){
				$line = fgets($results);
				if ($line == ""){
					fclose($results);
					break;
				}
				$arr = explode(":", $line);
				if (trim($arr[0]) == trim($username)){
					$taken = TRUE;
					break;
				}
			}

			//checking for correct login
			if (!$taken){
				$file = fopen('passwd.txt', "r");
				while(TRUE){
					$line = fgets($file);
					if ($line == ""){
						fclose($file);
						break;
					}

					$arr = explode(":", $line);
					if (trim($arr[0]) == trim($username) && trim($arr[1]) == trim($password)){
						$success = TRUE;
						fclose($file);
						break;
					}

				}
			}

			if ($success){
				setcookie ('time', time(), time()+900);
				$_SESSION['correct'] = 0;
				$_SESSION['question'] = "q1";
				setcookie('username', $username, time()+3600*24*365);
				question1();
			}
			else {
				echo "Login failed";
				login();
			}
		}

		else{
			login();
		}
	}


// TIMER FUNCTION

	function timer(){
		if (!isset($_COOKIE['time'])){
			grade($_COOKIE['username']);
			echo "Time ran out. Ignore the question below it will not be scored.";
		}
	}



// HTML PAGES

	function login(){
		$script = $_SERVER['PHP_SELF'];
		print <<< LOGIN
			<!DOCTYPE html>
			<html>
			<head>
				<title>Login - Astronomy Quiz</title>
			</head>
			<body>
				<form action="$script" method="post">
					<h2>Astronomy Quiz</h2>
					<input type="hidden" name="login">
					<table>
						<tr>
							<td>Username:</td>
							<td><input type="text" size="30" name="username"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" size="30" name="password"></td>
						</tr>
						<tr>
							<td><input type="submit" value="Login"></td>
							<td><input type="reset" value="Clear"></td>
						</tr>
					</table>
				</form>
			</body>
			</html>
LOGIN;
	}

	function question1(){
		$script = $_SERVER['PHP_SELF'];
		print <<< Q1
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Q1 - Astronomy Quiz</title>
			</head>
			<body>
				<h2>Question 1</h2>
				<form action="$script" method="post">
					<p>According to Kepler the orbit of the earth is a circle with the sun at the center.</p><br>
					<label><input type="radio" name="q1" value="TRUE">True</label><br>
					<label><input type="radio" name="q1" value="FALSE">False</label><br><br>
					<input type="submit" value="Submit">
				</form>
				<p>WARNING: Do not refresh or press back button.</p>
			</body>
			</html>
Q1;
	}

	function question2(){
		$script = $_SERVER['PHP_SELF'];
		print <<< Q2
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Q2 - Astronomy Quiz</title>
			</head>
			<body>
				<h2>Question 2</h2>
				<form action="$script" method="post">
					<p>Ancient astronomers did consider the heliocentric model of the solar system but rejected it because they could not detect parallax.</p><br>
					<label><input type="radio" name="q2" value="TRUE">True</label><br>
					<label><input type="radio" name="q2" value="FALSE">False</label><br><br>
					<input type="submit" value="Submit">
				</form>
				<p>WARNING: Do not refresh or press back button.</p>
			</body>
			</html>
Q2;
	}

	function question3(){
		$script = $_SERVER['PHP_SELF'];
		print <<< Q3
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Q3 - Astronomy Quiz</title>
			</head>
			<body>
				<form action="$script" method="post">
					<p><b>3)</b> The total amount of energy that a star emits is directly related to its</p>
					<label><input type="checkbox" name="q3" value="a"> a) surface gravity and magnetif field</label><br>
					<label><input type="checkbox" name="q3" value="b"> b) radius and temperature</label><br>
					<label><input type="checkbox" name="q3" value="c"> c) pressure and volume</label><br>
					<label><input type="checkbox" name="q3" value="d"> d) location and velocity</label><br><br>
					<input type="submit" value="Submit">
				</form>
				<p>WARNING: Do not refresh or press back button.</p>
			</body>
			</html>
Q3;
	}
	
	function question4(){
		$script = $_SERVER['PHP_SELF'];
		print <<< Q4
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Q4 - Astronomy Quiz</title>
			</head>
			<body>
				<form action="$script" method="post">
					<p><b>4)</b> Stars that live the longest have</p>
					<label><input type="checkbox" name="q4" value="a"> a) high mass</label><br>
					<label><input type="checkbox" name="q4" value="b"> b) high temperature</label><br>
					<label><input type="checkbox" name="q4" value="c"> c) lots of hydrogen</label><br>
					<label><input type="checkbox" name="q4" value="d"> d) small mass</label><br><br>
					<input type="submit" value="Submit">
				</form>
				<p>WARNING: Do not refresh or press back button.</p>
			</body>
			</html>
Q4;
	}
	
	function question5(){
		$script = $_SERVER['PHP_SELF'];
		print <<< Q5
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Q5 - Astronomy Quiz</title>
			</head>
			<body>
				<form action="$script" method="post">
					<p><b>5)</b> A collection of a hundred billion stars, gas, and dust is called a ______.</p>
					<input type="text" size="15" name="q5"><br><br>
					<input type="submit" value="Submit">
				</form>
				<p>WARNING: Do not refresh or press back button.</p>
			</body>
			</html>
Q5;
	}

	function question6(){
		$script = $_SERVER['PHP_SELF'];
		print <<< Q6
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Q6 - Astronomy Quiz</title>
			</head>
			<body>
				<form action="$script" method="post">
					<p><b>6)</b> The inverse of the Hubble's constant is the measure of the _____ of the universe.</p>
					<input type="text" size="15" name="q6"><br><br>
					<input type="submit" value="Submit">
				</form>
				<p>WARNING: Do not refresh or press back button.</p>
			</body>
			</html>
Q6;
	}

	function grade($usr){
		$score = $_SESSION['correct'] * 10;
		print <<< GRADE
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Grade - Astronomy Quiz</title>
			</head>
			<body>
				<h2>Your Grade</h2>
				<p>$score</p>
			</body>
			</html>
GRADE;
		$file = fopen('results.txt', 'a');
		$str = $usr . ":" . $score ."\n";
		fwrite($file, $str);
		fclose($file);
		setcookie ('time', 0, time());
		setcookie ('username', 0, time());
		session_destroy();
	}

 ?>
