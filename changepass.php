<?php
include 'inc/nav.php';
include 'lib/User.php';
Session:: checkSession();
?>

<?php
if (isset($_GET['id'])) {
     $userid=(int)$_GET['id'];
     $sessid= Session:: get("id");
     if ($userid!=$sessid) {
      header("Location: st.php");

     }
}
$user= new User();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepass'])){
     $updatepass= $user-> updatePassword($userid,$_POST);
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
               <h2>Change password<span class="pull-right"><a class="btn btn-primary" href="profile.php?id=<?php echo $userid; ?>">Back</a></span></h2>
          </div>
     	<div class="panel-body">
             <div style="max-width: 600px; margin: 0 auto;"></div>

             <?php 
                   if(isset($updatepass)){
                    echo $updatepass;
                   }
              ?>
     		<form action="" method="POST">
                   <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" id="old_password" name="old_password" class="form-control" />
                   </div>   


                   <div class="form-group">
                        <label for="new_pass">New Password</label>
                        <input type="password" id="new_pass" name="new_pass" class="form-control"/>
                   </div> 

                   <button type="submit" name="updatepass" class="btn btn-success">Update</button>  
               </form>
               </div>
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

<?php include 'inc/footer.php'; ?>
	
</div>

</body>
</html>