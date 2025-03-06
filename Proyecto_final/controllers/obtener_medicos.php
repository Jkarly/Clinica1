<?php

include_once 'C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/includes/conexion.php';

$especialidadId = $_GET['especialidad_id'];


$query = "SELECT m.id_Medico, m.Nombre, m.Apellido, m.foto, m.descripcion 
          FROM Medico m 
          JOIN Medico_Especialidad me ON m.id_Medico = me.id_Medico
          WHERE me.id_Especialidad = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $especialidadId);
$stmt->execute();
$result = $stmt->get_result();

echo '<label for="id_Medico" class="block text-xl font-bold text-gray-700 mb-4">Médico:</label>';
echo '<select name="id_Medico" id="id_Medico" onchange="cargarHorarios()" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base" required>';
echo '<option value="">Seleccione un médico</option>';

$medicos = [];
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['id_Medico'] . '">' . $row['Nombre'] . ' ' . $row['Apellido'] . '</option>';
    $medicos[] = $row;
}

echo '</select>';

echo '<div id="medicoInfo" class="mt-6">';
foreach ($medicos as $medico) {
    echo '<div id="medico_' . $medico['id_Medico'] . '" class="hidden bg-white p-8 rounded-lg shadow-md">';
    echo '<div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">';
    echo '<div class="flex-shrink-0">'; 
    echo '<img src="' . $medico['foto'] . '" alt="Foto de ' . $medico['Nombre'] . ' ' . $medico['Apellido'] . '" class="w-32 h-32 md:w-48 md:h-48 rounded-full object-cover">'; // Imagen redonda y responsiva
    echo '</div>';
    echo '<div class="text-center md:text-left">';
    echo '<h3 class="text-2xl font-semibold text-gray-800 mb-2">' . $medico['Nombre'] . ' ' . $medico['Apellido'] . '</h3>';
    echo '<p class="text-base text-gray-600">' . $medico['descripcion'] . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';


$stmt->close();
$conn->close();
?>