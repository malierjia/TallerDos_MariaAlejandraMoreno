<?php 
require_once('includes/database.php');
session_start();

//termina session
$_SESSION['contador']=0;
session_destroy();

header('Location: index.php')
?>