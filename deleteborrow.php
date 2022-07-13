<?php
	require "connect.php";
	$BOOK_ID = $_GET["BOOK_ID"];
	$query = "DELETE FROM BORROWED WHERE BOOK_ID = '$BOOK_ID'";
	$execute = oci_parse($connect, $query);
	oci_execute($execute);

	if ($execute) {
		header("Location: borrow.php");
	}
	else{
		echo "<script>alert('Failed to Delete!')</script>";
		header("Location: borrow.php");
	}
?>