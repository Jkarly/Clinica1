<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

function obtenerCitasSemana($inicio_semana, $fin_semana) {
    global $conn;

    $sql = "SELECT c.id_Cita, h.Fecha AS fecha_cita, h.Hora_Inicio, h.Hora_Fin, 
            CONCAT(p.Nombre, ' ', p.Apellido) AS paciente_nombre, 
            e.Nombre AS especialidad_nombre, p.id_Paciente
            FROM Cita c
            JOIN Horarios h ON c.id_Horario = h.id_Horario
            JOIN Paciente p ON c.id_Usuario = p.id_Usuario
            LEFT JOIN Especialidad e ON c.id_Especialidad = e.id_Especialidad
            WHERE h.Fecha BETWEEN '$inicio_semana' AND '$fin_semana'
            ORDER BY h.Fecha, h.Hora_Inicio";

    $result = $conn->query($sql);

    $citas_por_dia = [];
    while ($row = $result->fetch_assoc()) {
        $fecha_cita = $row['fecha_cita'] ?? 'fecha_no_disponible';
        $citas_por_dia[$fecha_cita][] = $row;
    }

    return $citas_por_dia;
}

function obtenerMesActual($fecha) {
    setlocale(LC_TIME, "es_ES.UTF-8"); // Configura el idioma en español
    return strftime('%B', $fecha->getTimestamp()); // Ejemplo: "Julio"
}
?>