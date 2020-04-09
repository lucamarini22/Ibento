Il tuo account è stato rimosso a causa di una violazione

<?php
session_start();
header("Location: index.php");
$_SESSION = array();
$_POST = array();
header("Location: index.php");
exit();

?>