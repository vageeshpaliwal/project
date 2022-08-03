<?php
 session_start();
unset($_SESSION['role']);
unset($_SESSION['code']);
unset($_SESSION['t']);
unset($_SESSION['firstname']);

session_destroy();

header("location:login.php");


    
?>