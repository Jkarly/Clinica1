<?php
class ReservaModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerEspecialidades() {
        $query = "SELECT * FROM Especialidad";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

   
    public function obtenerMedicosPorEspecialidad($especialidadId) {
        $query = "SELECT m.id_Medico, m.Nombre, m.Apellido, m.foto 
                  FROM Medico m 
                  JOIN Medico_Especialidad me ON m.id_Medico = me.id_Medico
                  WHERE me.id_Especialidad = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $especialidadId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

   
    public function obtenerHorariosDisponibles($medicoId) {
        $query = "SELECT h.id_Horario, h.Fecha, h.Hora_Inicio, h.Hora_Fin 
                  FROM Horarios h 
                  JOIN Agenda a ON h.id_Agenda = a.id_Agenda 
                  WHERE a.id_Medico = ? AND h.Estado = 'Disponible'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $medicoId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

 
    public function insertarCita($estado, $observacion, $monto, $id_Usuario, $id_Especialidad, $id_Horario) {
        $query = "INSERT INTO Cita (Estado, Observacion, Monto, id_Usuario, id_Especialidad, id_Horario) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssdiii", $estado, $observacion, $monto, $id_Usuario, $id_Especialidad, $id_Horario);
        return $stmt->execute();
    }

   
    public function actualizarEstadoHorario($id_Horario) {
        $query = "UPDATE Horarios SET Estado = 'Reservada' WHERE id_Horario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_Horario);
        return $stmt->execute();
    }
    public function EnviarMonto($id_Usuario) {
        $query = "SELECT c.id_Cita, c.Monto FROM Cita c WHERE c.id_Usuario = ? ORDER BY c.id_Cita DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);  
        $stmt->bind_param("i", $id_Usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        $monto = $row ? $row['Monto'] : 0; 
        return $monto;  
    }    
}
?>