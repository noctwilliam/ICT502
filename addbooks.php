<?php
	require "connect.php";

	if (isset($_POST['add'])) {
		$BOOKS_ISBN = $_POST['BOOKS_ISBN'];
		$BOOKS_TITLE = $_POST['BOOKS_TITLE'];
		$BOOKS_AUTHOR = $_POST['BOOKS_AUTHOR'];
		$BOOKS_GENRE = $_POST['BOOKS_GENRE'];
		$BOOKS_EDITION = $_POST['BOOKS_EDITION'];

		$sql = "INSERT INTO books (BOOKS_ISBN, BOOKS_TITLE, BOOKS_GENRE, BOOKS_AUTHOR, BOOKS_EDITION) VALUES ('$BOOKS_ISBN', '$BOOKS_TITLE', '$BOOKS_GENRE', '$BOOKS_AUTHOR', '$BOOKS_EDITION')";

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

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>New Books</title>
</head>

<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col col-md-6">
					<form action="addbooks.php" method="POST">
						<div class="form-group my-4">
							<label class="my-2" for="BOOKS_ISBN">ISBN</label>
							<input type="text" name="BOOKS_ISBN" class="form-control" id="BOOKS_ISBN" placeholder="Enter ISBN">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOKS_TITLE">Title</label>
							<input type="text" name="BOOKS_TITLE" class="form-control" id="BOOKS_TITLE" placeholder="Enter Title">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOKS_AUTHOR">Author</label>
							<input type="text" name="BOOKS_AUTHOR" class="form-control" id="BOOKS_AUTHOR" placeholder="Enter Author">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOKS_GENRE">Genre</label>
							<input type="text" name="BOOKS_GENRE" class="form-control" id="BOOKS_GENRE" placeholder="Enter Genre">
						</div>
						<div class="form-group my-4">
							<label class="my-2" for="BOOKS_EDITION">Edition</label>
							<input type="text" name="BOOKS_EDITION" class="form-control" id="BOOKS_EDITION" placeholder="Enter Edition">
						</div>
						<button type="submit" name="add" class="btn btn-primary">Add</button>
						<a href="index.php" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</html>