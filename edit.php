<?php
	require "connect.php";
	$BOOK_ISBN = $_GET['BOOK_ISBN'];
	$sql_book = "SELECT * FROM BOOK WHERE BOOK_ISBN = '$BOOK_ISBN'";
	$result_book = oci_parse($connect, $sql_book);
	oci_execute($result_book);
	$row = oci_fetch_array($result_book);

	if (isset($_POST['update'])) {

		$VAR_TITLE = $_POST['BOOK_TITLE_input'];
		$VAR_GENRE = $_POST['BOOK_GENRE_input'];
		$VAR_AUTHOR = $_POST['BOOK_AUTHOR_input'];
		$VAR_EDITION = $_POST['BOOK_EDITION_input'];

		$sql_update = "UPDATE BOOK SET
			BOOK_TITLE = '$VAR_TITLE',
			BOOK_GENRE = '$VAR_GENRE',
			BOOK_AUTHOR = '$VAR_AUTHOR',
			BOOK_EDITION = '$VAR_EDITION' WHERE BOOK_ISBN = '$BOOK_ISBN'";

		$query = oci_parse($connect, $sql_update);
		$result_update = oci_execute($query, OCI_DEFAULT);
		if ($result_update) {
			oci_commit($connect);
			echo "<script>alert('Successfully Updated!')</script>";
			header("Location: index.php");
		} else {
			echo "<script>alert('Failed to Update!')</script>";
			header("Location: index.php");
		}

	}
?>

<?php include 'header.php'; ?>
	<section class="edit">
		<form action="" method="POST">
			<div class="container my-5">
				<div class="row">
					<div class="col col-md-6">
						<div class="form-group my-4">
							<label for="BOOK_TITLE">Title</label>
							<input type="text" class="form-control" name="BOOK_TITLE_input" value="<?php echo $row['BOOK_TITLE']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOK_AUTHOR">Author</label>
							<input type="text" class="form-control" name="BOOK_AUTHOR_input" value="<?php echo $row['BOOK_AUTHOR']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOK_GENRE">Genre</label>
							<input type="text" class="form-control" name="BOOK_GENRE_input" value="<?php echo $row['BOOK_GENRE']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOK_EDITION">Edition</label>
							<input type="text" class="form-control" name="BOOK_EDITION_input" value="<?php echo $row['BOOK_EDITION']; ?>">
						</div>
						<div class="form-group my-4">
							<input type="submit" class="btn btn-primary" name="update" value="Update">
							<a href="index.php" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
<?php include 'footer.php'; ?>