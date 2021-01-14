<?php
session_start();
unset($_SESSION['user']);
$_SESSION['message']="you are now logged out";
header("location: student.php");
session_destroy();

?>