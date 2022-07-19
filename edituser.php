<?php
	require "connect.php";
	$USER_ID = $_GET['USER_ID'];
	$sql_book = "SELECT * FROM USERS WHERE USER_ID = '$USER_ID'";
	$result_book = oci_parse($connect, $sql_book);
	oci_execute($result_book);
	$row = oci_fetch_array($result_book);

	if (isset($_POST['update'])) {

		$VAR_EMAIL = $_POST['USER_EMAIL_input'];
		$VAR_NAME = $_POST['USER_NAME_input'];
		$VAR_PHONENO = $_POST['USER_PHONENO_input'];
		$VAR_ADDRESS = $_POST['USER_ADDRESS_input'];

		$sql_update = "UPDATE USERS SET
			USER_EMAIL = '$VAR_EMAIL',
			USER_NAME = '$VAR_NAME',
			USER_PHONENO = '$VAR_PHONENO',
			USER_ADDRESS = '$VAR_ADDRESS' WHERE USER_ID = '$USER_ID'";

		$query = oci_parse($connect, $sql_update);
		$result_update = oci_execute($query, OCI_DEFAULT);
		if ($result_update) {
			oci_commit($connect);
			echo "<script>alert('Successfully Updated!')</script>";
			header("Location: indexuser.php");
		} else {
			echo "<script>alert('Failed to Update!')</script>";
			header("Location: indexuser.php");
		}

	}
?>

<?php include 'header.php'; ?>
<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
<div class="main">
	<section class="signup">
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Edit User</h2>
					<form method="POST" class="register-form" id="register-form">
						<div class="form-group">
							<label for="email"><i class="zmdi zmdi-email"></i></label>
							<input type="email" name="USER_EMAIL_input" id="email"  placeholder="Email" value="<?php echo $row['USER_EMAIL']; ?>"/>
						</div>
						<div class="form-group">
							<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="text" name="USER_NAME_input" id="name"  placeholder="Name" value="<?php echo $row['USER_NAME']; ?>"/>
						</div>
						<div class="form-group">
							<label for="phone"><i class="zmdi zmdi-phone"></i></label>
							<input type="phone" name="USER_PHONENO_input" id="phone" placeholder="Phone Number" value="<?php echo $row['USER_PHONENO']; ?>"/>
						</div>
						<div class="form-group">
							<label for="address"><i class="zmdi zmdi-home"></i></label>
							<input type="address" name="USER_ADDRESS_input" id="address" placeholder="Address" value="<?php echo $row['USER_ADDRESS']; ?>"/>
						</div>
						<div class="form-group my-4">
							<input type="submit" class="btn btn-primary" name="update" value="Update">
							<a href="indexuser.php" class="btn btn-danger">Cancel</a>
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