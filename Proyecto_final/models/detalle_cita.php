<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

function obtenerDetalleCita($id_Paciente) {
    global $conn;
    $sql_cita = "SELECT  
                    p.Nombre AS Nombre_Paciente,
                    p.Apellido AS Apellido_Paciente,
                    p.Fecha_Nacimiento,
                    h.Diagnostico,
                    h.Alergias,
                    h.Enfermedades_Cronicas,
                    h.Cirugias_Previas,
                    h.Medicamentos_Actuales,
                    h.Grupo_Sanguineo,
                    h.Antecedentes_Familiares,
                    h.Vacunas,
                    h.Ultima_Actualizacion,
                    a.Motivo AS Motivo_Consulta,
                    a.Diagnostico AS Diagnostico_Atencion,
                    a.Fecha AS Fecha_Atencion,
                    t.Detalle AS Tratamiento,
                    t.Estado AS Estado_Tratamiento,
                    c.Estado AS Estado_Cita,
                    c.Observacion AS Observacion,
                    c.id_Cita AS id_Cita,
                    h.id_Historial
                FROM 
                    Paciente p
                LEFT JOIN 
                    Usuario u ON p.id_Usuario = u.id_Usuario
                LEFT JOIN 
                    Historial_medico h ON p.id_Paciente = h.id_Paciente
                LEFT JOIN 
                    Cita c ON u.id_Usuario = c.id_Usuario
                LEFT JOIN 
                    Atencion_medica a ON c.id_Cita = a.id_Cita
                LEFT JOIN 
                    Tratamiento t ON a.id_atencion_medica = t.id_atencion_medica
                LEFT JOIN 
                    Receta r ON t.id_tratamiento = r.id_tratamiento
                LEFT JOIN 
                    Laboratorio l ON h.id_Historial = l.id_Historial
                WHERE 
                    p.id_Paciente = $id_Paciente
                ORDER BY
                    t.id_tratamiento, r.Fecha_Emision";
    
    return $conn->query($sql_cita);
}

function obtenerTratamientosRecetas($id_Paciente) {
    global $conn;
    $sql_tratamientos_recetas = "
        SELECT 
            t.id_tratamiento,
            t.Detalle AS Tratamiento,
            t.Estado AS Estado_Tratamiento,
            r.Descripcion AS Receta,
            r.Fecha_Emision AS Fecha_Receta
        FROM 
            Tratamiento t
        LEFT JOIN 
            Receta r ON t.id_tratamiento = r.id_tratamiento
        LEFT JOIN 
            Atencion_medica a ON t.id_atencion_medica = a.id_atencion_medica
        LEFT JOIN 
            Cita c ON a.id_Cita = c.id_Cita
        LEFT JOIN 
            Paciente p ON c.id_Usuario = p.id_Usuario
        WHERE 
            p.id_Paciente = $id_Paciente
        ORDER BY 
            t.id_tratamiento, r.Fecha_Emision";
    
    return $conn->query($sql_tratamientos_recetas);
}

function obtenerLaboratorios($id_Paciente) {
    global $conn;
    $sql_laboratorios = "
        SELECT 
            l.id_Laboratorio AS id_laboratorio,
            l.Nombre AS Laboratorio_Nombre,
            l.Direccion AS Laboratorio_Direccion
        FROM 
            Laboratorio l
        LEFT JOIN 
            Historial_medico h ON l.id_Historial = h.id_Historial
        LEFT JOIN 
            Paciente p ON h.id_Paciente = p.id_Paciente
        WHERE 
            p.id_Paciente = $id_Paciente";
    
    return $conn->query($sql_laboratorios);
}
?>