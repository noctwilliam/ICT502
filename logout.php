<?php
session_start();
unset($_SESSION["LIBRARIAN_NAME"]);
unset($_SESSION["LIBRARIAN_PASS"]);
header("Location:login.php");
?>