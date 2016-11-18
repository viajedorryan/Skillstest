<?php
	require_once("db.php");
	
	$departments = viewAllDept();
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		delDept(array($id));
	}
?>
<center>
	<h1>Manage Departments</h1>
	<br /><br /><br />
</center>
<a href="adddepartment.php">Add Department</a> |
<a href="index.php">Back Home</a>
<br /><br /><br />
<center>
	<table border="1px" style="width: 80%">
		<thead>
			<tr>
				<th>
					Deparment ID
				</th>
				<th>
					Deparment Name
				</th>
				<th>
					Dean
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
				if(count($departments)>0) {
					foreach($departments as $row) {
						$deptid = $row['deptid'];
						$deptname = $row['deptname'];
						$dean = $row['dean'];
						$schoolname = $row['schoolname'];
			?>
						<tr>
							<td>
								<?php echo $deptid; ?>
							</td>
							<td>
								<?php echo $deptname; ?>
							</td>
							<td>
								<?php echo $dean; ?>
							</td>
							<td>
								<?php echo $schoolname; ?>
							</td>
							<td>
								<a href="updatedepartment.php?id=<?php echo $deptid; ?>">Update</a> | 
								<a href="managedepartment.php?id=<?php echo $deptid; ?>">Delete</a>
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
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</center>
