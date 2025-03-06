<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda Semanal - <?php echo ucfirst($mes_actual); ?></title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #6C8EBF, #87CEEB); /* Degradado de azul y celeste */
        margin: 0;
        padding: 20px;
        color: #2c3e50; /* Azul grisáceo para el texto */
    }
    .container {
        width: 100%;  /* Ocupa todo el ancho disponible */
        max-width: none; /* Elimina el límite máximo */
        margin: 0;
        padding: 20px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .header h1 {
        color: #2c3e50; /* Azul grisáceo */
    }
    .agenda {
        display: flex;
        overflow-x: auto;
        padding-bottom: 10px;
        gap: 20px;
        scrollbar-color: #87CEEB #6C8EBF; /* Celeste y azul */
    }
    .columna {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.1);
        min-width: 280px; /* Ancho mínimo para cada columna */
        text-align: center;
        flex: 0 0 auto; /* Evita que las columnas se estiren */
    }
    .columna h3 {
        background: #6C8EBF; /* Azul pastel */
        color: white;
        padding: 12px;
        border-radius: 10px;
        font-size: 20px;
    }
    .citas-container {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .cita {
        background: #E3F2FD; /* Celeste muy claro */
        padding: 15px;
        border-radius: 12px;
        box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.1);
        cursor: grab;
        border-left: 5px solid #64B5F6; /* Celeste suave */
        text-align: left;
    }
    .cita:hover {
        background: #BBDEFB; /* Celeste más claro al pasar el mouse */
    }
    .cita strong {
        display: block;
        color: #2c3e50; /* Azul grisáceo */
    }
    .cita span {
        color: #2196F3; /* Azul medio */
        font-weight: bold;
    }
    .cita a {
        display: inline-block;
        background: #64B5F6; /* Celeste pastel */
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
    }
    .cita a:hover {
        background: #42A5F5; /* Celeste más oscuro al pasar el mouse */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    .no-citas {
        color: #d32f2f; /* Rojo suave para advertencias */
        font-weight: bold;
    }
    @media (max-width: 758px) {
        .agenda {
            flex-wrap: nowrap; /* Evita que las columnas se envuelvan en móviles */
        }
        .columna {
            min-width: 220px; /* Ancho mínimo para móviles */
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Agenda Semanal - <?php echo ucfirst($mes_actual); ?></h1>
        </div>
        <div class="agenda">
            <?php
            setlocale(LC_TIME, "es_ES.UTF-8"); 
            $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
            foreach ($dias as $index => $dia) {
                $fecha_actual = (clone $inicio_semana)->modify("+$index days");
                $fecha_dia = $fecha_actual->format('Y-m-d');
                echo "<div class='columna'>";
                echo "<h3>$dia ({$fecha_actual->format('d')})</h3>";
                if (isset($citas_por_dia[$fecha_dia])) {
                    echo "<div class='citas-container'>";
                    foreach ($citas_por_dia[$fecha_dia] as $cita) {
                        echo "<div class='cita'>";
                        echo "<strong>Hora:</strong> <span>{$cita['Hora_Inicio']} - {$cita['Hora_Fin']}</span><br>";
                        echo "<strong>Paciente:</strong> <span>{$cita['paciente_nombre']}</span><br>";
                        echo "<strong>Especialidad:</strong> <span>{$cita['especialidad_nombre']}</span><br>";
                        echo "<a href='/Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Cita={$cita['id_Cita']}&id_Paciente={$cita['id_Paciente']}'>Ver detalle</a>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<p class='no-citas'>No hay citas para hoy.</p>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>