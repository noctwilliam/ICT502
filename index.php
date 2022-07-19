<?php
	include "header.php";
	if (isset($_SESSION['LIBRARIAN_PASS'])) {
		$query = "SELECT * FROM BOOK";
		$result = oci_parse($connect, $query);
		oci_execute($result);
?>

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
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['BOOK_ISBN']; ?></td>
							<td><?php echo $row['BOOK_TITLE']; ?></td>
							<td><?php echo $row['BOOK_AUTHOR']; ?></td>
							<td><?php echo $row['BOOK_GENRE']; ?></td>
							<td><?php echo $row['BOOK_EDITION']; ?></td>
							<td>
								<a class="btn btn-primary" href="edit.php?BOOK_ISBN=<?php echo $row['BOOK_ISBN']; ?>">Edit</a>
								<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');" href="delete.php?BOOK_ISBN=<?php echo $row['BOOK_ISBN']; ?>">Delete</a>
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

<?php
	} else {
		header("Location: login.php");
	}
	include "footer.php";
?>