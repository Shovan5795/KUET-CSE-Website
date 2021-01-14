<?php
    include 'inc/header.php';
    include 'lib/student.php';

?>

<?php
$stu=new Student();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name=$_POST['name'];
  $roll=$_POST['roll'];
  $insertdata = $stu->insertStudent($name,$roll); 
}
?>

<?php 
if(isset($insertdata)){
  echo $insertdata;
}
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
      	
      		
      		<div class="panel-body">
                       <div class="panel-heading form-group">
                        <h2>
                              
                              <a class="btn btn-success pull-right" href="attendance.php">Back</a>
                        </h2>
                        </div>
      		
      			<form action="" method="post">
                        <div class="form-group">
                        <label for="name" style="color:#DF825A;">Student Name</label>
                        <input type="text" placeholder="enter name" class="form-control" name="name" id="name" >
      		      </div>

                        <div class="form-group" style="color:#DF825A;">
                        <label for="roll">Student Roll</label>
                        <input type="text" placeholder="Enter roll" class="form-control" name="roll" id="roll" >
                        </div>
                        <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Now">
                        </div>

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

      <?php
    include 'inc/footer.php';
?>