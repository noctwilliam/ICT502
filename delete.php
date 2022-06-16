<?php
	require "connect.php";
	$BOOK_ISBN = $_GET["BOOK_ISBN"];
	$query = "DELETE FROM book WHERE BOOK_ISBN = '$BOOK_ISBN'";
	$execute = oci_parse($connect, $query);
	oci_execute($execute);

	if ($execute) {
		header("Location: index.php");
	}
	else{
		echo "<script>alert('Failed to Delete!')</script>";
		header("Location: index.php");
	}
?>