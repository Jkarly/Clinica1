<?php
session_start();
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/LoginModel.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$loginModel = new LoginModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alias = $_POST["alias"];
    $password = $_POST["password"];

    $usuario = $loginModel->verificarUsuario($alias, $password);

    if ($usuario) {
        $_SESSION["id_Usuario"] = $usuario["id_Usuario"];
        $_SESSION["alias"] = $usuario["Alias"];
        $_SESSION["rol"] = $usuario["id_Rol"];

        
        if ($usuario["id_Rol"] == 2) { 
            header("Location: /Clinica_D_sistemas2/Proyecto_final/views/Reserva/formulario_cita.php");
            exit();
        } elseif ($usuario["id_Rol"] == 3) {
            header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/agenda_controller.php");
            exit();
        } else {
            $_SESSION['error'] = "Acceso denegado: Rol no autorizado.";
            header("Location: /Clinica_D_sistemas2/Proyecto_final/views/login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos.";
        header("Location: /Clinica_D_sistemas2/Proyecto_final/views/login.php");
        exit();
    }
}

$conn->close();
?>