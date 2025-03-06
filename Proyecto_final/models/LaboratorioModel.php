<?php
// models/LaboratorioModel.php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

class LaboratorioModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function crearLaboratorio($nombre_laboratorio, $direccion_laboratorio, $id_Historial) {
       
        $nombre_laboratorio = $this->conn->real_escape_string($nombre_laboratorio);
        $direccion_laboratorio = $this->conn->real_escape_string($direccion_laboratorio);
        $id_Historial = $this->conn->real_escape_string($id_Historial);

       
        $sql = "INSERT INTO Laboratorio (Nombre, Direccion, id_Historial) 
                VALUES ('$nombre_laboratorio', '$direccion_laboratorio', '$id_Historial')";

        
        if ($this->conn->query($sql) === TRUE) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>