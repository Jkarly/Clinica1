<?php
// controllers/EditarCitaController.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/CitaModel.php';

class EditarCitaController {
    private $model;

    public function __construct($conn) {
        $this->model = new CitaModel($conn);
    }

    public function editarCita() {
        
        $id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $estado_cita = $_POST['estado_cita'];
            $observacion = $_POST['observacion'];

           
            if ($this->model->actualizarCita($id_Paciente, $estado_cita, $observacion)) {
                
                header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=$id_Paciente");
                exit;
            } else {
                echo "Error al actualizar la cita.";
            }
        }

       
        $cita = $this->model->obtenerCita($id_Paciente);

        if (!$cita) {
            echo "No se encontró la cita.";
            exit;
        }

       
        include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/editar_cita_view.php';
    }
}


$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$controller = new EditarCitaController($conn);
$controller->editarCita();
?>