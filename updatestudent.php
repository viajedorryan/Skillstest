<center>
	<h1>Add Student</h1>
</center>
<br /><br /><br >
<?php
	require_once("db.php");
	
	$departments = viewAllDeptWithSchool();
	
	if(isset($_POST['submit'])) {
		$studid = $_POST['studid'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$yearlvl = $_POST['yearlvl'];
		$deptid = $_POST['deptid'];
		
		$data = array($firstname, $lastname, $age, $gender, $yearlvl, $deptid, $studid);
		updateStud($data);
	}
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$student = getStudent(array($id));
		if(count($student)>0) {
			foreach($student as $row) {
				$studid = $row['studid'];
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$age = $row['age'];
				$gender = $row['gender'];
				$yearlvl = $row['yearlvl'];
				$deptid = $row['deptid'];
?>
		<form method="post">
			Student ID: <br />
			<input type="number" name="studid" value="<?php echo $studid; ?>" required readonly>
			<br /><br />
			First Name: <br />
			<input type="text" name="firstname" value="<?php echo $firstname; ?>" required>
			<br /><br />
			Last Name: <br />
			<input type="text" name="lastname" value="<?php echo $lastname; ?>" required>
			<br /><br />
			Age: <br />
			<input type="number" name="age" value="<?php echo $age; ?>" required>
			<br /><br />
			Gender: 
			<input type="radio" name="gender" value="Male" id="male"
				<?php
					if($gender == "Male") {
						echo "checked";
					}
				?>
			>
			<label for="male">Male</label>
			<input type="radio" name="gender" value="Female" id="female"
				<?php
					if($gender == "Female") {
						echo "checked";
					}
				?>
			>
			<label for="female">Female</label>
			<br /><br />
			Year: <br />
			<select name="yearlvl" required>
				<option value="">---Select Year---</option>
				<?php
					for($i = 1; $i<6; $i++) {
				?>
						<option value="<?php echo $i; ?>"
							<?php
								if($yearlvl == $i) {
									echo "selected";
								}
							?>
						><?php echo $i; ?></option>
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
							$id = $row['deptid'];
							$deptname = $row['deptname'];
							$schoolname = $row['schoolname'];
				?>
							<option value="<?php echo $id; ?>"
								<?php
									if($deptid == $id) {
										echo "selected";
									}
								?>
							><?php echo $deptname. " (" .$schoolname. ")" ?></option>
				<?php
						}
					}
				?>
			</select>
			<br /><br />
			<input type="submit" name="submit" value="Update Student">
			<br /><br /><br />
			<a href="managestudent.php">Cancel</a>
		</form>
<?php
			}
		}
	}
	else {
		echo "Nothing to show.";
?>
		<a href="managestudent.php">Back</a>
<?php
	}
?>
