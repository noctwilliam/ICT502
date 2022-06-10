<?php
	require "connect.php";
	$BOOKS_ISBN = $_GET["BOOKS_ISBN"];
	$query = "DELETE FROM books WHERE BOOKS_ISBN = '$BOOKS_ISBN'";
	$execute = mysqli_query($connect, $query);

	if ($execute) {
		header("Location: index.php");
	}
	else{
		echo "<script>alert('Failed to Delete!')</script>";
		header("Location: index.php");
	}
?>