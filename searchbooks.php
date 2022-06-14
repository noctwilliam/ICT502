<?php
	require "connect.php";
	if (isset($_POST['search'])) {
		$search = $_POST['searchvalue'];
		$sql = "SELECT * FROM books WHERE LOWER(BOOKS_ISBN) LIKE LOWER('%$search%')
		OR LOWER(BOOKS_TITLE) LIKE LOWER('%$search%')
		OR LOWER(BOOKS_AUTHOR) LIKE LOWER('%$search%')
		OR LOWER(BOOKS_GENRE) LIKE LOWER('%$search%')
		OR LOWER(BOOKS_EDITION) LIKE LOWER('%$search%')";
		$result = oci_parse($connect, $sql);
		oci_execute($result);
		$count = oci_num_fields($result);
		if ($count == FALSE) {
			echo "<script>alert('No results found!')</script>";
			header("Location: index.php");
		}
	}
?>

<?php include 'header.php'; ?>
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
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['BOOKS_ISBN']; ?></td>
							<td><?php echo $row['BOOKS_TITLE']; ?></td>
							<td><?php echo $row['BOOKS_AUTHOR']; ?></td>
							<td><?php echo $row['BOOKS_GENRE']; ?></td>
							<td><?php echo $row['BOOKS_EDITION']; ?></td>
							<td>
								<a class="btn btn-primary" href="edit.php?BOOKS_ISBN=<?php echo $row['BOOKS_ISBN']; ?>">Edit</a>
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
<?php include 'footer.php'; ?>