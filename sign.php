<?php 
	session_start();
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "abcd");
	if (isset($_POST['Register'])) {
		//$username = mysql_real_escape_string($_POST['username']);
		//$email = mysql_real_escape_string($_POST['email']);
		//$password = mysql_real_escape_string($_POST['password']);
		//$password2 = mysql_real_escape_string($_POST['password2']);
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$pass2=$_POST['pass2'];
		$email=$_POST['email'];
		if ($pass == $pass2 && $pass!="") {
			// create user
			//$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO log(fname,lname,user,pass,email) VALUES('$fname','$lname','$user', '$pass','email')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['user'] = $user;
			header("location: next.php"); //redirect to home page
		}else{ 
			$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>