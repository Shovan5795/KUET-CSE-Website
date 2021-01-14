<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>correct</title>
</head>
<body>
<?php echo "<script>alert('Login Successfully') </script>" ?>
<div><a href="logout.php">Log Out</a></div>

</body>
</html>
<?php
session_destroy();
?>