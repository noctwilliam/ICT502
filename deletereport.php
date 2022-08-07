<?php
	require "connect.php";
	$REPORT_ID = $_GET['REPORT_ID'];
	$query = "DELETE FROM REPORTS WHERE REPORT_ID = '$REPORT_ID'";
	$execute = oci_parse($connect, $query);
	oci_execute($execute);

	if ($execute) {
		header("Location: index.php");
	}
	else{
		echo "<script>alert('Failed to Delete!')</script>";
		header("Location: index.php");
	}