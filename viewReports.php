<?php
	include "header.php";
	require "connect.php";
	$query = "SELECT * FROM REPORTS";
	$result = oci_parse($connect, $query);
	oci_execute($result);
?>

	<section id="table">
		<div class="container">
			<table class="table table-striped">
				<thead>
				<div style="text-align: center">
                <p><b>REPORTS OF BORROWER</b></p>
					<tr>
						<th>REPORT_ID</th>
						<th>BOOK TITLE</th>
						<th>USER</th>
						<th>ISSUE</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['REPORT_ID']; ?></td>
							<td><?php 
								// echo $row['BOOK_ISBN']; 
								$book_title = "SELECT BOOK_TITLE FROM BOOK WHERE BOOK_ISBN = '".$row['BOOK_ISBN']."'";
								$book_title_result = oci_parse($connect, $book_title);
								oci_execute($book_title_result);
								$book_title_row = oci_fetch_array($book_title_result);
								echo $book_title_row['BOOK_TITLE'];
								?></td>
							<td><?php
								// echo $row['USER_ID'];
								$user_name = "SELECT USER_NAME FROM USERS WHERE USER_ID = '".$row['USER_ID']."'";
								$user_name_result = oci_parse($connect, $user_name);
								oci_execute($user_name_result);
								$user_name_row = oci_fetch_array($user_name_result);
								echo $user_name_row['USER_NAME'];
								?></td>
							<td><?php echo $row['ISSUE_RETURN']; ?></td>
							<td>
								<a class="btn btn-primary" href="editreport.php?REPORT_ID=<?php echo $row['REPORT_ID']; ?>">Edit</a>
								<a href="deletereport.php?REPORT_ID=<?php echo $row['REPORT_ID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this report?')">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="position-absolute top-50 start-50 translate-middle">
				<a href="addReports.php" class="btn btn-warning">Add Issue</a>
			</div>
		</div>
	</section>
<?php include 'footer.php'; ?>