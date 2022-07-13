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
						<th>BOOK_ISBN</th>
						<th>USER_ID</th>
						<th>ISSUE_RETURN</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['REPORT_ID']; ?></td>
							<td><?php echo $row['BOOK_ISBN']; ?></td>
							<td><?php echo $row['USER_ID']; ?></td>
							<td><?php echo $row['ISSUE_RETURN']; ?></td>
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