<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: Home_final.php"); // Redirecting To Home Page
?>