<?php


class RecetaModel_Editar {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerReceta($id_tratamiento, $fecha) {
        $sql_receta = "SELECT * FROM Receta WHERE id_tratamiento = $id_tratamiento AND Fecha_Emision = '$fecha'";
        $result_receta = $this->conn->query($sql_receta);

        if ($result_receta->num_rows > 0) {
            return $result_receta->fetch_assoc();
        } else {
            return null;
        }
    }

    public function actualizarReceta($id_receta, $descripcion, $fecha_emision) {
        $sql_update = "UPDATE Receta 
                       SET Descripcion = ?, Fecha_Emision = ? 
                       WHERE id_receta = ?";

        $stmt = $this->conn->prepare($sql_update);
        $stmt->bind_param("ssi", $descripcion, $fecha_emision, $id_receta);

      
        if ($stmt->execute()) {
            echo "Receta actualizada correctamente.<br>";
            return true;
        } else {
            echo "Error en la consulta: " . $stmt->error . "<br>";
            return false;
        }
    }
}
?>