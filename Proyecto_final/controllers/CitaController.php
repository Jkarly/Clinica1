<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/Cita.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;

$detalleCitaModel = new DetalleCitaModel($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estado_cita = $_POST['estado_cita'];
    $observacion = $_POST['observacion'];

    if ($detalleCitaModel->actualizarCita($id_Paciente, $estado_cita, $observacion)) {
        header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=$id_Paciente");
        exit;
    } else {
        echo "Error al actualizar la cita: " . $conn->error;
    }
}

$cita = $detalleCitaModel->obtenerCita($id_Paciente);

if (!$cita) {
    echo "No se encontró la cita.";
    exit;
}

$conn->close();

include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/cita.php';
?>