<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
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
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/medic.jpg'); /* Cambia esto por la ruta de tu imagen */
            background-size: cover;
            background-position: center;
            color: black;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            text-align: center;
            color: black;
        }
        .input-field {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            color: black;
            outline: none;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: black;
        }
        .btn {
            background: #8a2be2;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-weight: bold;
            transition: all 0.3s ease;
            color: white;
        }
        .btn:hover {
            background: #6a1bbd;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container w-full max-w-md">
        <h1 class="text-2xl font-bold mb-8">Editar Cita</h1>
        <form action="/Clinica_D_sistemas2/Proyecto_final/controllers/CitaController.php?id_Paciente=<?php echo $id_Paciente; ?>" method="POST">
            <div class="mb-6">
                <label for="estado_cita" class="block text-sm font-medium mb-2">Estado de la Cita:</label>
                <select id="estado_cita" name="estado_cita" class="input-field" required>
                    <option value="Pendiente" <?php echo $cita['Estado'] == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="Atendida" <?php echo $cita['Estado'] == 'Atendida' ? 'selected' : ''; ?>>Atendida</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="observacion" class="block text-sm font-medium mb-2">Observación:</label>
                <textarea id="observacion" name="observacion" rows="3" class="input-field" required><?php echo $cita['Observacion']; ?></textarea>
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>
</body>
</html>
