<?php
include 'lib/User.php';
include 'inc/nav.php';
Session:: checkLogin();
?>

<?php
$user=new User();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
	$user_login= $user-> studentLogin($_POST);
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css"/> 
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


	.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}
</style>



</head>
<body>

<br>
<br>
<br>
<br>
<br>
<br>



<div class="panel panel-default">
     	<div class="panel-heading">
               <h2>Student Login</h2>
          </div>
     	<div class="panel-body">
             <div style="max-width: 600px; margin: 0 auto;"></div>
             <?php
             if(isset($user_login)){
             	echo $user_login;
             }

              ?>
     		<form action="" method="POST" style="font-family: cursive;">

        <div class="imgcontainer">
            <img src="Stu.png" alt="Avatar"  class="avatar">
        </div>
                   <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" placeholder="Enter  email" id="email" name="email" class="form-control" />
                   </div> 

                   <div class="form-group">
                        <label for="psw">Password</label>
                        <input type="password" placeholder="Enter password" id="psw" name="psw" class="form-control" />
                   </div>

                   <button type="submit" name="login" class="btn btn-success">Login</button>  
               </form>
               </div>
     	</div>
     </div>

<?php include 'inc/footer.php'; ?>
	
</div>



</body>
</html>