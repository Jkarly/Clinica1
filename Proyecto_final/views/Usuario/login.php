<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #3b82f6, #8b5cf6), url('proyecto2.0/hospital.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex justify-center items-center h-screen">
  
    <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-2xl w-full max-w-md transform transition-all hover:scale-105">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Inicio de Sesión</h2>

   
        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

       
        <form action="/Clinica_D_sistemas2/Proyecto_final/controllers/LoginControllers.php" method="POST" class="space-y-6">
        
            <div>
                <label for="alias" class="block text-sm font-medium text-gray-700 mb-2">Usuario:</label>
                <input
                    type="text"
                    name="alias"
                    id="alias"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Ingresa tu usuario"
                >
            </div>

       
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña:</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Ingresa tu contraseña"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-all focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Iniciar Sesión
            </button>
        </form>
    </div>
</body>
</html>