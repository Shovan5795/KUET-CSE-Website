<!DOCTYPE html>
<html>
<head>
	<title>Student Register System</title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css"/>
	<script src="inc/jquery.min.js"></script>
	<script src="inc/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
     <nav class="navbar navbar-default">
     	<div class="container-fluid">
     		<div class="navbar-header">
     			<a class="navbar-brand" href="em.php">Student Registration</a>
     		</div>
     		<ul class="nav navbar-nav pull-right">
     			<li><a href="profile2.php">Profile</a></li>
     			<li><a href="login.php">Login</a></li>
     			<li><a href="">Log Out</a></li>
     			<li><a href="signup2.php">Sign Up</a></li>
     		</ul>
     	</div>
     </nav>

     <div class="panel panel-default">
     	<div class="panel-heading">
     		<h2>Student List<span class="pull-right"><strong>Welcome!</strong>Shovon</span></h2>
     	</div>
     	<div class="panel-body">
     		<table class="table table-striped">
     		<tr>
     			<th width="20%">Serial</th>
     			<th width="20%">Name</th>
     			<th width="20%">Username</th>
     			<th width="20%">Roll</th>
     			<th width="20%">Email Address</th>
     			<th width="20%">Batch</th>
     			<th width="20%">Action</th>
     		</tr>

     		<tr>
     			<td>01</td>
     			<td>Bikash</td>
     			<td>Bikash14</td>
     			<td>1407001</td>
     			<td>bikash@gmail.com</td>
     			<td>2k14</td>
     			<td>
     				<a class="btn btn-primary" href="profile.php?id=1">View</a>
     			</td>
     		</tr>

     		<tr>
     			<td>02</td>
     			<td>Tusher</td>
     			<td>Tushu</td>
     			<td>1407002</td>
     			<td>tush@gmail.com</td>
     			<td>2k14</td>
     			<td>
     				<a class="btn btn-primary" href="profile.php?id=2">View</a>
     			</td>
     		</tr>


     		<tr>
     			<td>03</td>
     			<td>Pranto</td>
     			<td>Prank</td>
     			<td>1407003</td>
     			<td>prank@gmail.com</td>
     			<td>2k14</td>
     			<td>
     				<a class="btn btn-primary" href="profile.php?id=3">View</a>
     			</td>
     		</tr>
     			
     		</table>
     	</div>
     </div>

<?php include 'inc/footer.php'; ?>
	
</div>

</body>
</html>