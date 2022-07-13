<?php
	include "header.php";
	require "connect.php";
	$query = "SELECT * FROM REPORTS";
	$result = oci_parse($connect, $query);
	oci_execute($result);
?>

<?php
if (isset($_POST['add'])) {
    $BOOK_ISBN = $_POST['BOOK_ISBN'];
    $USER_ID = $_POST['USER_ID'];
    $ISSUE_RETURN = $_POST['ISSUE_RETURN'];

    $sql = "INSERT INTO REPORTS (BOOK_ISBN, USER_ID, ISSUE_RETURN) VALUES ('$BOOK_ISBN', '$USER_ID', '$ISSUE_RETURN')";

    $result = oci_parse($connect, $sql);
    oci_execute($result);

    if ($result) {
        echo  '<script> alert("Successfully Submitted!")</script>';
        header("Location: viewReports.php");
    } else {
        echo '<script>alert("Failed to Submit!")</script>';
        header("Location: addReports.php");
    }
}
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
			<div style="text-align: center">
            <p><b>DETAILS OF BORROWER</b></p>
            </div>
				<thead>
					<tr>
						<th>BOOK_ISBN</th>
						<th>USER_ID</th>
                        <th>RETURN_DATE</td>
                        <th>DUE DATE</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['BOOK_ISBN']; ?></td>
							<td><?php echo $row['USER_ID']; ?></td>
                            <td><?php echo $row['RETURN_DATE']; ?></td>
                            <td><?php echo $row['DUE_DATE']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
    <hr>
    <div class="container">
			<div class="row">
				<div class="col col-md-6">
					<form action="" method="POST">
                    <p><b>SUBMIT NEW ISSUE</b></p>
						<div class="form-group my-4">
							<label class="my-2" for="REPORT_ID">REPORT ID</label>
							<input type="text" name="REPORT_ID" class="form-control" id="REPORT_ID" placeholder="Enter REPORT ID *REPXX*">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOK_ISBN">BOOK ISBN</label>
							<input type="text" name="BOOK_ISBN" class="form-control" id="BOOK_ISBN" placeholder="Enter ISBN">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="USER_ID">USER_ID</label>
							<input type="text" name="USER_ID" class="form-control" id="USER_ID" placeholder="Enter USER ID">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="ISSUE_RETURN">ISSUE RETURN</label>
							<input type="text" name="ISSUE_RETURN" class="form-control" id="ISSUE_RETURN" placeholder="Enter ISSUE">
						</div>
						<button type="submit" name="add" class="btn btn-primary">Submit</button>
						<a href="viewReports.php" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
<?php include 'footer.php'; ?>