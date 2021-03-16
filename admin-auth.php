<?php
session_start();
if($_SESSION['SESS_ADMIN'] != 1) {
    header("location: access-denied.php");
    exit();
} 
?>