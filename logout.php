<?php
session_start(); // Inicia la sesión

$_SESSION = array(); // Vacía todas las variables de sesión

session_destroy(); // Destruye la sesión actual

// Redirige al login.php, que está en la carpeta HTML/
header("location: HTML/login.php"); 
exit;
?>