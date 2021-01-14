<?php
include_once 'Session2.php';
include 'db.php';
class User2
{
	private $db;
	public function __construct()
	{
		$this->db = new db(); 
	}
	public function userRegistration2($data){
		$name= $data['name'];
		$designation= $data['designation'];
		$research= $data['research'];
		$email= $data['email'];
		$psw= $data['psw'];
		$chk_email=$this->emailCheck2($email);

		if($name=="" OR $designation=="" OR $research=="" OR $email=="" OR $psw==""){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Field must not be empty!!!</div>";
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
	$sql="INSERT INTO tbl_teacher(name,designation,research,email,password) VALUES(:name,:designation,:research,:email,:password) ";
	    $query= $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':designation',$designation);
		$query->bindValue(':research',$research);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$psw);
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

	public function emailCheck2($email){

		$sql="SELECT email FROM tbl_teacher WHERE email = :email";
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

	public function getLoginUser2($email,$psw){
		$sql="SELECT * FROM tbl_teacher WHERE email = :email AND password= :password LIMIT 1";
		$query= $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$psw);
		$query->execute();
		$result= $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}


	public function teacherLogin($data){

		$email= $data['email'];
		$psw= md5($data['psw']);
		$chk_email=$this->emailCheck2($email);

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

		$result=$this->getLoginUser2($email,$psw);

		if ($result) {
			Session2:: init();
			Session2:: set("login",true);
			Session2:: set("id",$result->id);
			Session2:: set("name",$result->name);
			Session2:: set("designation",$result->designation);
			Session2:: set("loginmsg","<div class='alert alert-success'><strong>Successful! </strong>You are logged in!!</div>");
			header("location:tch.php");
		}
		else{
			$msg="<div class='alert alert-danger'><strong>Error! </strong>Data not found!!</div>";
			return $msg;
		}


	}

	public function getUserData2(){
		$sql="SELECT * FROM tbl_teacher ORDER BY id DESC";
		$query= $this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}

	public function getUserById2($userid){
		$sql="SELECT * FROM tbl_teacher WHERE id= :id LIMIT 1";
		$query= $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$userid);
		$query->execute();
		$result= $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function updateUserData2($id,$data){
		$name= $data['name'];
		$designation= $data['designation'];
		$research= $data['research'];
		$email= $data['email'];

		if($name=="" OR $designation=="" OR $research=="" OR $email==""){
			$msg="<div class='alert alert-danger'><strong>Alert! </strong>Field must not be empty!!!</div>";
			return $msg;
		}
		
	$sql="UPDATE tbl_teacher set 
          name= :name,
          designation= :designation,
          research=:research,
          email=:email
          WHERE id=:id


	";
	    $query= $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':designation',$designation);
		$query->bindValue(':research',$research);
		$query->bindValue(':email',$email);
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

	private function checkPassword2($id,$old_password){
		$password=md5($old_password);

		$sql="SELECT password FROM tbl_teacher WHERE id=:id AND password = :password";
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

	public function updatePassword2($id,$data){
		$old_password= $data['old_password'];
		$new_pass= $data['new_pass'];
		$checkpass=$this->checkPassword2($id,$old_password);

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

			$sql="UPDATE tbl_teacher set 
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