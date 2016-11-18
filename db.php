<?php

	function conn() {
		return new PDO("mysql:host=localhost;dbname=st", 'root', '');
	}
	
	function addSchool($data) {
		$conn = conn();
		$sql = "INSERT INTO schools(schoolname, address, telephone)
				VALUES(?, ?, ?)";
		$pdo = $conn->prepare($sql);
		$ins = $pdo->execute($data);
		$conn = null;
		if($ins) {
			header('Location: manageschool.php');
		}
		else {
			die("Error adding school.");
		}
	}
	
	function viewAllSchools() {
		$conn = conn();
		$sql = "SELECT * FROM schools";
		$pdo = $conn->prepare($sql);
		$pdo->execute();
		$res = $pdo->fetchAll();
		$conn = null;
		
		return $res;
	}
	
	function getSchool($data) {
		$conn = conn();
		$sql = "SELECT * FROM schools WHERE schoolid = ?";
		$pdo = $conn->prepare($sql);
		$pdo->execute($data);
		$res = $pdo->fetchAll();
		$conn = null;
		
		return $res;
	}
	
	function updateSchool($data) {
		$conn = conn();
		$sql = "UPDATE schools SET schoolname=?, address=?, telephone=? WHERE schoolid=?";
		$pdo = $conn->prepare($sql);
		$update = $pdo->execute($data);
		$conn = null;
		
		if($update) {
			header('Location: manageschool.php');
		}
		else {
			die("Error updating school.");
		}
	}
	
	function delSchool($data) {
		$conn = conn();
		$sql = "DELETE FROM schools WHERE schoolid=?";
		$pdo = $conn->prepare($sql);
		$del = $pdo->execute($data);
		$conn = null;
		
		if($del) {
			header('Location: manageschool.php');
		}
		else {
			die("Error deleting school");
		}
	}
	
	function addDept($data) {
		$conn = conn();
		$sql = "INSERT INTO departments(deptname, dean, schoolid)
				VALUES(?, ?, ?)";
		$pdo = $conn->prepare($sql);
		$ins = $pdo->execute($data);
		$conn = null;
		
		if($ins) {
			header('Location: managedepartment.php');
		}
		else {
			die("Error adding department.");
		}
	}
	
	function viewAllDept() {
		$conn = conn();
		$sql = "SELECT * FROM schools AS S INNER JOIN departments as D ON S.schoolid = D.schoolid";
		$pdo = $conn->prepare($sql);
		$pdo->execute();
		$res = $pdo->fetchAll();
		$conn = null;
		
		return $res;
	}
	
	function getDept($data) {
		$conn = conn();
		$sql = "SELECT * FROM schools AS S INNER JOIN departments as D ON S.schoolid = D.schoolid WHERE deptid = ?";
		$pdo = $conn->prepare($sql);
		$pdo->execute($data);
		$res = $pdo->fetchAll();
		$conn = conn();
		
		return $res;
	}
	
	function updateDept($data) {
		$conn = conn();
		$sql = "UPDATE departments SET deptname=?, dean=?, schoolid=? WHERE deptid=?";
		$pdo = $conn->prepare($sql);
		$update = $pdo->execute($data);
		$conn = null;
		
		if($update) {
			header('Location: managedepartment.php');
		}
		else {
			die("Error updating department.");
		}
	}
	
	function delDept($data) {
		$conn = conn();
		$sql = "DELETE FROM departments WHERE deptid = ?";
		$pdo = $conn->prepare($sql);
		$del = $pdo->execute($data);
		$conn = null;
		
		if($del) {
			header('Location: managedepartment.php');
		}
		else {
			die("Error deleting department.");
		}
	}
	
	function viewAllDeptWithSchool() {
		$conn = conn();
		$sql = "SELECT * FROM departments AS D INNER JOIN schools AS S ON D.schoolid = S.schoolid";
		$pdo = $conn->prepare($sql);
		$pdo->execute();
		$res = $pdo->fetchAll();
		$conn = null;
		
		return $res;
	}
	
	function addStud($data) {
		$conn = conn();
		$sql = "INSERT INTO students(firstname, lastname, age, gender, yearlvl, deptid)
				VALUES(?, ?, ?, ?, ?, ?)";
		$pdo = $conn->prepare($sql);
		$ins = $pdo->execute($data);
		$conn = null;
		
		if($ins) {
			header('Location: managestudent.php');
		}
		else {
			die("Error adding student.");
		}
	}
	
	function viewAllStudents() {
		$conn = conn();
		$sql = "SELECT * FROM students AS S INNER JOIN 
		departments AS D ON S.deptid = D.deptid 
		INNER JOIN schools AS C ON D.schoolid = C.schoolid";
		$pdo = $conn->prepare($sql);
		$pdo->execute();
		$res = $pdo->fetchAll();
		$conn = null;
		
		return $res;
	}
	
	function getStudent($data) {
		$conn = conn();
		$sql = "SELECT * FROM students AS S INNER JOIN 
		departments AS D ON S.deptid = D.deptid 
		INNER JOIN schools AS C ON D.schoolid = C.schoolid 
		WHERE studid=?";
		$pdo = $conn->prepare($sql);
		$pdo->execute($data);
		$res = $pdo->fetchAll();
		$conn = null;
		
		return $res;
	}
	
	function updateStud($data) {
		$conn = conn();
		$sql = "UPDATE students SET firstname=?, 
		lastname=?, age=?, gender=?, yearlvl=?, 
		deptid=? WHERE studid=?";
		$pdo = $conn->prepare($sql);
		$update = $pdo->execute($data);
		$conn = null;
		if($update) {
			header('Location: managestudent.php');
		}
		else {
			die("Error updating student.");
		}
	}
	
	function delStud($data) {
		$conn = conn();
		$sql = "DELETE FROM students WHERE studid = ?";
		$pdo = $conn->prepare($sql);
		$del = $pdo->execute($data);
		$conn = null;
		if($del) {
			header('Location: managestudent.php');
		}
		else {
			die("Error deleting student.");
		}
	}

?>
