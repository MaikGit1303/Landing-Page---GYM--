<?php
session_start(); // Inicia la sesión

// Verifica si el usuario no está logueado, lo redirige al login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: HTML/login.php"); // Desde la raíz a HTML/login.php
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard GYM</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 50px; 
            background-color: #1a1a2e; /* Tu color de fondo oscuro */
            color: #FFFFFF; /* Tu color de texto claro */
        }
        .welcome-message { 
            font-size: 24px; 
            color: #FFFFFF; 
            margin-bottom: 30px;
        }
        .logout-link { 
            display: inline-block; 
            margin-top: 20px; 
            padding: 10px 20px; 
            background-color: #e94560; /* Tu color primario de GYM */
            color: white; 
            text-decoration: none; 
            border-radius: 5px; 
            transition: background-color 0.3s ease;
        }
        .logout-link:hover { 
            background-color: #d1304b; 
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
        <p>Has iniciado sesión correctamente en el Panel GYM.</p>
    </div>
    <p><a href="logout.php" class="logout-link">Cerrar Sesión</a></p>
    <nav>
        <a href="HTML/clientes.html" class="logout-link" style="margin-right: 10px;">Gestionar Clientes</a>
        <a href="HTML/membresias.html" class="logout-link">Gestionar Membresías</a>
        </nav>
</body>
</html>