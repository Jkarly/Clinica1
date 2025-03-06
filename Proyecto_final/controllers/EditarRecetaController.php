<?php

include '../includes/conexion.php';
include '../models/RecetaModel_Editar.php';

$recetaModel = new RecetaModel_Editar($conn);


$id_tratamiento = isset($_GET['id_tratamiento']) ? intval($_GET['id_tratamiento']) : 0;
$id_Paciente = isset($_GET['id_Paciente']) ? intval($_GET['id_Paciente']) : 0;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tratamiento = isset($_POST['id_tratamiento']) ? intval($_POST['id_tratamiento']) : 0;
    $id_Paciente = isset($_POST['id_Paciente']) ? intval($_POST['id_Paciente']) : 0;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
}


echo "Parámetros recibidos:<br>";
echo "id_tratamiento: " . $id_tratamiento . "<br>";
echo "id_Paciente: " . $id_Paciente . "<br>";
echo "fecha: " . $fecha . "<br>";

if ($id_tratamiento <= 0 || empty($fecha)) {
    die("Parámetros inválidos.");
}


$receta = $recetaModel->obtenerReceta($id_tratamiento, $fecha);

if (!$receta) {
    die("No se encontró la receta para editar.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_receta = $_POST['id_receta'];
    $descripcion = $_POST['descripcion'];
    $fecha_emision = $_POST['fecha_emision'];

   
    echo "Datos recibidos:<br>";
    echo "id_receta: " . $id_receta . "<br>";
    echo "descripcion: " . $descripcion . "<br>";
    echo "fecha_emision: " . $fecha_emision . "<br>";

    if ($recetaModel->actualizarReceta($id_receta, $descripcion, $fecha_emision)) {
        
        header("Location:DetalleCitaController.php?id_Paciente=$id_Paciente&actualizado=1");
        exit();
    } else {
        echo "Error al actualizar la receta.";
    }
}


include '../views/Detalle_cita/editar_receta_view.php';
?>