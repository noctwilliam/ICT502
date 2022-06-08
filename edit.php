<?php
	require "connect.php";
	$BOOKS_ISBN = $_GET['BOOKS_ISBN'];
	$sql = "SELECT * FROM books WHERE BOOKS_ISBN = '$BOOKS_ISBN'";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);

	if (isset($_POST['update'])){
		$BOOKS_ISBN = $_POST['BOOKS_ISBN'];
		$BOOKS_TITLE = $_POST['BOOKS_TITLE'];
		$BOOKS_AUTHOR = $_POST['BOOKS_AUTHOR'];
		$BOOKS_GENRE = $_POST['BOOKS_GENRE'];
		$BOOKS_EDITION = $_POST['BOOKS_EDITION'];

		$sql = "UPDATE books SET BOOKS_ISBN = '$BOOKS_ISBN', BOOKS_TITLE = '$BOOKS_TITLE', BOOKS_AUTHOR = '$BOOKS_AUTHOR', BOOKS_GENRE = '$BOOKS_GENRE', BOOKS_EDITION = '$BOOKS_EDITION' WHERE BOOKS_ISBN = '$BOOKS_ISBN'";

		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Successfully Updated!')</script>";
			header("Location: index.php");
		} else {
			echo "<script>alert('Failed to Update!')</script>";
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
	<script src="js/main.js"></script>
	<title>Update</title>
</head>

<body>
	<section class="edit">
		<form action="edit.php" method="POST">
			<div class="container my-5">
				<div class="row">
					<div class="col col-md-6">
						<div class="form-group my-4">
							<label for="BOOKS_ISBN">ISBN</label>
							<input type="text" class="form-control" name="BOOKS_ISBN" value="<?php echo $row['BOOKS_ISBN']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_TITLE">Title</label>
							<input type="text" class="form-control" name="BOOKS_TITLE" value="<?php echo $row['BOOKS_TITLE']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_AUTHOR">Author</label>
							<input type="text" class="form-control" name="BOOKS_AUTHOR" value="<?php echo $row['BOOKS_AUTHOR']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_GENRE">Genre</label>
							<input type="text" class="form-control" name="BOOKS_GENRE" value="<?php echo $row['BOOKS_GENRE']; ?>">
						</div>
						<div class="form-group my-4">
							<label for="BOOKS_EDITION">Edition</label>
							<input type="text" class="form-control" name="BOOKS_EDITION" value="<?php echo $row['BOOKS_EDITION']; ?>">
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
</body>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>