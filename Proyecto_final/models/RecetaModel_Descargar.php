<?php
// models/RecetaModel.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class RecetaModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

   
    public function obtenerRecetas($id_Paciente, $tratamiento) {
        $sql = "SELECT 
                    GROUP_CONCAT(DISTINCT r.Descripcion ORDER BY r.Fecha_Emision SEPARATOR '||') AS Recetas
                FROM 
                    Paciente p
                LEFT JOIN 
                    Usuario u ON p.id_Usuario = u.id_Usuario
                LEFT JOIN 
                    Historial_medico h ON p.id_Paciente = h.id_Paciente
                LEFT JOIN 
                    Cita c ON u.id_Usuario = c.id_Usuario
                LEFT JOIN 
                    Atencion_medica a ON c.id_Cita = a.id_Cita
                LEFT JOIN 
                    Tratamiento t ON a.id_atencion_medica = t.id_atencion_medica
                LEFT JOIN 
                    Receta r ON t.id_tratamiento = r.id_tratamiento
                WHERE 
                    p.id_Paciente = $id_Paciente 
                    AND t.Detalle = '" . $this->conn->real_escape_string($tratamiento) . "'
                GROUP BY t.Detalle";

        $result = $this->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>