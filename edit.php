
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
<div class="main">
	<section class="signup">
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Edit Book Details</h2>
					<form method="POST" class="register-form" id="register-form">
						<div class="form-group">
							<label for="title"><i class="zmdi zmdi-book"></i></label>
							<input type="title" name="BOOK_TITLE_input" id="title"  placeholder="Title" value="<?php echo $row['BOOK_TITLE']; ?>"/>
						</div>
						<div class="form-group">
							<label for="author"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="author" name="BOOK_AUTHOR_input" id="author"  placeholder="Author" value="<?php echo $row['BOOK_AUTHOR']; ?>"/>
						</div>
						<div class="form-group">
							<label for="genre"><i class="zmdi zmdi-graduation-cap"></i></label>
							<input type="genre" name="BOOK_GENRE_input" id="genre" placeholder="Genre" value="<?php echo $row['BOOK_GENRE']; ?>"/>
						</div>
						<div class="form-group">
							<label for="edition"><i class="zmdi zmdi-calendar"></i></label>
							<input type="edition" name="BOOK_EDITION_input" id="edition" placeholder="Edition" value="<?php echo $row['BOOK_EDITION']; ?>"/>
						</div>
						<div class="form-group my-4">
							<input type="submit" class="btn btn-primary" name="update" value="Update">
							<a href="index.php" class="btn btn-danger">Cancel</a>
						</div>
					</form>
				</div>
				<div class="signup-image">
					<figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include 'footer.php'; ?>