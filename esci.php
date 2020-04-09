<?php
session_start();
$_SESSION = array();
$_POST = array();
header("Location: index.php");
exit();
?>