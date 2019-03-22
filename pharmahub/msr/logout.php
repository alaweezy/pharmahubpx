<?php
session_start(); //start php session_cache_limiter
// to destroy a session variable

unset($_SESSION['username']);

session_destroy();
header("Location: http://localhost/pharmahub/index.php");
exit;
?>