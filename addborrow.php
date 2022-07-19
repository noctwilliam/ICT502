<?php
	require "connect.php";

	if (isset($_POST['add'])) {
		$BOOK_ISBN = $_POST['BOOK_ISBN'];
		$USER_ID = $_POST['USER_ID'];
		$LIBRARIAN_ID = $_POST['LIBRARIAN_ID'];
		$RESERVE_DATE = $_POST['RESERVE_DATE'];
		$RETURN_DATE = $_POST['RETURN_DATE'];
		$DUE_DATE = $_POST['DUE_DATE'];

		$sql = "INSERT INTO BORROWED (BOOK_ISBN, USER_ID, LIBRARIAN_ID, RESERVE_DATE, RETURN_DATE, DUE_DATE) VALUES ('$BOOK_ISBN', '$USER_ID', '$LIBRARIAN_ID', TO_DATE('$RESERVE_DATE','YYYY-MM-DD'), TO_DATE('$RETURN_DATE','YYYY-MM-DD'), TO_DATE('$DUE_DATE','YYYY-MM-DD'))";

		$result = oci_parse($connect, $sql);
		oci_execute($result);

		if ($result) {
			echo "<script>alert('Successfully Added!')</script>";
			header("Location: borrow.php");
		} else {
			echo "<script>alert('Failed to Add!')</script>";
			header("Location: borrow.php");
		}
	}
?>

<?php include 'header.php'; ?>
<div class="main">
	<section class="signup">
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Add Borrower</h2>
					<form method="POST" class="register-form" id="register-form">
						<div class="form-group">
							<label for="BOOK ISBN" ></label>
							<select name="BOOK_ISBN" id="BOOK_ISBN" class="form-control">
								<?php
									$book_sql = "SELECT * FROM BOOK";
									$book_result = oci_parse($connect, $book_sql);
									oci_execute($book_result);
									while ($row_book = oci_fetch_array($book_result)) { ?>
										<option value="<?php echo $row_book['BOOK_ISBN']; ?>" ><?php echo $row_book['BOOK_TITLE']; ?></option>
									<?php } ?>
							</select>
						</div>
						<div class="form-group my-4">
							<label for="USER_ID"></label>
							<select name="USER_ID" class="form-control">
								<?php
									$user_id_sql = "SELECT * FROM USERS";
									$user_id_result = oci_parse($connect, $user_id_sql);
									oci_execute($user_id_result);
									while ($row_user_id = oci_fetch_array($user_id_result)) { ?>
										<option value="<?php echo $row_user_id['USER_ID'];?>" ><?php echo $row_user_id['USER_NAME']; ?></option>
									<?php } ?>
							</select>
						</div>
						<div class="form-group my-4">
							<label for="LIBRARIAN_ID"></label>
							<select name="LIBRARIAN_ID" class="form-control">
								<?php
									$librarian_id_sql = "SELECT * FROM LIBRARIAN";
									$librarian_id_result = oci_parse($connect, $librarian_id_sql);
									oci_execute($librarian_id_result);
									while ($row_librarian_id = oci_fetch_array($librarian_id_result)) { ?>
										<option value="<?php echo $row_librarian_id['LIBRARIAN_ID'];?>" ><?php echo $row_librarian_id['LIBRARIAN_NAME']; ?></option>
									<?php } ?>
							</select>
						</div>
						<div class="form-group my-4">
							<label  for="RESERVE_DATE"></label>
							<input type="date" name="RESERVE_DATE" class="form-control" id="RESERVE_DATE">
						</div>
						<div class="form-group my-4">
							<label  for="RETURN_DATE"></label>
							<input type="date" name="RETURN_DATE" class="form-control" id="RETURN_DATE">
						</div>
						<div class="form-group my-4">
							<label for="DUE_DATE"></label>
							<input type="date" name="DUE_DATE" class="form-control" id="DUE_DATE">
						</div>
						<button type="submit" name="add" class="btn btn-primary">Add</button>
						<a href="borrow.php" class="btn btn-warning">Back</a>
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