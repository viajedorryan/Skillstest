<?php
	require_once("db.php");
	
	$schools = viewAllSchools();
	if(isset($_POST['submit'])) {
		$deptname = $_POST['deptname'];
		$dean = $_POST['dean'];
		$schoolid = $_POST['schoolid'];
		
		$data = array($deptname, $dean, $schoolid);
		addDept($data);
	}
?>
<center>
	<h1>Add Department</h1>
</center>
<br /><br /><br />
<form method="post">
	Department Name: <br />
	<input type="text" name="deptname" required>
	<br /><br />
	Dean: <br />
	<input type="text" name="dean" required>
	<br /><br />
	School ID: <br />
	<select name="schoolid" required>
		<option value="">---Select School---</option>
		<?php
			if(count($schools)>0) {
				foreach($schools as $row) {
					$id = $row['schoolid'];
					$name = $row['schoolname'];
		?>
					<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
		<?php
				}
				
			}
		?>
	</select>
	<br /><br />
	<input type="submit" name="submit" value="Add Department">
	<br /><br /><br />
	<a href="managedepartment.php">Cancel</a>
</form>
