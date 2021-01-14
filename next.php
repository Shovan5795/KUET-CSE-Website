<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo "<script>alert('Registered Successfully') </script>" ?>

</body>
</html>
<?php
session_destroy();
?>