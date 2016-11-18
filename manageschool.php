<?php
	require_once("db.php");
	
	$schools = viewAllSchools();
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		
		delSchool(array($id));
	}
?>
<center>
	<h1>Manage Schools</h1>
</center>
<br /><br /><br />
<a href="addschool.php">Add School</a> | 
<a href="index.php">Back Home</a>
<br /><br /><br />
<center>
	<table border="1px" style="width:80%">
		<thead>
			<tr>
				<th>
					School ID
				</th>
				<th>
					School Name
				</th>
				<th>
					School Address
				</th>
				<th>
					Telephone Number
				</th>
				<th>
					Actions
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($schools)>0) {
					foreach($schools as $row) {
						$schoolid = $row['schoolid'];
						$schoolname = $row['schoolname'];
						$address = $row['address'];
						$telephone = $row['telephone'];
			?>
				<tr>
					<td>
						<?php echo $schoolid; ?>
					</td>
					<td>
						<?php echo $schoolname; ?>
					</td>
					<td>
						<?php echo $address; ?>
					</td>
					<td>
						<?php echo $telephone; ?>
					</td>
					<td>
						<a href="updateschool.php?id=<?php echo $schoolid; ?>">Update</a> | 
						<a href="manageschool.php?id=<?php echo $schoolid; ?>">Delete</a>
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
