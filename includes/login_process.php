<?php
session_start(); // ¡IMPORTANTE! Inicia la sesión al principio para usar $_SESSION
require_once 'db_config.php'; // db_config.php está en la misma carpeta includes/

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar nombre de usuario
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, ingresa tu nombre de usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validar contraseña
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, ingresa tu contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Si no hay errores de entrada, intenta autenticar
    if (empty($username_err) && empty($password_err)) {
        // Prepara una sentencia SELECT para obtener la contraseña hasheada
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            if ($stmt->execute()) {
                $stmt->store_result();

                // Si el nombre de usuario existe, verificar contraseña
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Contraseña correcta, iniciar sesión
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirigir al usuario al dashboard.php (que estará en la raíz del proyecto)
                            header("location: ../dashboard.php"); // Desde includes/ a la raíz
                            exit();
                        } else {
                            $password_err = "La contraseña que has introducido no es válida.";
                        }
                    }
                } else {
                    $username_err = "No existe una cuenta con ese nombre de usuario.";
                }
            } else {
                // Error de ejecución de la consulta
                $error_msg = "Error interno del servidor. Por favor, inténtalo de nuevo más tarde.";
                header("location: ../HTML/login.php?signin_error=" . urlencode($error_msg));
                exit();
            }
            $stmt->close();
        }
    }
    
    // Si hay errores de validación o autenticación, redirige de vuelta al login.php con el primer error
    $error_msg = "";
    if(!empty($username_err)) $error_msg = $username_err;
    elseif(!empty($password_err)) $error_msg = $password_err;
    
    if (!empty($error_msg)) {
        header("location: ../HTML/login.php?signin_error=" . urlencode($error_msg)); // Desde includes/ a HTML/
        exit();
    }
}

$mysqli->close(); // Cierra la conexión a la base de datos
?><?php
session_start(); // ¡IMPORTANTE! Inicia la sesión al principio para usar $_SESSION
require_once 'db_config.php'; // db_config.php está en la misma carpeta includes/

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar nombre de usuario
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, ingresa tu nombre de usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validar contraseña
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, ingresa tu contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Si no hay errores de entrada, intenta autenticar
    if (empty($username_err) && empty($password_err)) {
        // Prepara una sentencia SELECT para obtener la contraseña hasheada
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            if ($stmt->execute()) {
                $stmt->store_result();

                // Si el nombre de usuario existe, verificar contraseña
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Contraseña correcta, iniciar sesión
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirigir al usuario al dashboard.php (que estará en la raíz del proyecto)
                            header("location: ../dashboard.php"); // Desde includes/ a la raíz
                            exit();
                        } else {
                            $password_err = "La contraseña que has introducido no es válida.";
                        }
                    }
                } else {
                    $username_err = "No existe una cuenta con ese nombre de usuario.";
                }
            } else {
                // Error de ejecución de la consulta
                $error_msg = "Error interno del servidor. Por favor, inténtalo de nuevo más tarde.";
                header("location: ../HTML/login.php?signin_error=" . urlencode($error_msg));
                exit();
            }
            $stmt->close();
        }
    }
    
    // Si hay errores de validación o autenticación, redirige de vuelta al login.php con el primer error
    $error_msg = "";
    if(!empty($username_err)) $error_msg = $username_err;
    elseif(!empty($password_err)) $error_msg = $password_err;
    
    if (!empty($error_msg)) {
        header("location: ../HTML/login.php?signin_error=" . urlencode($error_msg)); // Desde includes/ a HTML/
        exit();
    }
}

$mysqli->close(); // Cierra la conexión a la base de datos
?>