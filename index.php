<?php
	require "connect.php";
	$query = "SELECT * FROM books";
	$execute = mysqli_query($connect, $query); //variable $connect is from connect.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>Dashboard</title>
</head>

<body>
	<section id="table">
		<div class="container">
		<div class="align-center my-5">
			<form class="row" action="searchbooks.php" method="POST">
				<div class="col-auto"><input type="text" class="form-control" id="search" name="searchvalue" placeholder="Search"></div>
				<div class="col-auto"><button type="submit" name="search" class="btn btn-primary">Search</button></div>
			</form>
		</div>
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
					<?php while ($row = mysqli_fetch_array($execute)) { ?>
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
		<div class="position-relative mt-5">
			<a href="addbooks.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">Add Books</a>
		</div>
	</section>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</html>