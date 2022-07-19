<?php
include "header.php";
require "connect.php";

if (isset($_POST['loginProcess'])) {

	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$librarian_name = validate($_POST['librarian_name']);
	$password = validate($_POST['password']);

	$query = "SELECT * FROM LIBRARIAN WHERE LIBRARIAN_NAME = '$librarian_name' AND LIBRARIAN_PASS = '$password'";

	$result = oci_parse($connect, $query);
	oci_execute($result);
	$row = oci_fetch_array($result);

	if (is_array($row)) {
		$_SESSION['LIBRARIAN_PASS'] = $row['LIBRARIAN_PASS'];
		?>
		<script>
			alert("Login Successful");
			window.location.href = "index.php";
		</script>
		<?php
	} else {
		echo "<script>alert('Invalid username or password');</script>";
	}
}
?>

<form align="center" method="POST">

	<br>
	<img src="images/library.jpg" alt="Logo" width="445" height="250">
	<br>
	<input type="text" name="librarian_name" placeholder="Librarian Name"><br /><br />
	<input type="password" name="password" id="librarian-password" placeholder="Password"><br>
	<div class="form-check form-check-inline my-2">
		<input class="form-check-input" onclick="seePassword()" type="checkbox" id="password_input" value="option1">
		<label class="form-check-label" for="inlineCheckbox1">See Password</label>
	</div>
	<br>
	<button type="submit" name="loginProcess" class="btn btn-primary">Login</button>
</form>
<script>
	function seePassword() {
		var x = document.getElementById('librarian-password')
		if (x.type === 'password') {
			x.type = 'text'
		} else {
			x.type = 'password'
		}
	}
</script>

<?php include 'footer.php'; ?>