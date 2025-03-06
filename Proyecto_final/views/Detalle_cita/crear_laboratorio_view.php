
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Laboratorio</title>
    
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
   
    <div class="container bg-black bg-opacity-50 p-12 rounded-lg shadow-lg w-full max-w-4xl mt-12">
        <h1 class="text-2xl font-bold mb-8 text-center">Crear Laboratorio</h1>

      
        <form method="POST">
            <div class="mb-6">
                <label for="nombre_laboratorio" class="block text-sm font-medium mb-2">Nombre del Laboratorio:</label>
                <input
                    type="text"
                    id="nombre_laboratorio"
                    name="nombre_laboratorio"
                    class="w-full p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                />
            </div>

            <div class="mb-6">
                <label for="direccion_laboratorio" class="block text-sm font-medium mb-2">Dirección del Laboratorio:</label>
                <input
                    type="text"
                    id="direccion_laboratorio"
                    name="direccion_laboratorio"
                    class="w-full p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"
                    required
                />
            </div>

            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
            >
                Crear Laboratorio
            </button>
        </form>
    </div>
</body>
</html>