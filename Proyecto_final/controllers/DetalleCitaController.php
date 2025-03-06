<?php
include 'C:\xampp\htdocs\Clinica_D_sistemas2\Proyecto_final\models\detalle_cita.php';

$id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;


$result_cita = obtenerDetalleCita($id_Paciente);
if ($result_cita->num_rows > 0) {
    $cita = $result_cita->fetch_assoc();
} else {
    echo "No se encontraron detalles de la cita.";
    exit;
}


$result_tratamientos_recetas = obtenerTratamientosRecetas($id_Paciente);
$tratamientos_recetas = [];
if ($result_tratamientos_recetas->num_rows > 0) {
    while ($row = $result_tratamientos_recetas->fetch_assoc()) {
        $tratamiento_id = $row['id_tratamiento'];
        $receta = [
            'tratamiento' => $row['Tratamiento'],
            'estado' => $row['Estado_Tratamiento'],
            'descripcion' => $row['Receta'],
            'fecha' => $row['Fecha_Receta']
        ];

        if (!isset($tratamientos_recetas[$tratamiento_id])) {
            $tratamientos_recetas[$tratamiento_id] = [];
        }

        $tratamientos_recetas[$tratamiento_id][] = $receta;
    }
} else {
    echo "No se encontraron tratamientos o recetas.";
    exit;
}


$laboratorios = [];
$result_laboratorios = obtenerLaboratorios($id_Paciente);
if ($result_laboratorios->num_rows > 0) {
    while ($row = $result_laboratorios->fetch_assoc()) {
        $laboratorios[] = $row;
    }
} else {
    echo "No se encontraron laboratorios asociados.";
    exit;
}

$conn->close();

// Incluir la vista
include 'C:\xampp\htdocs\Clinica_D_sistemas2\Proyecto_final\views\Detalle_cita\detalle_cita.php';
?>