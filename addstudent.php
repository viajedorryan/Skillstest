<?php
	require_once("db.php");
	
	$departments = viewAllDeptWithSchool();
	
	if(isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$yearlvl = $_POST['yearlvl'];
		$deptid = $_POST['deptid'];
		
		$data = array($firstname, $lastname, $age, $gender, $yearlvl, $deptid);
		addStud($data);
	}
?>
<center>
	<h1>Add Student</h1>
</center>
<br /><br /><br >
<form method="post">
	First Name: <br />
	<input type="text" name="firstname" required>
	<br /><br />
	Last Name: <br />
	<input type="text" name="lastname" required>
	<br /><br />
	Age: <br />
	<input type="number" name="age" required>
	<br /><br />
	Gender: 
	<input type="radio" name="gender" value="Male" id="male">
	<label for="male">Male</label>
	<input type="radio" name="gender" value="Female" id="female">
	<label for="female">Female</label>
	<br /><br />
	Year: <br />
	<select name="yearlvl" required>
		<option value="">---Select Year---</option>
		<?php
			for($i = 1; $i<6; $i++) {
		?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php
			}
		?>
	</select>
	<br /><br />
	Department: <br />
	<select name="deptid" required>
		<option value="">---Select Department---</option>
		<?php
			if(count($departments)>0) {
				foreach($departments as $row) {
					$deptid = $row['deptid'];
					$deptname = $row['deptname'];
					$schoolname = $row['schoolname'];
		?>
					<option value="<?php echo $deptid; ?>"><?php echo $deptname. " (" .$schoolname. ")" ?></option>
		<?php
				}
			}
		?>
	</select>
	<br /><br />
	<input type="submit" name="submit" value="Add Student">
	<br /><br /><br />
	<a href="managestudent.php">Cancel</a>
</form>
