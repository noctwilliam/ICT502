<?php
include 'header.php';
$REPORT_ID = $_GET['REPORT_ID'];
$sql = "SELECT * FROM REPORTS WHERE REPORT_ID = '$REPORT_ID'";
$result_issue = oci_parse($connect, $sql);
oci_execute($result_issue);
$data_issues = oci_fetch_array($result_issue);
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Edit Report</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form method="GET">
				<div class="form-group" class="edit-form">
					<p class="my-2">BOOK TITLE</p>
					<label for="BOOK_ISBN"></label>
					<select name="BOOK_ISBN" class="form-control">
						<?php
						$books_query = "SELECT * FROM BOOK";
						$books_result = oci_parse($connect, $books_query);
						oci_execute($books_result);
						while ($data = oci_fetch_array($books_result)) { ?>
							<option value="<?php echo $data['BOOK_ISBN']; ?>"><?php echo $data['BOOK_TITLE']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<p>USER NAME</p>
					<label for="USER_ID"></label>
					<select name="USER_ID" class="form-control">
						<?php
						$users_query = "SELECT * FROM USERS";
						$users_result = oci_parse($connect, $users_query);
						oci_execute($users_result);
						while ($data = oci_fetch_array($users_result)) { ?>
							<option value="<?php echo $data['USER_ID']; ?>"><?php echo $data['USER_NAME']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="ISSUE_RETURN"></label>
					<input type="text" name="ISSUE_RETURN" class="form-control" id="ISSUE_RETURN" placeholder="Enter ISSUE" value="<?php echo $data_issues['ISSUE_RETURN']; ?>" autocomplete="off=">
				</div>
				<a href="viewReports.php" class="btn btn-warning mx-1">Back to Reports</a>
				<button type="submit" class="btn btn-primary mx-1">Submit</button>
			</form>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>