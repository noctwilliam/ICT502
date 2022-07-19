<?php
	require "connect.php";
	if (isset($_POST['search'])) {
		$search = $_POST['searchvalue'];
		$sql = "SELECT * FROM users WHERE LOWER(USER_ID) LIKE LOWER('%$search%')
		OR LOWER(USER_EMAIL) LIKE LOWER('%$search%')
		OR LOWER(USER_NAME) LIKE LOWER('%$search%')
		OR LOWER(USER_PHONENO) LIKE LOWER('%$search%')
		OR LOWER(USER_ADDRESS) LIKE LOWER('%$search%')";

		$result = oci_parse($connect, $sql);
		oci_execute($result);
		$count = oci_num_fields($result);

		if ($count == FALSE) {
			echo "<script>alert('No results found!')</script>";
			header("Location: indexuser.php");
		}
	}
?>

<?php include 'header.php'; ?>
<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
	<section id="searchtable">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
                        <th>USER ID</th>
						<th>EMAIL</th>
						<th>NAME</th>
						<th>PHONE NO</th>
						<th>ADDRESS</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['USER_ID']; ?></td>
							<td><?php echo $row['USER_EMAIL']; ?></td>
							<td><?php echo $row['USER_NAME']; ?></td>
							<td><?php echo $row['USER_PHONENO']; ?></td>
							<td><?php echo $row['USER_ADDRESS']; ?></td>
							<td>
								<a class="btn btn-primary" href="edituser.php?USER_ID=<?php echo $row['USER_ID']; ?>">Edit</a>
								<a class="btn btn-danger" onclick="confirmDelete()" href="deleteuser.php?USER_ID=<?php echo $row['USER_ID']; ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="position-relative mt-5 align-center">
			<a href="indexuser.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">Back to Dashboard</a>
		</div>
	</section>
<?php include 'footer.php'; ?>