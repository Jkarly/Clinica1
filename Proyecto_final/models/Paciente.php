<?php
class PacienteModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registrarPaciente($nombre, $apellido, $fecha_nacimiento, $id_usuario) {
        $sql = "INSERT INTO Paciente (Nombre, Apellido, Fecha_Nacimiento, id_Usuario) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $apellido, $fecha_nacimiento, $id_usuario);

        return $stmt->execute();
    }
}
?>