
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Receta</title>
    
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
   
    <div class="container bg-black bg-opacity-50 p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h1 class="text-2xl font-bold mb-6 text-center">Editar Receta</h1>

       
        <form action="/Clinica_D_sistemas2/Proyecto_final/controllers/EditarRecetaController.php" method="POST">
            <input type="hidden" name="id_tratamiento" value="<?php echo $id_tratamiento; ?>">
            <input type="hidden" name="id_receta" value="<?php echo $receta['id_receta']; ?>">
            <input type="hidden" name="id_Paciente" value="<?php echo $id_Paciente; ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">

            <!-- Campo: Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium mb-2">Descripción:</label>
                <textarea
                    name="descripcion"
                    id="descripcion"
                    class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                ><?php echo $receta['Descripcion']; ?></textarea>
            </div>

            <!-- Campo: Fecha de Emisión -->
            <div class="mb-4">
                <label for="fecha_emision" class="block text-sm font-medium mb-2">Fecha de Emisión:</label>
                <input
                    type="date"
                    name="fecha_emision"
                    id="fecha_emision"
                    value="<?php echo $receta['Fecha_Emision']; ?>"
                    class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                />
            </div>

            <!-- Botón de Guardar Cambios -->
            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300"
            >
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>