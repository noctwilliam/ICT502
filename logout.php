<?php
session_start();
unset($_SESSION["LIBRARIAN_ID"]);
unset($_SESSION["LIBRARIAN_PASS"]);
header("Location:login.php");
?>