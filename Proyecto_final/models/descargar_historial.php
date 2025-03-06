<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

function obtenerHistorialMedico($id_Paciente) {
    global $conn;

    $sql = "SELECT 
                p.Nombre AS Nombre_Paciente,
                p.Apellido AS Apellido_Paciente,
                p.Fecha_Nacimiento,
                h.Diagnostico,
                h.Alergias,
                h.Enfermedades_Cronicas,
                h.Cirugias_Previas,
                h.Medicamentos_Actuales,
                h.Grupo_Sanguineo,
                h.Antecedentes_Familiares,
                h.Vacunas,
                h.Ultima_Actualizacion
            FROM 
                Historial_medico h
            INNER JOIN 
                Paciente p ON h.id_Paciente = p.id_Paciente
            WHERE 
                h.id_Paciente = $id_Paciente";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
?>