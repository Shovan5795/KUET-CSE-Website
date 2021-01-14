
<!DOCTYPE html>

<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css"/>
<style type="text/css">
	body{
		background-color: rgba(51,23,33,1);
		background-size: cover;
		background-repeat: no-repeat;
		width: 80%;
		height: 100%;
	}
	td
{
	color: white;
	font-weight: bolder;
}


	label{
		color: white;
		font-weight: bolder;
	}

    p
    {
    	color: white;
    	font-weight: bolder;
    }

	li{
		
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
	
	.navbar:hover {background-color: #333;}

	input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {float:left;width:50%}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
	position: absolute;
    background-color: #2E2F92;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    left:90px;
    right: 40px;
    top: 150px;
}


/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

</style>



</head>
<body>
<div class="navbar">
  <a href="indexx.html"><b>KUET</b>CSE</a>
  <a href="slide.html">Home</a>
  <a href="about.html">About</a>
  <a href="Courses.html">Courses</a>
  <a href="student.php">Student Corner</a>
  <a href="teacher.php">Teacher Corner</a>
  <a href="#about">Employee Corner</a>
  <a href="attendance.php"> Student Attendance</a>
</div>

<div style="position: relative; top: 80px; left:30px;">
<h2 style="color: #D35710;">Student Signup Form</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
<br>
<a class="btn btn-primary" href="student.php">Back</a>


<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="/action_page.php">
    <div class="container">
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email"  name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <input type="checkbox" checked="checked"> <b>Remember me</b>
      <p>By creating an account you agree to our <a href="#" style="color: #D5E425;">Terms &amp Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>

      </div>
    </div>
  </form>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>




</body>
</html>