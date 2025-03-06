<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

function crearHistorialMedico($id_Paciente, $diagnostico, $alergias, $enfermedadesCronicas, $cirugiasPrevias, $medicamentosActuales, $grupoSanguineo, $antecedentesFamiliares, $vacunas) {
    global $conn;

    $sql = "INSERT INTO Historial_medico 
            (Diagnostico, Alergias, Enfermedades_Cronicas, Cirugias_Previas, Medicamentos_Actuales, Grupo_Sanguineo, Antecedentes_Familiares, Vacunas, id_Paciente)
            VALUES ('$diagnostico', '$alergias', '$enfermedadesCronicas', '$cirugiasPrevias', '$medicamentosActuales', '$grupoSanguineo', '$antecedentesFamiliares', '$vacunas', '$id_Paciente')";

    if ($conn->query($sql) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}
?>