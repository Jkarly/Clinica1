<?php
include '../../includes/conexion.php';


$id_tratamiento = isset($_GET['id_tratamiento']) ? $_GET['id_tratamiento'] : 0;


$sql_tratamiento = "SELECT * FROM Tratamiento WHERE id_tratamiento = $id_tratamiento";
$result_tratamiento = $conn->query($sql_tratamiento);

if ($result_tratamiento->num_rows > 0) {
    $tratamiento = $result_tratamiento->fetch_assoc();
} else {
    echo "Tratamiento no encontrado.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $detalle = $_POST['detalle'];
    $estado = $_POST['estado'];

  
    $sql_update = "UPDATE Tratamiento SET Detalle = '$detalle', Estado = '$estado' WHERE id_tratamiento = $id_tratamiento";
    if ($conn->query($sql_update) === TRUE) {
        header("Location: /Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=" . $_GET['id_Paciente']);
        exit;
    } else {
        echo "Error al actualizar el tratamiento: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tratamiento</title>
  
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
       
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/Hospital.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
    </style>
</head>
<body>
   
    <div class="container bg-black bg-opacity-50 p-12 rounded-lg shadow-lg w-full lg:w-3/4 xl:w-2/3">
        <h1 class="text-2xl font-bold mb-6 text-center">Editar Tratamiento</h1>

        <form method="POST">
            <input type="hidden" name="id_tratamiento" value="<?php echo $id_tratamiento; ?>">

            <div class="mb-6">
                <label for="detalle" class="block text-sm font-medium mb-2">Detalle del Tratamiento:</label>
                <input
                    type="text"
                    id="detalle"
                    name="detalle"
                    value="<?php echo $tratamiento['Detalle']; ?>"
                    class="w-full p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                />
            </div>

            <div class="mb-6">
                <label for="estado" class="block text-sm font-medium mb-2">Estado:</label>
                <select
                    id="estado"
                    name="estado"
                    class="w-full p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                >
                    <option value="Pendiente" <?php echo ($tratamiento['Estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="Completado" <?php echo ($tratamiento['Estado'] == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                </select>
            </div>

            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
            >
                Actualizar Tratamiento
            </button>
        </form>
    </div>
</body>
</html>