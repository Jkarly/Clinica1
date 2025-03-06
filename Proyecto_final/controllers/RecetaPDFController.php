<?php
// controllers/RecetaPDFController.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/RecetaModel_Descargar.php';
require('C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/fpdf/fpdf.php');

class RecetaPDFController {
    private $model;

    public function __construct($conn) {
        $this->model = new RecetaModel($conn);
    }

    public function generarRecetaPDF() {
      
        $id_Paciente = isset($_GET['id_Paciente']) ? intval($_GET['id_Paciente']) : 0;
        $tratamiento = isset($_GET['tratamiento']) ? $_GET['tratamiento'] : '';
        $index = isset($_GET['index']) ? intval($_GET['index']) : 0;

       
        $recetas = $this->model->obtenerRecetas($id_Paciente, $tratamiento);

        if ($recetas) {
            
            $recetas_array = explode("||", $recetas['Recetas']);
            $receta = isset($recetas_array[$index]) ? $recetas_array[$index] : 'Receta no disponible';
        } else {
            $receta = 'Receta no encontrada.';
        }

      
        $pdf = new FPDF();
        $pdf->AddPage();

      
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Clinica Medica ABC', 0, 1, 'C');  // Nombre de la clínica
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Tel: 123-456-7890', 0, 1, 'C');       // Número de celular
        $pdf->Cell(0, 10, 'Direccion: Calle Falsa 123, Ciudad XYZ', 0, 1, 'C');  // Dirección de la clínica

        $pdf->Ln(10); 
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Receta', 0, 1, 'C');

        $pdf->Ln(5);

        $pdf->SetFont('Arial', '', 12);
       
        $pdf->MultiCell(0, 10, $receta);

     
        $pdf->Output('D', 'receta.pdf');
        exit();
    }
}

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$controller = new RecetaPDFController($conn);
$controller->generarRecetaPDF();
?>