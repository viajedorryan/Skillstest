<?php
	require_once("db.php");
	
	if(isset($_POST['submit'])) {
		$schoolname = $_POST['schoolname'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		
		$data = array($schoolname, $address, $telephone);
		addSchool($data);
	}
?>
<center>
	<h1>Add School</h1>
	<br /><br /><br />
</center>
<form method="post">
	School Name: <br />
	<input type="text" name="schoolname" required>
	<br /><br />
	School Addres: <br />
	<input type="text" name="address" required>
	<br /><br />
	Telephone: <br />
	<input type="number" name="telephone" required>
	<br /><br /><br />
	<input type="submit" name="submit" value="Add School">
	<br /><br /><br />
	<a href="manageschool.php">Cancel</a>
</form>
