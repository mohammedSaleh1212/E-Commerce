<?php 
session_start();
$_SESSION['isOkay']= 1;
$_SESSION['isAdmin']= 0;





header("Location: index.php");  
exit();    
?>