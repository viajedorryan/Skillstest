<center>
	<h1>Update School</h1>
	<br /><br /><br />
</center>
<?php
	require_once("db.php");
	
	if(isset($_POST['submit'])) {
		$schoolid = $_POST['schoolid'];
		$schoolname = $_POST['schoolname'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		
		$data = array($schoolname, $address, $telephone, $schoolid);
		updateSchool($data);
	}
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$school = getSchool(array($id));
		if(count($school)>0) {
			foreach($school as $row) {
				$schoolid = $row['schoolid'];
				$schoolname = $row['schoolname'];
				$address = $row['address'];
				$telephone = $row['telephone'];
	?>
		<form method="post">
			School ID: <br />
			<input type="number" name="schoolid" value="<?php echo $schoolid; ?>" required readonly>
			<br /><br />
			School Name: <br />
			<input type="text" name="schoolname" value="<?php echo $schoolname; ?>" required>
			<br /><br />
			School Addres: <br />
			<input type="text" name="address" value="<?php echo $address; ?>" required>
			<br /><br />
			Telephone: <br />
			<input type="number" name="telephone" value="<?php echo $telephone; ?>" required>
			<br /><br /><br />
			<input type="submit" name="submit" value="Update School">
			<br /><br /><br />
			<a href="manageschool.php">Cancel</a>
		</form>
	<?php
			}
		}
	}
	else {
		echo "Nothing to show.";
	?>
		<a href="manageschool.php">Back</a>
	<?php
	}
	
?>

