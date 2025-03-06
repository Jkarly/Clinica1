<?php
session_start();
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/ReservaModel.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$reservaModel = new ReservaModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id_Horario = $_POST['id_Horario'];
    $id_Especialidad = $_POST['id_Especialidad'];
    $id_Usuario = $_SESSION['id_Usuario']; 
    $monto = rand(50, 200);

    $conn->begin_transaction();

    try {
       
        $estado = 'Pendiente';
        $observacion = 'Agendada a través del formulario';
        $reservaModel->insertarCita($estado, $observacion, $monto, $id_Usuario, $id_Especialidad, $id_Horario);

       
        $reservaModel->actualizarEstadoHorario($id_Horario);

        $conn->commit();
        echo($monto);
        
        header("Location: /Clinica_D_sistemas2/Proyecto_final/views/Reserva/confirmacion_pago.php?monto=" . urlencode($monto));
        exit();
    } catch (Exception $e) {
       
        $conn->rollback();
        echo "Error al agendar la cita: " . $e->getMessage();
    }
}

$conn->close();
?>