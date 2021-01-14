<?php
include_once 'Session.php';
include 'db.php';
class User
{
	private $db;
	public function __construct()
	{
		$this->db = new db(); 
	}
	public function userRegistration($data){
		$name= $data['name'];
		$uname= $data['uname'];
		$roll= $data['roll'];
		$email= $data['email'];
		$psw= $data['psw'];
		$batch= $data['batch'];
		$chk_email=$this->emailCheck($email);

		if($name=="" OR $uname=="" OR $roll=="" OR $email=="" OR $psw=="" OR $batch==""){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Field must not be empty!!!</div>";
			return $msg;
		}
		if(strlen($uname)<3){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Username is too short!!</div>";
			return $msg;
		}elseif (preg_match('/[^a-z0-9_-]+/i',$uname)) {
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Username must only contain alphanumerical,dashes and underscores!!</div>";
			return $msg;
		}

		if(filter_var($email,FILTER_VALIDATE_EMAIL)=== false){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Invalid email address!!</div>";
			return $msg;
		}
		if($chk_email==true){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Email address already exist!!</div>";
			return $msg;
		}

        $psw= md5($data['psw']);
	$sql="INSERT INTO tbl_student(name,username,roll,email,password,batch) VALUES(:name,:username,:roll,:email,:password,:batch) ";
	    $query= $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$uname);
		$query->bindValue(':roll',$roll);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$psw);
		$query->bindValue(':batch',$batch);
		$result=$query->execute();
		if($result){
			$msg="<div class='alert alert-success'><strong>Congratulations!! </strong>You have been registered</div>";
			return $msg;
		}
		else{
			$msg="<div class='alert alert-danger'><strong>Sorry!! </strong>There are some problems inserting your details</div>";
			return $msg;
		}


	} 

	public function emailCheck($email){

		$sql="SELECT email FROM tbl_student WHERE email = :email";
		$query= $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}
		else{
			return false;
		}

	}

	public function getLoginUser($email,$psw){
		$sql="SELECT * FROM tbl_student WHERE email = :email AND password= :password LIMIT 1";
		$query= $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$psw);
		$query->execute();
		$result= $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}


	public function studentLogin($data){

		$email= $data['email'];
		$psw= md5($data['psw']);
		$chk_email=$this->emailCheck($email);

		if($email=="" OR $psw==""){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Field must not be empty!!!</div>";
			return $msg;
		}

		if(filter_var($email,FILTER_VALIDATE_EMAIL)=== false){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Invalid email address!!</div>";
			return $msg;
		}
		if($chk_email==false){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Email address not exist!!</div>";
			return $msg;
		}

		$result=$this->getLoginUser($email,$psw);

		if ($result) {
			Session:: init();
			Session:: set("login",true);
			Session:: set("id",$result->id);
			Session:: set("name",$result->name);
			Session:: set("username",$result->uname);
			Session:: set("loginmsg","<div class='alert alert-success'><strong>Successful! </strong>You are logged in!!</div>");
			header("location:st.php");
		}
		else{
			$msg="<div class='alert alert-danger'><strong>Error! </strong>Data not found!!</div>";
			return $msg;
		}


	}

	public function getUserData(){
		$sql="SELECT * FROM tbl_student ORDER BY id DESC";
		$query= $this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}

	public function getUserById($userid){
		$sql="SELECT * FROM tbl_student WHERE id= :id LIMIT 1";
		$query= $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$userid);
		$query->execute();
		$result= $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function updateUserData($id,$data){
		$name= $data['name'];
		$uname= $data['username'];
		$roll= $data['roll'];
		$email= $data['email'];
		$batch= $data['batch'];

		if($name=="" OR $uname=="" OR $roll=="" OR $email=="" OR $batch==""){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Field must not be empty!!!</div>";
			return $msg;
		}
		
	$sql="UPDATE tbl_student set 
          name= :name,
          username= :username,
          roll=:roll,
          email=:email,
          batch=:batch
          WHERE id=:id


	";
	    $query= $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$uname);
		$query->bindValue(':roll',$roll);
		$query->bindValue(':email',$email);
		$query->bindValue(':batch',$batch);
		$query->bindValue(':id',$id);
		$result=$query->execute();
		if($result){
			$msg="<div class='alert alert-success'><strong>Congratulations!! </strong>User data updated sucessfully..</div>";
			return $msg;
		}
		else{
			$msg="<div class='alert alert-danger'><strong>Sorry!! </strong>User data not updated sucessfully..</div>";
			return $msg;
		}
	}

	private function checkPassword($id,$old_password){
		$password=md5($old_password);

		$sql="SELECT password FROM tbl_student WHERE id=:id AND password = :password";
		$query= $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':password',$password);
		$query->execute();
		if ($query->rowCount() >0) {
			return true;
		}
		else{
			return false;
		}

	}

	public function updatePassword($id,$data){
		$old_password= $data['old_password'];
		$new_pass= $data['new_pass'];
		$checkpass=$this->checkPassword($id,$old_password);

		if($old_password == "" OR $new_pass == ""){
			$msg="<div class='alert alert-danger'><strong>Alert!! </strong>Field must not be empty</div>";
			return $msg;
		}
			if($checkpass == false){
				$msg="<div class='alert alert-danger'><strong>Sorry!! </strong>Old password does not exist</div>";
			return $msg;
			}

			if(strlen($new_pass)<6){
				$msg="<div class='alert alert-danger'><strong>Alert!! </strong>The password is too short</div>";
			return $msg;
			}

			$password=md5($new_pass);

			$sql="UPDATE tbl_student set 
          password= :password
          WHERE id=:id


	";
	    $query= $this->db->pdo->prepare($sql);
		$query->bindValue(':password',$password);
		$query->bindValue(':id',$id);
		$result=$query->execute();
		if($result){
			$msg="<div class='alert alert-success'><strong>Congratulations!! </strong>Password updated sucessfully..</div>";
			return $msg;
		}
		else{
			$msg="<div class='alert alert-danger'><strong>Sorry!! </strong>Password not updated sucessfully..</div>";
			return $msg;
		}



	}
}
?>