<?php
	require "connect.php";
	$USER_ID = $_GET["USER_ID"];
	$query = "DELETE FROM users WHERE USER_ID = '$USER_ID'";
	$execute = oci_parse($connect, $query);
	oci_execute($execute);

	if ($execute) {
		header("Location: indexuser.php");
	}
	else{
		echo "<script>alert('Failed to Delete!')</script>";
		header("Location: indexuser.php");
	}
?>