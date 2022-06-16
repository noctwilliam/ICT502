<?php
	// php & Oracle DB connection file

	$host = "localhost/XE";
	$username = "library";
	$password = "library";
	$database = "";

	$connect = oci_connect($username, $password, $host);

	if (!$connect) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
?>