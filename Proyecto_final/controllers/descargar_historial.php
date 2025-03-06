<?php

require('../views/Detalle_cita/fpdf/fpdf.php');
include('C:\xampp\htdocs\Clinica_D_sistemas2\Proyecto_final\models\descargar_historial.php');

$id_Paciente = isset($_GET['id_Paciente']) ? intval($_GET['id_Paciente']) : 0;


$historial = obtenerHistorialMedico($id_Paciente);

if ($historial) {
   
    $pdf = new FPDF();
    $pdf->AddPage();

   
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Clinica Medica ABC', 0, 1, 'C');  // Nombre de la clínica
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Tel: 123-456-7890', 0, 1, 'C');       // Número de celular
    $pdf->Cell(0, 10, 'Direccion: Calle Falsa 123, Ciudad XYZ', 0, 1, 'C');  // Dirección de la clínica

    $pdf->Ln(10); 
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Historial Medico', 0, 1, 'C');

    $pdf->Ln(5); 
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nombre: ' . $historial['Nombre_Paciente'] . ' ' . $historial['Apellido_Paciente'], 0, 1);
    $pdf->Cell(0, 10, 'Fecha de Nacimiento: ' . $historial['Fecha_Nacimiento'], 0, 1);
    $pdf->Ln(5); 

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Diagnostico:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Diagnostico']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Alergias:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Alergias']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Enfermedades Cronicas:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Enfermedades_Cronicas']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Cirugias Previas:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Cirugias_Previas']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Medicamentos Actuales:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Medicamentos_Actuales']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Grupo Sanguineo:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, $historial['Grupo_Sanguineo'], 0, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Antecedentes Familiares:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Antecedentes_Familiares']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Vacunas:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $historial['Vacunas']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Ultima Actualizacion:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, $historial['Ultima_Actualizacion'], 0, 1);


    $pdf->Output('D', 'historial_medico_' . $id_Paciente . '.pdf');
    exit();
} else {
    echo "No se encontró el historial médico.";
}
?>