<?php
	require "connect.php";
	$BOOKS_ISBN = $_GET['BOOKS_ISBN'];
	$sql_book = "SELECT * FROM BOOKS WHERE BOOKS_ISBN = '$BOOKS_ISBN'";
	$result_book = oci_parse($connect, $sql_book);
	oci_execute($result_book);
	$row = oci_fetch_array($result_book);

	if (isset($_POST['update'])) {

		$VAR_ISBN = $_POST['BOOKS_ISBN_input'];
		$VAR_TITLE = $_POST['BOOKS_TITLE_input'];
		$VAR_GENRE = $_POST['BOOKS_GENRE_input'];
		$VAR_AUTHOR = $_POST['BOOKS_AUTHOR_input'];
		$VAR_EDITION = $_POST['BOOKS_EDITION_input'];

		$sql_update = "UPDATE BOOKS SET
			BOOKS_ISBN = '$VAR_ISBN',
			BOOKS_TITLE = '$VAR_TITLE',
			BOOKS_GENRE = '$VAR_GENRE',
			BOOKS_AUTHOR = '$VAR_AUTHOR',
			BOOKS_EDITION = '$VAR_EDITION' WHERE BOOKS_ISBN = '$BOOKS_ISBN'";

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
							<label for="BOOKS_ISBN">ISBN</label>
							<input type="text" class="form-control" name="BOOKS_ISBN_input" value="<?php echo $row['BOOKS_ISBN']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_TITLE">Title</label>
							<input type="text" class="form-control" name="BOOKS_TITLE_input" value="<?php echo $row['BOOKS_TITLE']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_AUTHOR">Author</label>
							<input type="text" class="form-control" name="BOOKS_AUTHOR_input" value="<?php echo $row['BOOKS_AUTHOR']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_GENRE">Genre</label>
							<input type="text" class="form-control" name="BOOKS_GENRE_input" value="<?php echo $row['BOOKS_GENRE']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_EDITION">Edition</label>
							<input type="text" class="form-control" name="BOOKS_EDITION_input" value="<?php echo $row['BOOKS_EDITION']; ?>">
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