<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_receta = $_POST['id_receta'];
    $id_Paciente = $_POST['id_Paciente'];
    $descripcion = $_POST['descripcion'];
    $fecha_emision = $_POST['fecha_emision'];

    
    $sql_update = "UPDATE Receta 
                   SET Descripcion = ?, Fecha_Emision = ? 
                   WHERE id_receta = ?";

    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("ssi", $descripcion, $fecha_emision, $id_receta);

    if ($stmt->execute()) {
       
        header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=$id_Paciente&actualizado=1");
        exit();
    } else {
        echo "Error al actualizar la receta: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>