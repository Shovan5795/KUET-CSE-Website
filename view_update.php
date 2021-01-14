<?php
    include 'inc/header.php';
    include 'lib/student.php';
?>


<script type="text/javascript">
     $(document).ready(function(){
      $("form").submit(function(){
            var roll =true;
            $(':radio').each(function(){
                  name= $(this).attr('name');
                  if(roll && !$(':radio[name="' + name + '"]:checked').length){
                        //alert(name+ "Roll missing!!");
                        $('.alert').show(); 
                        roll=false; 
                  }
            });
            return roll;
      });
     });
</script>

<?php
error_reporting(0);
$stu=new Student();
$dt = $_GET['dt'];
if($_SERVER['REQUEST_METHOD']=='POST'){
  $attend=$_POST['attend'];
  $att_update = $stu->updateAttendance($dt,$attend); 
}
?>

<?php 
if(isset($att_update)){
  echo $att_update;
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
<div class='alert alert-danger' style="display: none"><strong>Carefull!!</strong>Student roll missing!!</div>

      	<div class="panel panel-default">
      		<div class="panel-heading">
      			<h2>
      				<a class="btn btn-warning" href="date_view.php">Back</a>
      			</h2>
      		</div>
      		<div class="panel-body">

          <div class="well text-center" style="font-size: 30px ">
            <strong>Date: </strong> <?php echo $dt; ?>
          </div>
      		
      			<form action="" method="post">
      				<table class="table table-striped">
      				<tr>
      					<th width="25%">Serial No.</th>
                <th width="25%">Student Name</th>
                <th width="25%">Student Roll</th>
                <th width="25%">Attendance</th>
      				</tr>

                  <?php
                  $get_student= $stu->getAllData($dt);
                  if ($get_student) {
                        $i=0;
                        while ($value = $get_student->fetch_assoc()) {
                             $i++;
                   

                  ?>

      				<tr>
      					<td><?php echo $i; ?></td>
                <td><?php echo $value['name'] ; ?></td>
                <td><?php echo $value['roll'] ; ?></td>
                <td>
                  <input type="radio" name="attend[<?php echo $value['roll'] ; ?>]" value="present" <?php if ($value['attend']== "present") {
                    echo "checked";
                  } ?>>P
                  <input type="radio" name="attend[<?php echo $value['roll'] ; ?>]" value="absent" <?php if ($value['attend']== "absent") {
                    echo "checked";
                  } ?>>A
                </td>
      				</tr>
      					
      		<?php 
                        } 
                  }

                   ?>


                   <tr>
              <td colspan="5">
                <input type="submit" class="btn btn-primary" name="submit" value="Update">
              </td>
              </tr>

      				</table>
      			</form>
      		</div>
      	</div>
      <?php
    include 'inc/footer.php';
?>