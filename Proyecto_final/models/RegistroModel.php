<?php
class RegistroModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registrarUsuario($alias, $contrasena, $telefono, $correo, $rolId) {
        $sql_usuario = "INSERT INTO Usuario (Alias, Contrasena, Telefono, Correo, id_Rol) 
                        VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql_usuario);
        $stmt->bind_param("ssssi", $alias, $contrasena, $telefono, $correo, $rolId);

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function registrarPaciente($nombre, $apellido, $fecha_nacimiento, $id_usuario) {
        $sql_paciente = "INSERT INTO Paciente (Nombre, Apellido, Fecha_Nacimiento, id_Usuario) 
                         VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql_paciente);
        $stmt->bind_param("sssi", $nombre, $apellido, $fecha_nacimiento, $id_usuario);

        return $stmt->execute();
    }
}
?>