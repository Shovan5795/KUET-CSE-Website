<?php
include 'inc/nav2.php';
include 'lib/User2.php';
Session2:: checkSession();
?>

<?php
$loginmsg= Session2:: get("loginmsg");
if(isset($loginmsg)){
     echo $loginmsg;
}
Session2:: set("loginmsg",NULL);
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
               <h2>Teacher List<span class="pull-right">Welcome!<strong>
               <?php

               $name=Session2:: get("name");
               if(isset($name)){
                    echo $name;
               }

               ?>

               </strong></span></h2>
          </div>
          <div class="panel-body">
               <table class="table table-striped">
               <tr>
                    <th width="20%">Serial</th>
                    <th width="20%">Name</th>
                    <th width="20%">Designation</th>
                    <th width="20%">Research</th>
                    <th width="20%">Email Address</th>
                    <th width="20%">Action</th>
               </tr>

               <?php 
               $user=new User2();
               $userdata=$user->getUserData2();
               if (isset($userdata)) {
                    $i=0;
                    foreach ($userdata as $sdata) {
                         $i++;

               ?>

               <tr>
                    <td><?php echo $i;  ?></td>
                    <td><?php echo $sdata['name'] ; ?></td>
                    <td><?php echo $sdata['designation'];  ?></td>
                    <td><?php echo $sdata['research'];  ?></td>
                    <td><?php echo $sdata['email'];  ?></td>
                    <td>
                         <a class="btn btn-primary" href="profile2.php?id=<?php echo $sdata['id'] ; ?>">View</a>
                    </td>
               </tr>
    <?php }}else{  ?>
    <tr><td colspan="4"><h2>No data found...</h2></td></tr>

    <?php } ?>
               </table>
          </div>
     </div>

<?php include 'inc/footer.php'; ?>
     
</div>

</body>
</html>