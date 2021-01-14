<?php
include 'inc/nav2.php';
include 'lib/User2.php';
Session2:: checkSession();
?>

<?php
if (isset($_GET['id'])) {
     $userid=(int)$_GET['id'];
}
$user= new User2();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
     $updateusr= $user-> updateUserData2($userid,$_POST);
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
               <h2>User Profile<span class="pull-right"><a class="btn btn-primary" href="tch.php">Back</a></span></h2>
          </div>
     	<div class="panel-body">
             <div style="max-width: 600px; margin: 0 auto;"></div>

             <?php 
                   if(isset($updateusr)){
                    echo $updateusr;
                   }
              ?>

             <?php 

             $userdata=$user->getUserById2($userid);
             if($userdata){
             ?>
     		<form action="" method="POST">
                   <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $userdata->name; ?>" />
                   </div>   

                   <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" id="designation" name="designation" class="form-control" value="<?php echo $userdata->designation; ?>" />
                   </div> 

                   <div class="form-group">
                        <label for="research">Research</label>
                        <input type="text" id="research" name="research" class="form-control" value="<?php echo $userdata->research; ?>" />
                   </div>   

                   <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" class="form-control"  value="<?php echo $userdata->email; ?>"/>
                   </div> 
                   <?php  $sessid= Session2:: get("id");
                          if ($userid==$sessid) {
                    ?>

                   <button type="submit" name="update" class="btn btn-success">Update</button>  
                   <a class="btn btn-info" href="changepass2.php?id=<?php echo $userid; ?>">Change password</a>
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