<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class DetalleCitaModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerCita($id_Paciente) {
        $sql_cita = "SELECT * 
                    FROM Cita 
                    WHERE id_Usuario = (SELECT id_Usuario FROM Paciente WHERE id_Paciente = $id_Paciente);";
        $result_cita = $this->conn->query($sql_cita);
        if ($result_cita->num_rows > 0) {
            return $result_cita->fetch_assoc();
        } else {
            return null;
        }
    }

    public function actualizarCita($id_Paciente, $estado_cita, $observacion) {
        $sql_update = "UPDATE Cita 
                       SET Estado = '$estado_cita', Observacion = '$observacion' 
                       WHERE id_Usuario = (SELECT id_Usuario FROM Paciente WHERE id_Paciente = $id_Paciente)";

        if ($this->conn->query($sql_update) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>