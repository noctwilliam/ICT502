<?php
	require "connect.php";
	if (isset($_POST['search'])) {
		$search = $_POST['searchvalue'];
		$sql = "SELECT * FROM books WHERE BOOKS_ISBN LIKE '%$search%'
		OR BOOKS_TITLE LIKE '%$search%'
		OR BOOKS_AUTHOR LIKE '%$search%'
		OR BOOKS_GENRE LIKE '%$search%'
		OR BOOKS_EDITION LIKE '%$search%'";
		$result = mysqli_query($connect, $sql);
		$count = mysqli_num_rows($result);
		if ($count == 0) {
			echo "<script>alert('No results found!')</script>";
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
	<title>Search Results</title>
</head>

<body>
	<section id="searchtable">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ISBN</th>
						<th>TITLE</th>
						<th>AUTHOR</th>
						<th>GENRE</th>
						<th>EDITION</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['BOOKS_ISBN']; ?></td>
							<td><?php echo $row['BOOKS_TITLE']; ?></td>
							<td><?php echo $row['BOOKS_AUTHOR']; ?></td>
							<td><?php echo $row['BOOKS_GENRE']; ?></td>
							<td><?php echo $row['BOOKS_EDITION']; ?></td>
							<td>
								<a class="btn btn-primary" onclick="confirmUpdate()" href="edit.php?BOOKS_ISBN=<?php echo $row['BOOKS_ISBN']; ?>">Edit</a>
								<a class="btn btn-danger" onclick="confirmDelete()" href="delete.php?BOOKS_ISBN=<?php echo $row['BOOKS_ISBN']; ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="position-relative mt-5 align-center">
			<a href="index.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">Back to Dashboard</a>
		</div>
	</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</html>