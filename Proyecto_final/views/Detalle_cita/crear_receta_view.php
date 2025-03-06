<?php
// views/receta/crear_receta.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Receta</title>
   
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
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/amo.jpg'); /* Cambia esto por la ruta de tu imagen */
            background-size: cover;
            background-position: center;
            color: white;
        }
    </style>
</head>
<body>
   
    <div class="container bg-black bg-opacity-50 p-12 rounded-lg shadow-lg w-full max-w-4xl mt-12">
        <h1 class="text-2xl font-bold mb-8 text-center">Crear Receta</h1>

        
        <form method="POST" action="">
            <div class="mb-6">
                <label for="tratamiento" class="block text-sm font-medium mb-2">Tratamiento:</label>
                <input
                    type="text"
                    id="tratamiento"
                    name="tratamiento"
                    value="<?php echo $tratamiento['Detalle']; ?>"
                    class="w-full p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    disabled
                />
            </div>

            <div class="mb-6">
                <label for="descripcion_receta" class="block text-sm font-medium mb-2">Descripción de la Receta:</label>
                <textarea
                    id="descripcion_receta"
                    name="descripcion_receta"
                    class="w-full p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                ></textarea>
            </div>

            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
            >
                Guardar Receta
            </button>
        </form>
    </div>
</body>
</html>