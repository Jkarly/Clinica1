<?php
// models/LaboratorioModel.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class LaboratorioModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

   
    public function obtenerLaboratorio($id_laboratorio) {
        $query = "SELECT * FROM Laboratorio WHERE id_Laboratorio = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_laboratorio);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function actualizarLaboratorio($id_laboratorio, $nombre, $direccion) {
        $sql_update = "UPDATE Laboratorio 
                       SET Nombre = ?, Direccion = ? 
                       WHERE id_Laboratorio = ?";
        $updateStmt = $this->conn->prepare($sql_update);
        $updateStmt->bind_param("ssi", $nombre, $direccion, $id_laboratorio);

        if ($updateStmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>