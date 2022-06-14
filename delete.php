<?php
	require "connect.php";
	$BOOKS_ISBN = $_GET["BOOKS_ISBN"];
	$query = "DELETE FROM books WHERE BOOKS_ISBN = '$BOOKS_ISBN'";
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