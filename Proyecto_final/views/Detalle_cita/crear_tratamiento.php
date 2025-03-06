<?php
include '../../includes/conexion.php';

$id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;
$id_historial_medico = isset($_GET['id_historial_medico']) ? $_GET['id_historial_medico'] : 0;

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $detalle = $_POST['detalle'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO Tratamiento (id_atencion_medica, Detalle, Estado, id_historial_medico) 
        VALUES (
            (SELECT id_atencion_medica 
             FROM Atencion_medica 
             WHERE id_Cita = (SELECT id_Cita 
                              FROM Cita 
                              WHERE id_Usuario = (SELECT id_Usuario 
                                                   FROM Paciente 
                                                   WHERE id_Paciente = $id_Paciente) 
                              LIMIT 1)
            ), 
            '$detalle', '$estado', $id_historial_medico
        )";
    
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Tratamiento creado con éxito.";
    } else {
        $mensaje = "Error al crear el tratamiento: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tratamiento</title>
   
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
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/amo.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
    </style>
</head>
<body>
    
    <div class="container bg-black bg-opacity-50 p-12 rounded-lg shadow-lg w-full lg:w-3/4 xl:w-2/3">
        <h1 class="text-2xl font-bold mb-6 text-center">Crear Tratamiento</h1>

        <?php if (!empty($mensaje)): ?>
            <div id="mensaje" class="mb-6 p-4 bg-green-500 text-white rounded-lg text-center">
                <?php echo $mensaje; ?>
            </div>
            <script>
               
                setTimeout(function() {
                    window.location.href = '/Clinica_D_sistemas2/Proyecto_final/controllers/DetalleCitaController.php?id_Paciente=<?php echo $id_Paciente; ?>';
                }, 2000); 
            </script>
        <?php else: ?>
           
            <form method="POST">
                <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_Paciente']; ?>">

                <div class="mb-6">
                    <label for="detalle" class="block text-sm font-medium mb-2">Detalle del Tratamiento:</label>
                    <input
                        type="text"
                        id="detalle"
                        name="detalle"
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
                        <option value="Pendiente">Pendiente</option>
                        <option value="Completado">Completado</option>
                    </select>
                </div>

                <button
                    type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
                >
                    Crear Tratamiento
                </button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>