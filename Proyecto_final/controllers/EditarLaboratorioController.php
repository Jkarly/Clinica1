<?php
// controllers/EditarLaboratorioController.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/LaboratorioModel_Editar.php';

class EditarLaboratorioController {
    private $model;

    public function __construct($conn) {
        $this->model = new LaboratorioModel($conn);
    }

    public function editarLaboratorio() {
        
        $id_laboratorio = isset($_GET['id_laboratorio']) ? $_GET['id_laboratorio'] : null;
        $id_paciente = isset($_GET['id_paciente']) ? $_GET['id_paciente'] : null;

        
        if (!$id_laboratorio || !$id_paciente) {
            echo "ID de laboratorio o paciente no proporcionados.";
            exit;
        }

        
        $laboratorio = $this->model->obtenerLaboratorio($id_laboratorio);

        if (!$laboratorio) {
            echo "Laboratorio no encontrado.";
            exit;
        }

        // Si el formulario es enviado, actualizar los datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];

            // Validar que los campos no estén vacíos
            if (empty($nombre) || empty($direccion)) {
                echo "Todos los campos son obligatorios.";
                exit;
            }

            // Actualizar el laboratorio
            if ($this->model->actualizarLaboratorio($id_laboratorio, $nombre, $direccion)) {
                echo "Laboratorio actualizado con éxito.";
                // Redirigir a la página de detalle de la cita o laboratorio
                header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=$id_paciente");
                exit;
            } else {
                echo "Error al actualizar el laboratorio.";
            }
        }

        // Incluir la vista
        include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/editar_laboratorio_view.php';
    }
}

// Uso del controlador
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$controller = new EditarLaboratorioController($conn);
$controller->editarLaboratorio();
?>