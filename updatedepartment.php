<?php
	require_once("db.php");
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$department = getDept(array($id));
	}
	else {
		$department = null;
	}
	
	$schools = viewAllSchools();
	
	if(isset($_POST['submit'])) {
		$deptid = $_POST['deptid'];
		$deptname = $_POST['deptname'];
		$dean = $_POST['dean'];
		$schoolid = $_POST['schoolid'];
		
		$data = array($deptname, $dean, $schoolid, $deptid);
		updateDept($data);
	}
	
?>
<center>
	<h1>Add Department</h1>
</center>
<br /><br /><br />
	<?php
		if(count($department)>0) {
			foreach($department as $row) {
				$deptid = $row['deptid'];
				$deptname = $row['deptname'];
				$dean = $row['dean'];
				$schoolid = $row['schoolid'];
				$schoolname = $row['schoolname'];
	?>
			<form method="post">
				Department ID: <br />
				<input type="number" name="deptid" value="<?php echo $deptid; ?>" required>
				<br /><br />
				Department Name: <br />
				<input type="text" name="deptname" value="<?php echo $deptname; ?>" required>
				<br /><br />
				Dean: <br />
				<input type="text" name="dean" value="<?php echo $dean; ?>" required>
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
								<option value="<?php echo $id; ?>"
									<?php
										if($id == $schoolid) {
											echo "selected";
										}
									?>
								><?php echo $name; ?></option>
					<?php
							}
							
						}
					?>
				</select>
				<br /><br />
				<input type="submit" name="submit" value="Update Department">
				<br /><br /><br />
				<a href="managedepartment.php">Cancel</a>
			</form>
	<?php
			}
		}
		else {
			echo "Nothing to show.";
	?>
		<a href="managedepartment.php">Back</a>
	<?php
		}
	?>

