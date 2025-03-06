<?php
// controllers/EditarHistorialController.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/HistorialModel_Editar.php';

class EditarHistorialController {
    private $model;

    public function __construct($conn) {
        $this->model = new HistorialModel($conn);
    }

    public function editarHistorial() {
      
        $id_Historial = isset($_GET['id_Historial']) ? $_GET['id_Historial'] : 0;
        $id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;

       
        $historial = $this->model->obtenerHistorial($id_Historial);

        if (!$historial) {
            echo "Historial no encontrado.";
            exit;
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $diagnostico = $_POST['diagnostico'];
            $alergias = $_POST['alergias'];
            $enfermedades_cronicas = $_POST['enfermedades_cronicas'];
            $cirugias_previas = $_POST['cirugias_previas'];
            $medicamentos_actuales = $_POST['medicamentos_actuales'];
            $grupo_sanguineo = $_POST['grupo_sanguineo'];
            $antecedentes_familiares = $_POST['antecedentes_familiares'];
            $vacunas = $_POST['vacunas'];

            
            if ($this->model->actualizarHistorial($id_Historial, $diagnostico, $alergias, $enfermedades_cronicas, $cirugias_previas, $medicamentos_actuales, $grupo_sanguineo, $antecedentes_familiares, $vacunas)) {
               
                header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=$id_Paciente");
                exit;
            } else {
                echo "Error al actualizar el historial.";
            }
        }

     
        include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/editar_historial_view.php';
    }
}


$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$controller = new EditarHistorialController($conn);
$controller->editarHistorial();
?>