<?php
 $filepath= realpath(dirname(__FILE__));
 include_once ($filepath.'/database.php');
?>


<?php

class Student
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getStudents(){
        $query="SELECT * FROM at_student";
        $result= $this->db->select($query);
        return $result;
	}


	public function insertStudent($name,$roll){
		$name= mysqli_real_escape_string($this->db->link, $name);
		$roll= mysqli_real_escape_string($this->db->link, $roll);

		if (empty($name) || empty($roll)) {
			$msg="<div class='alert alert-danger'><strong> Carefull!!</strong>Field should not be empty!! </div>";
			return $msg;
		}
		else{
			$stu_query = "INSERT INTO at_student(name,roll) VALUES('$name','$roll')";
			$stu_insert= $this->db->insert($stu_query);

			$stu_att = "INSERT INTO at_attendance(roll) VALUES('$roll')";
			$stu_insert= $this->db->insert($stu_att);


			if ($stu_insert) {
				$msg="<div class='alert alert-success'><strong>Successful!!</strong>Data inserted successfully!!</div>";
			return $msg;
			}
			else{
				$msg="<div class='alert alert-danger'><strong> Error!!</strong>Data not inserted successfully!! </div>";
			return $msg;
			}

		}
	}

    public function insertAttendance($cur_date,$attend = array()){
    	$query= "SELECT DISTINCT attend_date FROM at_attendance";
    	$getdata= $this->db->select($query);
    	while ($result= $getdata->fetch_assoc()) {
    		$db_date= $result['attend_date'];
    		if ($cur_date == $db_date) {
    			$msg="<div class='alert alert-danger'><strong>ALERT!!</strong>Attendance has already taken today!!</div>";
			    return $msg;
    		}
    	}

    	foreach ($attend as $atn_key => $atn_value) {
    		if($atn_value == "present"){
    			$stu_query="INSERT INTO at_attendance(roll, attend, attend_date) VALUES('$atn_key','present',now()) ";
    			$data_insert= $this->db->insert($stu_query);
    		}
    		elseif ($atn_value == "absent") {
    			$stu_query="INSERT INTO at_attendance(roll, attend, attend_date) VALUES('$atn_key','absent',now()) ";
    			$data_insert= $this->db->insert($stu_query);
    		}

    	}

    	if ($data_insert) {
				$msg="<div class='alert alert-success'><strong>Successful!!</strong>Attendance data inserted successfully!!</div>";
			return $msg;
			}
			else{
				$msg="<div class='alert alert-danger'><strong>Carefull!!</strong>Attendance data not inserted successfully!!</div>";
			return $msg;
			}
			
    }
    public function getDateList(){
    	$query= "SELECT DISTINCT attend_date FROM at_attendance";
    	$result= $this->db->select($query);
    	return $result;
    }

    public function getAllData($dt){
    	$query= "SELECT at_student.name, at_attendance.* FROM at_student INNER JOIN at_attendance ON at_student.roll = at_attendance.roll WHERE attend_date='$dt'";
    	$result= $this->db->select($query);
    	return $result;
    }


    public function updateAttendance($dt,$attend){   
    	foreach ($attend as $atn_key => $atn_value) {
    		if($atn_value == "present"){
    			$query="UPDATE at_attendance SET attend='present' WHERE roll='".$atn_key."' AND attend_date='".$dt."'";
    			$data_update= $this->db->update($query);
    		}
    		elseif ($atn_value == "absent") {
    			$query="UPDATE at_attendance SET attend='absent' WHERE roll='".$atn_key."' AND attend_date='".$dt."'";
    			$data_update= $this->db->update($query);

    	}
    }

    	if ($data_update) {
				$msg="<div class='alert alert-success'><strong>Successful!!</strong>Attendance data updated successfully!!</div>";
			return $msg;
			}
			else{
				$msg="<div class='alert alert-danger'><strong>Carefull!!</strong>Attendance data not updated successfully!!</div>";
			return $msg;
			}



}



}

?>