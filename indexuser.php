<?php

	require "connect.php";
	$query = "SELECT * FROM USERS";
	$result = oci_parse($connect, $query);
	oci_execute($result);
?>

<?php include "header.php"; ?>


<section id="table">
	<div class="container">
	<div class="align-center my-5">
			<form class="row" action="searchuser.php" method="POST">
				<div class="col-auto"><input type="text" class="form-control" id="search" name="searchvalue" placeholder="Search user"></div>
				<div class="col-auto"><button type="submit" name="search" class="btn btn-primary">Search</button></div>
			</form>
	</div>

	<h2 class="form-title">User List</h2>
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
								<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');" href="deleteuser.php?USER_ID=<?php echo $row['USER_ID']; ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
	</table>
    </div>

		<!-- <div class="position-relative mt-5"> -->
			<!-- <a href="adduser.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">Add Users</a> -->
		<!-- </div> -->
</section>
					

<?php include 'footer.php'; ?>