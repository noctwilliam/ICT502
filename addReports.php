<?php
include "header.php";
require "connect.php";
if (isset($_POST['add'])) {
    $BOOK_ISBN = $_POST['BOOK_ISBN'];
    $USER_ID = $_POST['USER_ID'];
    $ISSUE_RETURN = $_POST['ISSUE_RETURN'];

    $sql = "INSERT INTO REPORTS (BOOK_ISBN, USER_ID, ISSUE_RETURN) VALUES ('$BOOK_ISBN', '$USER_ID', '$ISSUE_RETURN')";

    $result = oci_parse($connect, $sql);
    oci_execute($result);

    if ($result) {
        echo  '<script> alert("Successfully Submitted!")</script>';
        header("Location: viewReports.php");
    } else {
        echo '<script>alert("Failed to Submit!")</script>';
        header("Location: addReports.php");
    }
}
?>
    <div class="main">
	<section class="signup">
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Add Issue</h2>
					<form method="POST" class="register-form" id="register-form">
						<div class="form-group">
							<p class="my-2">BOOK TITLE</p>
							<label for="BOOK_ISBN"></label>
							<select name="BOOK_ISBN" class="form-control">
								<?php
								$books_query = "SELECT * FROM BOOK";
								$books_result = oci_parse($connect, $books_query);
								oci_execute($books_result);
								while ($data = oci_fetch_array($books_result)) { ?>
									<option value="<?php echo $data['BOOK_ISBN']; ?>" ><?php echo $data['BOOK_TITLE']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<p>USER NAME</p>
							<label for="USER_ID"></label>
							<select name="USER_ID" class="form-control">
								<?php
								$users_query = "SELECT * FROM USERS";
								$users_result = oci_parse($connect, $users_query);
								oci_execute($users_result);
								while ($data = oci_fetch_array($users_result)) { ?>
									<option value="<?php echo $data['USER_ID']; ?>"><?php echo $data['USER_NAME']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="ISSUE_RETURN"></label>
							<input type="text" name="ISSUE_RETURN" class="form-control" id="ISSUE_RETURN" placeholder="Enter ISSUE">
						</div>
						<div class="form-group my-4">
						<button type="submit" name="add" class="btn btn-primary">Submit</button>
						<a href="viewReports.php" class="btn btn-warning">Back</a>
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