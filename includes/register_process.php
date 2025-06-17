<?php
// Incluye el archivo de configuración de la base de datos
require_once '../includes/db_config.php'; // Asegúrate de que la ruta sea correcta

// Inicializa variables para mensajes de error
$username_err = $email_err = $password_err = "";

// Procesa el formulario cuando se envía (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Validar nombre de usuario
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, ingresa un nombre de usuario.";
    } else {
        // Prepara una sentencia SELECT para verificar si el usuario ya existe
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);

            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $username_err = "Este nombre de usuario ya está tomado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
            }
            $stmt->close();
        }
    }

    // 2. Validar email (similar al nombre de usuario, o con un filtro de email)
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor, ingresa un correo electrónico.";
    } else {
        // Puedes añadir una validación de formato de email más estricta aquí
        $email = trim($_POST["email"]);
        // Opcional: Verificar si el email ya existe en la base de datos
    }

    // 3. Validar contraseña
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, ingresa una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 6) { // Ejemplo: mínimo 6 caracteres
        $password_err = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // 4. Si no hay errores de entrada, insertar en la base de datos
    if (empty($username_err) && empty($email_err) && empty($password_err)) {
        // Hashear la contraseña antes de guardarla
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepara una sentencia INSERT
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $param_username, $param_email, $param_password);

            $param_username = $username;
            $param_email = $email;
            $param_password = $hashed_password;

            if ($stmt->execute()) {
                // Registro exitoso, redirigir al login o a una página de éxito
                header("location: ../HTML/login.php?signup_success=true"); // O a una página de éxito, o mantener en el login con mensaje
                exit();
            } else {
                echo "Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
            }
            $stmt->close();
        }
    }
}

// Cierra la conexión a la base de datos
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    </head>
<body>
    <?php if (!empty($username_err)) echo "<p>$username_err</p>"; ?>
    <?php if (!empty($email_err)) echo "<p>$email_err</p>"; ?>
    <?php if (!empty($password_err)) echo "<p>$password_err</p>"; ?>
    </body>
</html>