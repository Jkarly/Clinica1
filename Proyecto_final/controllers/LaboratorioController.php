<?php

include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/LaboratorioModel.php';

class LaboratorioController {
    private $model;

    public function __construct($conn) {
        $this->model = new LaboratorioModel($conn);
    }

    public function crearLaboratorio() {
        $id_Historial = isset($_GET['id_Historial']) ? $_GET['id_Historial'] : 0;
        $id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_laboratorio = $_POST['nombre_laboratorio'];
            $direccion_laboratorio = $_POST['direccion_laboratorio'];

            if ($this->model->crearLaboratorio($nombre_laboratorio, $direccion_laboratorio, $id_Historial)) {
                header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=" . $id_Paciente);
                exit();
            } else {
                echo "Error al crear el laboratorio.";
            }
        }

        include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/crear_laboratorio_view.php';
    }
}


$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$controller = new LaboratorioController($conn);
$controller->crearLaboratorio();
?>