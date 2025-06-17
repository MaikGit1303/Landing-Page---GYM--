<?php
define('DB_SERVER', 'localhost'); // La dirección de tu servidor de base de datos
define('DB_USERNAME', 'root');   // El usuario de tu base de datos (por defecto 'root' en XAMPP)
define('DB_PASSWORD', '');       // La contraseña de tu base de datos (por defecto vacía en XAMPP)
define('DB_NAME', 'gym_db');     // El nombre de la base de datos que creaste en phpMyAdmin

// Intentar conectar a la base de datos MySQL
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar conexión
if ($mysqli->connect_error) {
    die("ERROR: No se pudo conectar a la base de datos. " . $mysqli->connect_error);
}
// Opcional: Si la conexión es exitosa, puedes imprimir un mensaje para depuración
// echo "Conexión a la base de datos exitosa!";
?>