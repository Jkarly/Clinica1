<?php
session_start();
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/RegistroModel.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$registroModel = new RegistroModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alias = $_POST['alias'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hashear la contraseña
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rolId = 2; 

   
    $id_usuario = $registroModel->registrarUsuario($alias, $contrasena, $telefono, $correo, $rolId);

    if ($id_usuario) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

       
        if ($registroModel->registrarPaciente($nombre, $apellido, $fecha_nacimiento, $id_usuario)) {
            header("Location: /Clinica_D_sistemas2/Proyecto_final/views/Usuario/login.php");
            exit();
        } else {
            echo "Error al registrar paciente: " . $conn->error;
        }
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }
}

$conn->close();
?>