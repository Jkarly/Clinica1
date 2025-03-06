<?php
include '../models/agenda_model.php';


$fecha_actual = new DateTime();
$inicio_semana = clone $fecha_actual;
$inicio_semana->modify('monday this week');
$fin_semana = clone $inicio_semana;
$fin_semana->modify('sunday this week');
session_start();


if (isset($_SESSION["id_Usuario"]) && $_SESSION["rol"] == 3) { 
    $id_medico = $_SESSION["id_Usuario"];


    $fecha_actual = new DateTime();
    $inicio_semana = clone $fecha_actual;
    $inicio_semana->modify('monday this week');
    $fin_semana = clone $inicio_semana;
    $fin_semana->modify('sunday this week');

    
    $inicio_semana_str = $inicio_semana->format('Y-m-d');
    $fin_semana_str = $fin_semana->format('Y-m-d');

    
    $mes_actual = obtenerMesActual($inicio_semana);

  
    $citas_por_dia = obtenerCitasSemana($inicio_semana_str, $fin_semana_str, $id_medico);

   
    include '../views/Detalle_cita/agenda_view.php';
} else {
   
    header("Location: /Clinica_D_sistemas2/Proyecto_final/views/login.php");
    exit();
}


include '../views/Detalle_cita/agenda_view.php';
?>
