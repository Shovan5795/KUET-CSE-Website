<?php 
	session_start();

	
	$db = mysqli_connect("localhost", "root", "", "abcd");
	if (isset($_POST['LOGIN'])) {
		$user = $_POST['user'];
		$pass =$_POST['pass'];
		if(isset($_POST['user'])){

		}
		//$password = md5($password); // remember we hashed password before storing last time
		$sql = "SELECT * FROM log WHERE user='$user' AND pass='$pass'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1) {
			//echo 'Logged in';
			
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['user'] = $user;
			header("location: abcd.php"); //redirect to home page
		}
		else{
			$_SESSION['message'] = "Username/password combination incorrect";
		}
	}
?>