<?php

if (!isset($_GET['monto'])) {
    die("Error: Monto no especificado.");
}

$monto = htmlspecialchars($_GET['monto']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con Tarjeta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/fondo2.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex justify-center items-center h-screen">

   
    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-md w-full max-w-4xl flex space-x-8">

    
        <div class="w-1/2">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Pago con Tarjeta</h2>
            <form id="paymentForm" method="POST" action="">
               
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Monto a pagar:</label>
                    <input type="text" id="monto" name="monto" value="$<?= $monto; ?>" class="w-full p-3 border rounded-md bg-gray-200 text-gray-800" readonly required>
                </div>

             
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Número de Tarjeta:</label>
                    <input type="text" id="tarjeta" name="tarjeta" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="1234 5678 9012 3456" required>
                </div>

                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Expiración:</label>
                    <input type="month" id="expiracion" name="expiracion" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" required>
                </div>

            
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">CVV:</label>
                    <input type="text" id="cvv" name="cvv" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="123" required>
                </div>

           
                <button type="button" onclick="guardarReserva('pago')" class="w-full bg-blue-500 text-white font-bold py-3 rounded-md hover:bg-blue-600 transition">
                    Guardar
                </button>
            </form>
         
            <div id="mensajeExito" class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-md hidden">
                ¡Reserva creada con éxito!
            </div>
        </div>

   
        <div class="w-4"></div>

      
        <div class="w-1/2">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-6">Escanea el QR para más detalles</h3>
            <img src="/Clinica_D_sistemas2/Proyecto_final/src/qr.png" alt="QR Code" class="mx-auto mt-4 w-96 h-96 rounded-md shadow-lg">
            <form action="C:/xampp/htdocs/Clinica_D_sistemas2/Proyecto_final/index.php" method="get" class="mt-4">
                <button type="button" onclick="guardarReserva('qr')" class="w-full bg-blue-500 text-white font-bold py-3 rounded-md hover:bg-blue-600 transition">
                    Enviar Comprobante
                </button>
            </form>
            <div id="mensajeQR" class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-md hidden">
                ¡Se envió el QR con éxito!
            </div>
        </div>

    </div>

    <script>
        function guardarReserva(tipo) {
           
            var tarjeta = document.getElementById("tarjeta").value;
            var expiracion = document.getElementById("expiracion").value;
            var cvv = document.getElementById("cvv").value;

           
            if (tarjeta === "" || expiracion === "" || cvv === "") {
                alert("Por favor, complete todos los campos.");
                return; 
            }

           
            if (tipo === 'pago') {
                document.getElementById("mensajeExito").classList.remove("hidden");
            } else if (tipo === 'qr') {
                document.getElementById("mensajeQR").classList.remove("hidden");
            }

           
            setTimeout(function() {
                window.location.href = "/Clinica_D_sistemas2/Proyecto_final/views/login.php";
            }, 2000);
        }
    </script>

</body>
</html>