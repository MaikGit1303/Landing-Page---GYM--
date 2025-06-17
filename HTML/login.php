<?php
// Incluye el archivo de configuración de la base de datos (asegúrate de que la ruta sea correcta)
// Este archivo NO DEBE generar salida HTML si lo incluyes aquí.
// Solo genera las variables $mysqli y las defines.
require_once '../includes/db_config.php'; 

// Aquí puedes inicializar variables para mostrar mensajes de error/éxito
// Estos mensajes se podrían pasar desde register_process.php o login_process.php
// a través de parámetros URL o sesiones.
$signup_message = "";
$signin_message = "";

// Ejemplo muy básico de cómo podrías recibir un mensaje de éxito de registro
if (isset($_GET['signup_success']) && $_GET['signup_success'] == 'true') {
    $signup_message = "<p class='success-message'>¡Registro exitoso! Ahora puedes iniciar sesión.</p>";
}
// Ejemplo de cómo podrías recibir errores desde los scripts PHP
if (isset($_GET['signup_error'])) {
    $signup_message = "<p class='error-message'>" . htmlspecialchars($_GET['signup_error']) . "</p>";
}
if (isset($_GET['signin_error'])) {
    $signin_message = "<p class='error-message'>" . htmlspecialchars($_GET['signin_error']) . "</p>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Panel GYM</title>
    <link rel="stylesheet" href="../CSS/login/login.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos básicos para mensajes de error/éxito */
        .error-message {
            color: #e94560; /* Usando tu color primario para errores */
            font-size: 14px;
            margin-top: 10px;
        }
        .success-message {
            color: #4CAF50; /* Un color verde para éxito */
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="../includes/register_process.php" method="POST"> 
                <h1>Crear Cuenta</h1>
                <span>o usa tu correo para registrarte</span>
                <input type="email" placeholder="Email" name="email" required /> 
                <input type="text" placeholder="Username" name="username" required /> 
                <input type="password" placeholder="Password" name="password" required /> 
                <button type="submit">Registrarse</button>
                <?php echo $signup_message; // Muestra mensajes de registro ?>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="../includes/login_process.php" method="POST"> 
                <h1>Iniciar Sesión</h1>
                <span>o usa tu cuenta</span>
                <input type="text" placeholder="User" name="username" required /> 
                <input type="password" placeholder="Password" name="password" required />
                <a href="#">Forgot your Password?</a>
                <button type="submit" id="signInButton">Login</button>
                <?php echo $signin_message; // Muestra mensajes de inicio de sesión ?>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>¡Bienvenido de Nuevo!</h1>
                    <p>Para mantenerte conectado con nosotros, por favor inicia sesión con tu información personal.</p>
                    <button class="ghost" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>¡Hola, Amigo!</h1>
                    <p>Introduce tus datos personales y comienza tu viaje con nosotros.</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../Js/login.js"></script>
</body>
</html>