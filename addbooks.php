<?php
	require "connect.php";

	if (isset($_POST['add'])) {
		$BOOK_TITLE = $_POST['BOOK_TITLE'];
		$BOOK_AUTHOR = $_POST['BOOK_AUTHOR'];
		$BOOK_GENRE = $_POST['BOOK_GENRE'];
		$BOOK_EDITION = $_POST['BOOK_EDITION'];

		$sql = "INSERT INTO book (BOOK_TITLE, BOOK_GENRE, BOOK_AUTHOR, BOOK_EDITION) VALUES ('$BOOK_TITLE', '$BOOK_GENRE', '$BOOK_AUTHOR', '$BOOK_EDITION')";

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
<div class="main">
	<section class="signup">
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Add Book</h2>
					<form method="POST" class="register-form" id="register-form">
						<div class="form-group">
							<label for="title"><i class="zmdi zmdi-book"></i></label>
							<input type="title" name="BOOK_TITLE" id="BOOK_TITLE"  placeholder="Title" />
						</div>
						<div class="form-group">
							<label for="author"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="author" name="BOOK_AUTHOR" id="BOOK_AUTHOR"  placeholder="Author" />
						</div>
						<div class="form-group">
							<label for="genre"><i class="zmdi zmdi-graduation-cap"></i></label>
							<input type="genre" name="BOOK_GENRE" id="BOOK_GENRE" placeholder="Genre"/>
						</div>
						<div class="form-group">
							<label for="edition"><i class="zmdi zmdi-calendar"></i></label>
							<input type="edition" name="BOOK_EDITION" id="BOOK_EDITION" placeholder="Edition" />
						</div>
						<div class="form-group my-4">
						<button type="submit" name="add" class="btn btn-primary">Add</button>
						<a href="index.php" class="btn btn-warning">Back</a>
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