<?php
    include 'inc/header.php';
    include 'lib/student.php';
?>

<style type="text/css">
body{
    background-color: rgba(51,23,33,1);
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
  }

  </style>

      	<div class="panel panel-default">
      		<div class="panel-heading">
      			<h2>
      				<a class="btn btn-warning" href="attendance.php">Take Attendance</a>
      			</h2>
      		</div>
      		<div class="panel-body">
      		
      			<form action="" method="post">
      				<table class="table table-striped">
      				<tr>
      					<th width="30%">Serial No.</th>
      					<th width="50%">Attendance Date</th>
      					<th width="20%">Action</th>
      				</tr>

                  <?php
                  $stu = new Student();
                  $get_date= $stu->getDateList();
                  if ($get_date) {
                        $i=0;
                        while ($value = $get_date->fetch_assoc()) {
                             $i++;
                   

                  ?>

      				<tr>
      					<td><?php echo $i; ?></td>
      					<td><?php echo $value['attend_date'] ; ?></td>
      					<td>
      						<a class="btn btn-primary" href="view_update.php?dt=<?php echo $value['attend_date'] ; ?>">View</a>
      					</td>
      				</tr>
      					
      		<?php 
                        } 
                  }

                   ?>		
      				</table>
      			</form>
      		</div>
      	</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      <?php
    include 'inc/footer.php';
?>