<?php
	require "connect.php";
	$BOOK_ISBN = $_GET['BOOK_ISBN'];
	$sql_book = "SELECT * FROM BORROWED WHERE BOOK_ISBN = '$BOOK_ISBN'";
	$result_book = oci_parse($connect, $sql_book);
	oci_execute($result_book);
	$row = oci_fetch_array($result_book);
    

	if (isset($_POST['update'])) {
		$VAR_USER = $_POST['USER_ID_input'];
		$VAR_LIBRARIAN = $_POST['LIBRARIAN_ID_input'];
		$VAR_RESERVE = $_POST['RESERVE_DATE_input'];
		$VAR_RETURN = $_POST['RETURN_DATE_input'];
		$VAR_DUE = $_POST['DUE_DATE_input'];

		$sql_update = "UPDATE BORROWED SET
			USER_ID = '$VAR_USER',
			LIBRARIAN_ID = '$VAR_LIBRARIAN',
			RESERVE_DATE = TO_DATE('$VAR_RESERVE','YYYY-MM-DD'),
			RETURN_DATE = TO_DATE('$VAR_RETURN','YYYY-MM-DD'),
			DUE_DATE = TO_DATE('$VAR_DUE','YYYY-MM-DD') WHERE BOOK_ID = '$BOOK_ID'";

		$query = oci_parse($connect, $sql_update);
		$result_update = oci_execute($query, OCI_DEFAULT);
		if ($result_update) {
			oci_commit($connect);
			echo "<script>alert('Successfully Updated!')</script>";
			header("Location: borrow.php");
		} else {
			echo "<script>alert('Failed to Update!')</script>";
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
	<h2 class="form-title">Edit Borrower</h2>
		<form action="" method="POST" class="register-form" id="register-form">
			
		
						<div class="form-group">
							<label for="USER_ID"></label>
							<select name="USER_ID" class="form-control">
								<?php 
									$user_id_sql = "SELECT * FROM USERS";
									$user_id_result = oci_parse($connect, $user_id_sql);
									oci_execute($user_id_result);
									while ($row_user_id = oci_fetch_array($user_id_result)) { ?>
										<option value="<?php echo $row_user_id['USER_ID'];?>"><?php echo $row_user_id['USER_NAME']; ?></option>
									<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="LIBRARIAN_ID"></label>
							<select name="BOOK_ISBN" id="BOOK ISBN" class="form-control">
								<?php 
									$librarian_id_sql = "SELECT * FROM LIBRARIAN";
									$librarian_id_result = oci_parse($connect, $librarian_id_sql);
									oci_execute($librarian_id_result);
									while ($row_librarian_id = oci_fetch_array($librarian_id_result)) { ?>
										<option value="<?php echo $row_librarian_id['LIBRARIAN_ID'];?>"><?php echo $row_librarian_id['LIBRARIAN_NAME']; ?></option>
									<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="RESERVE_DATE"></label>
							<input type="date" class="form-control" name="RESERVE_DATE_input" value="<?php echo $row['RESERVE_DATE']; ?>">
						</div>
						<div class="form-group">
							<label for="RETURN_DATE"></label>
							<input type="date" class="form-control" name="RETURN_DATE_input" value="<?php echo $row['RETURN_DATE']; ?>">
						</div>
						<div class="form-group">
							<label for="DUE_DATE"></label>
							<input type="date" class="form-control" name="DUE_DATE_input" value="<?php echo $row['DUE_DATE']; ?>">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="update" value="Update">
							<a href="borrow.php" class="btn btn-danger">Cancel</a>
						</div>
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