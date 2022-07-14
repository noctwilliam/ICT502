<?php
	include "connect.php";
	session_start();

	function active($current_page) {
		$url_array =  explode('/', $_SERVER['REQUEST_URI']);
		$url = end($url_array);
		if ($current_page == $url) {
			echo 'active';
		}
	}
?>

<!-- This is the header -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
	<title>Book Library System</title>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Admin Dashboard</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<?php if (!empty($_SESSION['LIBRARIAN_PASS'])) { ?>
							<a class="nav-link <?php active('index.php') ?>" aria-current="page" href="index.php">Books</a>
							<a class="nav-link <?php active('indexuser.php') ?>" aria-current="page" href="indexuser.php">Users</a>
							<a class="nav-link <?php active('borrow.php') ?>" aria-current="page" href="borrow.php" >Borrowed</a>
							<a class="nav-link <?php active('viewReports.php') ?>" aria-current="page" href="viewReports.php" >Reports</a>
							<a class="nav-link" href="logout.php">Logout</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</nav>
	</div>
