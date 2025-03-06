<?php

include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class HistorialModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerHistorial($id_Historial) {
        $sql = "SELECT * FROM Historial_medico WHERE id_Historial = $id_Historial";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

   
    public function actualizarHistorial($id_Historial, $diagnostico, $alergias, $enfermedades_cronicas, $cirugias_previas, $medicamentos_actuales, $grupo_sanguineo, $antecedentes_familiares, $vacunas) {
        $sql = "UPDATE Historial_medico 
                SET Diagnostico = '$diagnostico', 
                    Alergias = '$alergias', 
                    Enfermedades_Cronicas = '$enfermedades_cronicas', 
                    Cirugias_Previas = '$cirugias_previas', 
                    Medicamentos_Actuales = '$medicamentos_actuales', 
                    Grupo_Sanguineo = '$grupo_sanguineo', 
                    Antecedentes_Familiares = '$antecedentes_familiares', 
                    Vacunas = '$vacunas', 
                    Ultima_Actualizacion = NOW() 
                WHERE id_Historial = $id_Historial";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>