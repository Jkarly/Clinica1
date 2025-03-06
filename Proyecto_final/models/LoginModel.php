<?php
class LoginModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function verificarUsuario($alias, $password) {
        $sql = "SELECT id_Usuario, Alias, Contrasena, id_Rol FROM Usuario WHERE Alias = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $alias);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row["Contrasena"];

            
            if ($password === $stored_password || password_verify($password, $stored_password)) {
                return $row; 
            }
        }

        return null; 
    }
}
?>