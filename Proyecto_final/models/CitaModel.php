<?php
// models/CitaModel.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class CitaModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

 
    public function obtenerCita($id_Paciente) {
        $sql = "SELECT * 
                FROM Cita 
                WHERE id_Usuario = (SELECT id_Usuario FROM Paciente WHERE id_Paciente = $id_Paciente)";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function actualizarCita($id_Paciente, $estado_cita, $observacion) {
        $estado_cita = $this->conn->real_escape_string($estado_cita);
        $observacion = $this->conn->real_escape_string($observacion);

        $sql = "UPDATE Cita 
                SET Estado = '$estado_cita', Observacion = '$observacion' 
                WHERE id_Usuario = (SELECT id_Usuario FROM Paciente WHERE id_Paciente = $id_Paciente)";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>