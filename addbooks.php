<?php
	require "connect.php";

	if (isset($_POST['add'])) {
		$BOOK_ISBN = $_POST['BOOK_ISBN'];
		$BOOK_TITLE = $_POST['BOOK_TITLE'];
		$BOOK_AUTHOR = $_POST['BOOK_AUTHOR'];
		$BOOK_GENRE = $_POST['BOOK_GENRE'];
		$BOOK_EDITION = $_POST['BOOK_EDITION'];

		$sql = "INSERT INTO book (BOOK_ISBN, BOOK_TITLE, BOOK_GENRE, BOOK_AUTHOR, BOOK_EDITION) VALUES ('$BOOK_ISBN', '$BOOK_TITLE', '$BOOK_GENRE', '$BOOK_AUTHOR', '$BOOK_EDITION')";

		$result = oci_parse($connect, $sql);
		oci_execute($result);

		if ($result) {
			echo "<script>alert('Successfully Added!')</script>";
			header("Location: index.php");
		} else {
			echo "<script>alert('Failed to Add!')</script>";
			header("Location: index.php");
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
							<label class="my-2" for="BOOK_ISBN">ISBN</label>
							<input type="text" name="BOOK_ISBN" class="form-control" id="BOOK_ISBN" placeholder="Enter ISBN">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOK_TITLE">Title</label>
							<input type="text" name="BOOK_TITLE" class="form-control" id="BOOK_TITLE" placeholder="Enter Title">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOK_AUTHOR">Author</label>
							<input type="text" name="BOOK_AUTHOR" class="form-control" id="BOOK_AUTHOR" placeholder="Enter Author">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOK_GENRE">Genre</label>
							<input type="text" name="BOOK_GENRE" class="form-control" id="BOOK_GENRE" placeholder="Enter Genre">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOK_EDITION">Edition</label>
							<input type="text" name="BOOK_EDITION" class="form-control" id="BOOK_EDITION" placeholder="Enter Edition">
						</div>
						<button type="submit" name="add" class="btn btn-primary">Add</button>
						<a href="index.php" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php include 'footer.php'; ?>