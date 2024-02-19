<?php 
session_start();
$_SESSION['isOkay']= 0;

header("Location: login.php");  
exit();    
?>
