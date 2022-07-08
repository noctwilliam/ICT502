<?php
session_start();
unset($_SESSION["LIBRARIAN_ID"]);
header("Location:login.php");
?>