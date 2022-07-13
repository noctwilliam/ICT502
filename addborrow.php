<?php
	require "connect.php";

	if (isset($_POST['add'])) {
		$BOOK_ID = $_POST['BOOK_ID'];
		$USER_ID = $_POST['USER_ID'];
		$LIBRARIAN_ID = $_POST['LIBRARIAN_ID'];
		$RESERVE_DATE = $_POST['RESERVE_DATE'];
		$RETURN_DATE = $_POST['RETURN_DATE'];
		$DUE_DATE = $_POST['DUE_DATE'];

		$sql =  "INSERT INTO BORROWED(BOOK_ID, USER_ID, LIBRARIAN_ID, RESERVE_DATE, RETURN_DATE, DUE_DATE) VALUES ('$BOOK_ID', '$USER_ID', '$LIBRARIAN_ID', TO_DATE('$RESERVE_DATE','YYYY-MM-DD'), TO_DATE('$RETURN_DATE','YYYY-MM-DD'), TO_DATE('$DUE_DATE','YYYY-MM-DD'))";

		$result = oci_parse($connect, $sql);
		oci_execute($result);

		if ($result) {
			echo "<script>alert('Successfully Added!')</script>";
			header("Location: borrow.php");
		} else {
			echo "<script>alert('Failed to Add!')</script>";
			header("Location: borrow.php");
		}
	}
?>

<?php include 'header.php'; ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col col-md-6">
					<form action="" method="POST">
                    <div class="form-group my-4">
							<label class="my-2" for="BOOK_ID">BOOK</label>
							<input type="text" name="BOOK_ID" class="form-control" id="BOOK_ID" placeholder="Enter Book ID">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="USER_ID">USER</label>
							<input type="text" name="USER_ID" class="form-control" id="USER_ID" placeholder="Enter User ID">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="LIBRARIAN_ID">LIBRARIAN</label>
							<input type="text" name="LIBRARIAN_ID" class="form-control" id="LIBRARIAN_ID" placeholder="Enter Librarian ID">
						</div>
						<div class="form-group my-4">
                    		<label class="my-2" for="RESERVE_DATE">RESERVE</label>
                    		<input type="date" name="RESERVE_DATE" class="form-control" id="RESERVE_DATE">
                		</div>
						<div class="form-group my-4">
                    		<label class="my-2" for="RETURN_DATE">RETURN</label>
                    		<input type="date" name="RETURN_DATE" class="form-control" id="RETURN_DATE">
                		</div>
						<div class="form-group my-4">
                    		<label class="my-2" for="DUE_DATE">DUEDATE</label>
                    		<input type="date" name="DUE_DATE" class="form-control" id="DUE_DATE">
                		</div>
						<button type="submit" name="add" class="btn btn-primary">Add</button>
						<a href="borrow.php" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php include 'footer.php'; ?>