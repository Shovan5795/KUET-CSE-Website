<?php
 $filepath=realpath(dirname(__FILE__));
 include_once $filepath.'/../lib/Session.php';
 Session:: init();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Register System</title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css"/>
	<script src="inc/jquery.min.js"></script>
	<script src="inc/bootstrap.min.js"></script>
</head>

<?php

     if (isset($_GET['action']) && $_GET['action']=="logout") {
          Session:: destroy();
     }

?>
<body>
<div class="container">
     <nav class="navbar navbar-default">
     	<div class="container-fluid">
     		<div class="navbar-header">
     			<a class="navbar-brand" href="st.php">Student Corner</a>
     		</div>
     		<ul class="nav navbar-nav pull-right">

               <?php 
               $id= Session:: get("id");
               $userlogin= Session:: get("login");
               if ($userlogin== true) {
               ?>
                    <li><a href="st.php">Home</a></li>
     			<li><a href="profile.php?id=<?php echo $id;?>">Profile</a></li>
     			<li><a href="?action=logout">Log Out</a></li>
                    <?php }else{ ?>

                    <li><a href="indexx.html"><b>KUET</b>CSE</a></li>
                    <li><a href="student.php">Login</a></li>
     			<li><a href="signup.php">Sign Up</a></li>
                    <?php } ?>
     		</ul>
     	</div>
     </nav>