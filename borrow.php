<?php

	require "connect.php";
	$query = "SELECT * FROM BORROWED";
	$result = oci_parse($connect, $query);
	oci_execute($result);
?>

<?php include "header.php"; ?>
	<section id="table">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">View User</a>
	</li>
	<li class="nav-item">
        <a class="nav-link" href="borrow.php">Borrowed Books</a>
	</li><li class="nav-item">
        <a class="nav-link" href="#">Report</a>
	</li>
	
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log Out</a>
	</li>
    </ul>
  </div>
</nav>
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
                        <th>USER ID</th>
						<th>BOOK ID</th>
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
                            <td><?php echo $row['BOOK_ID']; ?></td>
							<td><?php echo $row['USER_ID']; ?></td>
							<td><?php echo $row['LIBRARIAN_ID']; ?></td>
							<td><?php echo $row['RESERVE_DATE']; ?></td>
							<td><?php echo $row['RETURN_DATE']; ?></td>
							<td><?php echo $row['DUE_DATE']; ?></td>
							<td>
								<a class="btn btn-primary" href="editborrow.php?BOOK_ID=<?php echo $row['BOOK_ID']; ?>">Edit</a>
								<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');" href="deleteborrow.php?BOOK_ID=<?php echo $row['BOOK_ID']; ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="position-relative mt-5">
			<a href="addborrow.php" class="btn btn-primary position-absolute top-50 start-50 translate-middle">New Borrow</a>
		</div>
	</section>
<?php include 'footer.php'; ?>