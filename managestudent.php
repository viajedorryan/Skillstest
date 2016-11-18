<?php
	require_once("db.php");
	
	$students = viewAllStudents();
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		delStud(array($id));
	}
?>
<center>
	<h1>Manage Students</h1>
</center>
<br /><br /><br />
<a href="addstudent.php">Add Student</a> | 
<a href="index.php">Back Home</a>
<br /><br /><br />
<center>
	<table border="1px" style="width: 80%">
		<thead>
			<tr>
				<th>
					Student ID
				</th>
				<th>
					First Name
				</th>
				<th>
					Last Name
				</th>
				<th>
					Age
				</th>
				<th>
					Gender
				</th>
				<th>
					Year
				</th>
				<th>
					Department
				</th>
				<th>
					School
				</th>
				<th>
					Actions
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($students)>0) {
					foreach($students as $row) {
						$studid = $row['studid'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$age = $row['age'];
						$gender = $row['gender'];
						$yearlvl = $row['yearlvl'];
						$deptname = $row['deptname'];
						$schoolname = $row['schoolname'];
			?>
					<tr>
						<td>
							<?php echo $studid; ?>
						</td>
						<td>
							<?php echo $firstname; ?>
						</td>
						<td>
							<?php echo $lastname; ?>
						</td>
						<td>
							<?php echo $age; ?>
						</td>
						<td>
							<?php echo $gender; ?>
						</td>
						<td>
							<?php echo $yearlvl; ?>
						</td>
						<td>
							<?php echo $deptname; ?>
						</td>
						<td>
							<?php echo $schoolname; ?>
						</td>
						<td>
							<a href="updatestudent.php?id=<?php echo $studid; ?>">Update</a> | 
							<a href="managestudent.php?id=<?php echo $studid; ?>">Delete</a>
						</td>
					</tr>
			<?php
					}
				}
				else {
			?>
					<tr>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
						<td>
							No Entry
						</td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</center>
