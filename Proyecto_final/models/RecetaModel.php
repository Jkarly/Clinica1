<?php
// models/RecetaModel.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class RecetaModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

   
    public function obtenerTratamiento($id_Tratamiento) {
        $sql = "SELECT Detalle FROM Tratamiento WHERE id_tratamiento = $id_Tratamiento";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    
    public function guardarReceta($id_Tratamiento, $descripcion_receta) {
        $descripcion_receta = $this->conn->real_escape_string($descripcion_receta);
        $sql = "INSERT INTO Receta (id_tratamiento, Descripcion, Fecha_Emision) 
                VALUES ($id_Tratamiento, '$descripcion_receta', NOW())";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>