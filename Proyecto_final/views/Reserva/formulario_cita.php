<?php
session_start();
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/ReservaModel.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

// Crear la conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear una instancia del modelo de Reserva
$reservaModel = new ReservaModel($conn);

// Obtener las especialidades
$especialidades = $reservaModel->obtenerEspecialidades();

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
    <style>
        body {
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/fondo.jpg');
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat; 
        }
    </style>
    <script>
        function cargarMedicos() {
            var especialidadId = document.getElementById("id_Especialidad").value;
            if (especialidadId) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "/Clinica_D_sistemas2/Proyecto_final/controllers/obtener_medicos.php?especialidad_id=" + especialidadId, true);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        document.getElementById("medicosDiv").innerHTML = xhr.responseText;
                        document.getElementById("horariosDiv").innerHTML = ""; // Limpiar horarios
                    }
                };
                xhr.send();
            }
        }

        function cargarHorarios() {
            var medicoId = document.getElementById("id_Medico").value;
            if (medicoId) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "/Clinica_D_sistemas2/Proyecto_final/controllers/obtener_horarios.php?medico_id=" + medicoId, true);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        document.getElementById("horariosDiv").innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }

            
            var medicoInfoDivs = document.querySelectorAll("#medicoInfo > div");
            medicoInfoDivs.forEach(function(div) {
                div.style.display = "none";
            });
            var selectedMedicoDiv = document.getElementById("medico_" + medicoId);
            if (selectedMedicoDiv) {
                selectedMedicoDiv.style.display = "block";
            }
        }

        function validarFormulario(event) {
            event.preventDefault(); 

            var especialidadId = document.getElementById("id_Especialidad").value;
            var medicoId = document.getElementById("id_Medico") ? document.getElementById("id_Medico").value : "";
            var horarios = document.getElementsByName("id_Horario");
            
            var horarioSeleccionado = false;
            for (var i = 0; i < horarios.length; i++) {
                if (horarios[i].checked) {
                    horarioSeleccionado = true;
                    break;
                }
            }

            var mensajeError = "";
            if (!especialidadId) {
                mensajeError += "Debe seleccionar una especialidad.\n";
            }
            if (!medicoId) {
                mensajeError += "Debe seleccionar un médico.\n";
            }
            if (!horarioSeleccionado) {
                mensajeError += "Debe seleccionar un horario.\n";
            }

            if (mensajeError) {
                alert(mensajeError);
                return;
            }

           
            document.querySelector("form").submit();
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-2 pt-4 pb-4 "> 
        <div class="max-w-5xl mx-auto bg-white p-10 rounded-lg shadow-md"> 
            <h2 class="text-3xl font-bold mb-8 text-center">Agendar Cita</h2> 
            <form method="POST" action="/Clinica_D_sistemas2/Proyecto_final/controllers/ReservaControllers.php" onsubmit="validarFormulario(event)">
                <div class="mb-8"> 
                    <label for="id_Especialidad" class="block text-xl font-bold text-gray-700 mb-4">Especialidad:</label> 
                    <select name="id_Especialidad" id="id_Especialidad" onchange="cargarMedicos()" class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg" required> <!-- Aumentamos el padding (p-4) y el tamaño del texto (sm:text-lg) -->
                        <option value="">Seleccione una especialidad</option>
                        <?php if (!empty($especialidades)): ?>
                            <?php foreach ($especialidades as $especialidad): ?>
                                <option value="<?= $especialidad['id_Especialidad']; ?>"><?= $especialidad['Nombre']; ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay especialidades disponibles</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div id="medicosDiv" class="mb-8"></div> 
                <div id="horariosDiv" class="mb-8"></div> 

                <div class="flex justify-center">
                    <input type="submit" value="Agendar Cita" class="bg-indigo-600 text-white px-8 py-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-lg">
                </div>
            </form>
        </div>
    </div>
</body>
</html>