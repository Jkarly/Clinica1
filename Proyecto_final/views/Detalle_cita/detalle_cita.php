<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/doci.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        .section {
            max-width: 800px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .section:hover {
            transform: translateY(-5px); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .detalle-cita {
            margin-bottom: 20px;
        }
        .detalle-cita div {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .detalle-cita strong {
            font-weight: bold;
            color: #333;
        }
        .historial-medico table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .historial-medico th, .historial-medico td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word;  
        }
        .historial-medico th {
            background-color: #007BFF;
            color: white;
        }
        .estado-cita {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .estado-pendiente {
            background-color: purple;
            color: white;
        }
        .estado-atendida {
            background-color: blue;
            color: white;
        }

        .button-edit,
        .button-create,
        .button-download {
            background: #007bff; 
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin: 5px;
            transition: background 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .button-edit:hover,
        .button-create:hover {
            background: #0056b3; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .button-download {
            background: #003366; 
        }

        .button-download:hover {
            background: #001f4d; 
        }

    </style>
</head>
<body>
    <!-- Sección 1: Detalle de la Cita -->
    <div class="section">
        <h1>Detalle de la Cita</h1>
        <div class="detalle-cita">
            <table>
                <tr>
                    <th>Id Cita</th>
                    <th>Observación</th>
                    <th>Estado de la Cita</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <td><?php echo $cita['id_Cita'] ?? 'No disponible'; ?></td>
                    <td><?php echo $cita['Observacion'] ?? 'No disponible'; ?></td>
                    <td>
                        <span class="estado-cita 
                            <?php echo ($cita['Estado_Cita'] == 'Pendiente') ? 'estado-pendiente' : 'estado-atendida'; ?>">
                            <?php echo $cita['Estado_Cita'] ?? 'No disponible'; ?>
                        </span>
                    </td>
                    <td>
                        <button class="button-edit" onclick="editarCita(<?php echo $id_Paciente; ?>)">Editar</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<!-- Sección 2: Historia Médica -->
<div class="section">
    <h1>Historia Médica</h1>

   
    <?php if (empty($cita['id_Historial'])): ?>
        <button class="button-create" onclick="crearHistorial(<?php echo $id_Paciente; ?>)">
            Crear Historial
        </button>
    <?php endif; ?>

   
    <?php if (!empty($cita['id_Historial'])): ?>
        <a href="/Clinica_D_sistemas2/Proyecto_final/controllers/EditarHistorialController.php?id_Historial=<?php echo $cita['id_Historial']; ?>&id_Paciente=<?php echo $id_Paciente; ?>">
            <button class="button-edit">Editar Historial</button>
        </a>
    <?php endif; ?>

    
    <?php if (!empty($cita['id_Historial'])): ?>
        <div class="detalle-cita">
            <a href="/Clinica_D_sistemas2/Proyecto_final/controllers/descargar_historial.php?id_Paciente=<?php echo $id_Paciente; ?>">
                <button class="button-download">Descargar Historial Médico</button>
            </a>
        </div>
    <?php endif; ?>

   
    <div class="detalle-cita">
        <div><strong>Nombre del Paciente:</strong> <span><?php echo $cita['Nombre_Paciente'] . " " . $cita['Apellido_Paciente'] ?? 'No disponible'; ?></span></div>
        <div><strong>Fecha de Nacimiento:</strong> <span><?php echo $cita['Fecha_Nacimiento'] ?? 'No disponible'; ?></span></div>
        <div><strong>Diagnóstico:</strong> <span><?php echo $cita['Diagnostico'] ?? 'No disponible'; ?></span></div>
        <div><strong>Alergias:</strong> <span><?php echo $cita['Alergias'] ?? 'No disponible'; ?></span></div>
        <div><strong>Enfermedades Crónicas:</strong> <span><?php echo $cita['Enfermedades_Cronicas'] ?? 'No disponible'; ?></span></div>
        <div><strong>Cirugías Previas:</strong> <span><?php echo $cita['Cirugias_Previas'] ?? 'No disponible'; ?></span></div>
        <div><strong>Medicamentos Actuales:</strong> <span><?php echo $cita['Medicamentos_Actuales'] ?? 'No disponible'; ?></span></div>
        <div><strong>Grupo Sanguíneo:</strong> <span><?php echo $cita['Grupo_Sanguineo'] ?? 'No disponible'; ?></span></div>
        <div><strong>Antecedentes Familiares:</strong> <span><?php echo $cita['Antecedentes_Familiares'] ?? 'No disponible'; ?></span></div>
        <div><strong>Vacunas:</strong> <span><?php echo $cita['Vacunas'] ?? 'No disponible'; ?></span></div>
        <div><strong>Diagnóstico de Atención:</strong> <span><?php echo $cita['Diagnostico_Atencion'] ?? 'No disponible'; ?></span></div>
        <div><strong>Fecha de Atención:</strong> <span><?php echo $cita['Fecha_Atencion'] ?? 'No disponible'; ?></span></div>
    </div>
</div>

    <!-- Sección 3: Tratamientos y Recetas -->
    <div class="section">
        <h1>Tratamientos y Recetas</h1>
        <button class="button-create" onclick="crearTratamiento(<?php echo $id_Paciente; ?>, <?php echo $cita['id_Historial']; ?>)">
            Crear Tratamiento
        </button>
        <table>
            <tr>
                <th>ID Tratamiento</th>
                <th>Tratamiento</th>
                <th>Estado</th>
                <th>Recetas</th>
                <th>Acción</th>
            </tr>
            <?php 
            foreach ($tratamientos_recetas as $id_tratamiento => $recetas_del_tratamiento) {
                $tratamiento = $recetas_del_tratamiento[0]['tratamiento']; 
                echo "<tr>
                        <td>" . $id_tratamiento . "</td>
                        <td>" . $tratamiento . "</td>
                        <td>" . ($recetas_del_tratamiento[0]['estado'] ?? 'No disponible') . "</td>
                        <td>";
                foreach ($recetas_del_tratamiento as $index_receta => $receta) {
                    $fecha = $receta['fecha'] ?? 'No disponible';
                    $descripcion = $receta['descripcion'] ?? 'No disponible';
                    if ($fecha === 'No disponible' || $descripcion === 'No disponible') {
                        echo "<button class='button-create' onclick='crearReceta($id_Paciente, $id_tratamiento)'>Crear Receta</button>";
                    } else {
                        echo "<div><strong>Fecha:</strong> <span>" . $fecha . "</span></div>";
                        echo "<div><strong>Descripción:</strong> <span>" . $descripcion . "</span></div>";
                        echo "<a href='/Clinica_D_sistemas2/Proyecto_final/controllers/EditarRecetaController.php?id_tratamiento=" . $id_tratamiento . "&id_Paciente=" . $id_Paciente . "&fecha=" . $fecha . "'> 
                            <button class='button-edit'>Editar Receta</button>
                        </a>";
                        echo '<a href="/Clinica_D_sistemas2/Proyecto_final/controllers/RecetaPDFController.php?id_Paciente=' . $id_Paciente . '&tratamiento=' . urlencode($tratamiento) . '&index=' . $index_receta . '" target="_blank">
                            <button class="button-download">Descargar Receta</button>
                        </a>';
                    }
                }
                echo "</td>
                    <td>
                        <a href='/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/editar_tratamientos.php?id_tratamiento=" . $id_tratamiento . "&id_Paciente=" . $id_Paciente . "'>
                            <button class='button-edit'>Editar Tratamiento</button>
                        </a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>

    <!-- Sección 4: Laboratorios -->
    <div class="section">
        <h1>Laboratorios</h1>
        <button class="button-create" onclick="crearLaboratorio(<?php echo $id_Paciente; ?>, <?php echo $cita['id_Historial']; ?>)">
            Crear Laboratorio
        </button>
        <?php if (count($laboratorios) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Editar Laboratorio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laboratorios as $laboratorio): ?>
                        <tr>
                            <td><?php echo $laboratorio['Laboratorio_Nombre']; ?></td>
                            <td><?php echo $laboratorio['Laboratorio_Direccion']; ?></td>
                            <td>
                                <button class="button-edit" onclick="editarLaboratorio(<?php echo $laboratorio['id_laboratorio']; ?>, <?php echo $id_Paciente; ?>)">
                                    Editar Laboratorio
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay laboratorios asociados a esta cita.</p>
        <?php endif; ?>
    </div>

    <script>
        function editarCita(idPaciente) {
            window.location.href = '/Clinica_D_sistemas2/Proyecto_final/controllers/CitaController.php?id_Paciente=' + idPaciente;
        }

        function crearHistorial(idPaciente) {
            window.location.href = '/Clinica_D_sistemas2/Proyecto_final/controllers/crear_historial_controller.php?id_Paciente=' + idPaciente;
        }

        function crearTratamiento(idPaciente, idHistorial) {
            window.location.href = '/Clinica_D_sistemas2/Proyecto_final/views/Detalle_cita/crear_tratamiento.php?id_Paciente=' + idPaciente + '&id_historial_medico=' + idHistorial;
        }

        function crearReceta(idPaciente, idTratamiento) {
            window.location.href = '/Clinica_D_sistemas2/Proyecto_final/controllers/RecetaControllerCrear.php?id_Paciente=' + idPaciente + '&id_tratamiento=' + idTratamiento;
        }

        function crearLaboratorio(idPaciente, idHistorial) {
            window.location.href = '/Clinica_D_sistemas2/Proyecto_final/controllers/LaboratorioController.php?id_Paciente=' + idPaciente + '&id_Historial=' + idHistorial;
        }

        function editarLaboratorio(idLaboratorio, idPaciente) {
            window.location.href = '/Clinica_D_sistemas2/Proyecto_final/controllers/EditarLaboratorioController.php?id_laboratorio=' + idLaboratorio + '&id_paciente=' + idPaciente;
        }
    </script>
</body>
</html>