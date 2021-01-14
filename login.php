<!DOCTYPE html>

<?php
session_start();
if($_SESSION['var']==1)	
{$_SESSION['var']=0;
echo $_SESSION['message'];

}

if(!isset($_COOKIE['uid']))
{
	$temp="";
	$temp1="";
}
else
{
	$temp=$_COOKIE['uid'] ;
	$temp1=$_COOKIE['pswr'];
	
}
?>
<html>
<head>
<script>
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(user,"Username must be filled out!")==false)
  {  user.focus(); return false;}
  else if (validate_required(pass,"Password must be filled out!")==false)
  {  pass.focus(); return false;}
  }
}
</script>
</head>
<title> Login Page </title>
<link rel="stylesheet" href="style.css">
<style>
body
{
	background-image:url('madrid.jpg');
	background-color: white;
	background-repeat:no-repeat;
    font-size:20;
	font-color:red;
    height:100%;
}
#frm
{
	border: solid gray 1px;
	width: 20%;
	border-radius: 5px;
	margin: 50px auto;
	background: rgba(0,0,0,0.5);
	padding: 40px;
}
#frm input
{
	background: transparent;
}
label
{
	color: white;
	font-weight: bolder;
}
p
{
	color: white;
	font-weight: bolder;
}
#btn
{
	color : white;
	background : blue;
	padding: 5px;
	margin-left : 69%;
}

#h1
{
	color : blue;
	padding: 5px;
	margin-bottom : 50%;
}

#h5
{
	color : blue;
	padding: 5px;
	margin-bottom : 50%;
}
</style>
<body>
  <center><font color='white' size='40' >Welcome User</font></br><font color='black' size='5'>Please Log in to continue...</font></center>
 <div id="frm">
 <form name="myForm" action="process.php" onSubmit="return validate_form(this)" method="post">
 <p>
 <label> Username </label>
 <input type="text" id="user" name="user" placeholder="Username..." value="<?php echo $temp ?>"/>
 </p>
 <p> 
 <label> Password </label>
 <input type="password" id="pass" name="pass" placeholder="Password..." value="<?php echo $temp1 ?>"/>
 </p>
 <p>
 <input type="submit" id="btn" name="LOGIN" value="Sign in"/>
 </p>
 <p>
 Don't have any account?
 </p>
 <a href="register.php"> <p> Click Here </p> </a>
 </br><p>
 <input type="checkbox" name="ccc" value="ch" /> Remember Username and Password</p>
 </form>
 </div>
</body>

</html>