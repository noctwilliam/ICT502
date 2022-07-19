<?php
	require "connect.php";
	$query = "SELECT * FROM BORROWED";
	$result = oci_parse($connect, $query);
	oci_execute($result);
?>

<?php include "header.php"; ?>
	<section id="table">
		<div class="container">
			<div class="align-center my-5">
				<form class="row" action="searchborrow.php" method="POST">
					<div class="col-auto"><input type="text" class="form-control" id="search" name="searchvalue" placeholder="Search"></div>
					<div class="col-auto"><button type="submit" name="search" class="btn btn-primary">Search</button></div>
				</form>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>BOOK ISBN</th>
						<th>USER ID</th>
						<th>LIBRARIAN ID</th>
						<th>RESERVE</th>
						<th>RETURN</th>
						<th>DUEDATE</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php while ($row = oci_fetch_array($result)) { ?>
						<tr>
                            <td><?php
								$book_row = $row['BOOK_ISBN'];
								$book_sql = "SELECT * FROM BOOK WHERE BOOK_ISBN = '$book_row'";
								$book_result = oci_parse($connect, $book_sql);
								oci_execute($book_result);
								$book_row = oci_fetch_array($book_result);
								echo $book_row['BOOK_TITLE'];
							?></td>
							<td><?php
								$user_row = $row['USER_ID'];
								$user_sql = "SELECT * FROM USERS WHERE USER_ID = '$user_row'";
								$user_result = oci_parse($connect, $user_sql);
								oci_execute($user_result);
								$user_data = oci_fetch_array($user_result);
								echo $user_data['USER_NAME'];
							?></td>
							<td><?php 
								$librarian_row = $row['LIBRARIAN_ID'];
								$librarian_sql = "SELECT * FROM LIBRARIAN WHERE LIBRARIAN_ID = '$librarian_row'";
								$librarian_result = oci_parse($connect, $librarian_sql);
								oci_execute($librarian_result);
								$librarian_data = oci_fetch_array($librarian_result);
								echo $librarian_data['LIBRARIAN_NAME'];
							?></td>
							<td><?php echo $row['RESERVE_DATE']; ?></td>
							<td><?php echo $row['RETURN_DATE']; ?></td>
							<td><?php echo $row['DUE_DATE']; ?></td>
							<td>
								<a class="btn btn-primary" href="editborrow.php?BOOK_ISBN=<?php echo $row['BOOK_ISBN']; ?>">Edit</a>
								<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');" href="deleteborrow.php?BOOK_ISBN=<?php echo $row['BOOK_ISBN']; ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="position-relative mt-5">
			<a href="addborrow.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">New Borrower</a>
		</div>
	</section>
<?php include 'footer.php'; ?>