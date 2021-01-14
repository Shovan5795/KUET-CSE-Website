<?php
include 'inc/nav.php';
include 'lib/User.php';
Session:: checkSession();
?>

<?php
if (isset($_GET['id'])) {
     $userid=(int)$_GET['id'];
}
$user= new User();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
     $updateusr= $user-> updateUserData($userid,$_POST);
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
  li{
    border-right: 1px solid blue;
    padding: 8px;
  }

  .height500{
    height: 500px;
  }
  .navbar {
      overflow: hidden;
      background-color: #333;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      width: 100%;
}

  .navbar a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 25px;
    }
  a{
    font-family: Lucida Sans Unicode;
  }

  a:hover{
    color:red;
  }
  b{
    font-family: Comic Sans MS;
    font-size: 25px;
  }
  .p{
    text-align: center;
    font-size: 25px;
    color: white;
    margin-top: 50px;
  }
  p{
    text-align: center;
    font-size: 25px;
    color: white;
    
  }
  .bb{
    color: skyblue;
  }

  .fl{
    float: left;
  }
  .navbar:hover {background-color: #333;}
</style>
<br>
<br>
<br>
<br>
<br>
<br>

     <div class="panel panel-default">
     	<div class="panel-heading">
               <h2>User Profile<span class="pull-right"><a class="btn btn-primary" href="st.php">Back</a></span></h2>
          </div>
     	<div class="panel-body">
             <div style="max-width: 600px; margin: 0 auto;"></div>

             <?php 
                   if(isset($updateusr)){
                    echo $updateusr;
                   }
              ?>

             <?php 

             $userdata=$user->getUserById($userid);
             if($userdata){
             ?>
     		<form action="" method="POST">
                   <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $userdata->name; ?>" />
                   </div>   

                   <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $userdata->username; ?>" />
                   </div> 

                   <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" class="form-control" value="<?php echo $userdata->roll; ?>" />
                   </div>   

                   <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" class="form-control"  value="<?php echo $userdata->email; ?>"/>
                   </div> 
                   <div class="form-group">
                        <label for="batch">Batch</label>
                        <input type="text" id="batch" name="batch" class="form-control" value="<?php echo $userdata->batch; ?>" />
                   </div>

                   <?php  $sessid= Session:: get("id");
                          if ($userid==$sessid) {
                    ?>

                   <button type="submit" name="update" class="btn btn-success">Update</button>  
                   <a class="btn btn-info" href="changepass.php?id=<?php echo $userid; ?>">Change password</a>
                   <?php } ?>
               </form>

               <?php  }       ?>
               </div>
     	</div>
     </div>

<?php include 'inc/footer.php'; ?>
	
</div>

</body>
</html>