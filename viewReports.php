<?php

	require "connect.php";
	$query = "SELECT * FROM REPORTS";
	$result = oci_parse($connect, $query);
	oci_execute($result);
?>

<?php include "header.php"; ?>
	<section id="table">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
	</li>
	</li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log Out</a>
	</li>
    </ul>
  </div>
</nav>
		<div class="container">
			<table class="table table-striped">
				<thead>
				<div style="text-align: center">
                <p><b>REPORTS OF BORROWER</b></p>
</div>
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
			<div style="text-align: center">
			<a href="addReports.php" class="btn btn-warning">Add Issue</a>
					</div>
		</div>
	</section>
<?php include 'footer.php'; ?>