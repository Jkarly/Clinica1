<?php
include '../models/historial_model.php';


$id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diagnostico = $_POST['diagnostico'];
    $alergias = $_POST['alergias'];
    $enfermedadesCronicas = $_POST['enfermedadesCronicas'];
    $cirugiasPrevias = $_POST['cirugiasPrevias'];
    $medicamentosActuales = $_POST['medicamentosActuales'];
    $grupoSanguineo = $_POST['grupoSanguineo'];
    $antecedentesFamiliares = $_POST['antecedentesFamiliares'];
    $vacunas = $_POST['vacunas'];

    if (crearHistorialMedico($id_Paciente, $diagnostico, $alergias, $enfermedadesCronicas, $cirugiasPrevias, $medicamentosActuales, $grupoSanguineo, $antecedentesFamiliares, $vacunas)) {
        
        header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=" . $id_Paciente);
        exit();
    } else {
        echo "Error al crear el historial médico.";
    }
}


include '../views/Detalle_cita/crear_historial_view.php';
?>