<?php
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';
include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/models/ReservaModel.php';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$reservaModel = new ReservaModel($conn);

$medicoId = $_GET['medico_id'];
$horarios = $reservaModel->obtenerHorariosDisponibles($medicoId);

echo '<label for="id_Horario" class="block text-xl font-bold text-gray-700 mb-4">Horarios disponibles:</label>'; // Aumentamos el tamaño del texto a text-xl y añadimos font-bold

if (empty($horarios)) {
    
    echo '<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg" role="alert">'; // Añadimos rounded-lg para bordes redondeados
    echo '<p class="font-medium">No hay horarios disponibles en este momento.</p>';
    echo '</div>';
} else {
   
    echo '<div class="overflow-x-auto">';
    echo '<table class="min-w-full bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden">'; // Añadimos rounded-xl y overflow-hidden para bordes redondeados
    echo '<thead style="background-color: #384B70;">'; 
    echo '<tr>';
    echo '<th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider rounded-tl-xl">Fecha</th>'; // Añadimos rounded-tl-xl para redondear la esquina superior izquierda
    echo '<th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Hora de Inicio</th>';
    echo '<th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Hora de Fin</th>';
    echo '<th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider rounded-tr-xl">Seleccionar</th>'; // Añadimos rounded-tr-xl para redondear la esquina superior derecha
    echo '</tr>';
    echo '</thead>';
    echo '<tbody class="divide-y divide-gray-200">';

    foreach ($horarios as $horario) {
        echo '<tr class="hover:bg-gray-50 transition-colors">';
        echo '<td class="px-6 py-4 text-lg text-gray-700">' . $horario['Fecha'] . '</td>'; 
        echo '<td class="px-6 py-4 text-lg text-gray-700">' . $horario['Hora_Inicio'] . '</td>';
        echo '<td class="px-6 py-4 text-lg text-gray-700">' . $horario['Hora_Fin'] . '</td>';
        echo '<td class="px-6 py-4 flex items-center justify-center">'; 
        echo '<input type="radio" name="id_Horario" value="' . $horario['id_Horario'] . '" required class="form-radio h-6 w-6 text-blue-600 transition duration-150 ease-in-out">'; // Aumentamos el tamaño del radio button
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

$conn->close();
?>