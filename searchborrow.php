<?php
	require "connect.php";
	if (isset($_POST['search'])) {
		$search = $_POST['searchvalue'];
		$sql = "SELECT * FROM BORROWED WHERE LOWER(BOOK_ID) LIKE LOWER('%$search%')
		OR LOWER(USER_ID) LIKE LOWER('%$search%')
		OR LOWER(LIBRARIAN_ID) LIKE LOWER('%$search%')
		OR LOWER(RESERVE_DATE) LIKE LOWER('%$search%')
		OR LOWER(RETURN_DATE) LIKE LOWER('%$search%')
		OR LOWER(DUE_DATE) LIKE LOWER('%$search%')";

		$result = oci_parse($connect, $sql);
		oci_execute($result);
		$count = oci_num_fields($result);

		if ($count == FALSE) {
			echo "<script>alert('No results found!')</script>";
			header("Location: borrow.php");
		}
	}
?>

<?php include 'header.php'; ?>
	<section id="searchtable">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
                        <th>BOOK</th>
						<th>USER</th>
						<th>LIBRARIAN</th>
						<th>PINJAM</th>
						<th>HANTAR</th>
						<th>DUE DATE</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
                            <td><?php echo $row['BOOK_ID']; ?></td>
							<td><?php echo $row['USER_ID']; ?></td>
							<td><?php echo $row['LIBRARIAN_ID']; ?></td>
							<td><?php echo $row['RESERVE_DATE']; ?></td>
							<td><?php echo $row['RETURN_DATE']; ?></td>
							<td><?php echo $row['DUE_DATE']; ?></td>
							<td>
								<a class="btn btn-primary" href="editborrow.php?BOOK_ID=<?php echo $row['BOOK_ID']; ?>">Edit</a>
								<a class="btn btn-danger" onclick="confirmDelete()" href="deleteborrow.php?BOOK_ID=<?php echo $row['BOOK_ID']; ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="position-relative mt-5 align-center">
			<a href="borrow.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">Back to Dashboard</a>
		</div>
	</section>
<?php include 'footer.php'; ?>