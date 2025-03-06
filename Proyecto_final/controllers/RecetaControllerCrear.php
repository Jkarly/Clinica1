<?php
// controllers/RecetaController.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/RecetaModel.php';

class RecetaController {
    private $model;

    public function __construct($conn) {
        $this->model = new RecetaModel($conn);
    }

    public function crearReceta() {
        
        $id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;
        $id_Tratamiento = isset($_GET['id_tratamiento']) ? $_GET['id_tratamiento'] : 0;

       
        $tratamiento = $this->model->obtenerTratamiento($id_Tratamiento);

        if (!$tratamiento) {
            echo "Tratamiento no encontrado.";
            exit;
        }

       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcion_receta = $_POST['descripcion_receta'];

            if ($this->model->guardarReceta($id_Tratamiento, $descripcion_receta)) {
                
                header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=$id_Paciente");
                exit;
            } else {
                echo "Error al guardar la receta.";
            }
        }

        
        include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_Cita/crear_receta_view.php';
    }
}


$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$controller = new RecetaController($conn);
$controller->crearReceta();
?>