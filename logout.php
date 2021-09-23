<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("Location:index.php");


?>