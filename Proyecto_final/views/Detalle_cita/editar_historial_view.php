

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Historial Médico</title>
    
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
            background-image: url('/Clinica_D_sistemas2/Proyecto_final/src/medico.jpg'); 
            background-size: cover;
            background-position: center;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container bg-black bg-opacity-50 p-8 rounded-lg shadow-lg w-full max-w-2xl"">
    <h1 class="text-2xl font-bold mb-6 text-center">Editar Historial Médico</h1>

       
        <form method="POST" action="">

        <div class="mb-4">
                <label for="diagnostico" class="block text-sm font-medium mb-2">Diagnóstico:</label>
                <textarea name="diagnostico" class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"id="diagnostico"><?php echo $historial['Diagnostico']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="alergias" class="block text-sm font-medium mb-2">Alergias:</label>
                <textarea name="alergias" class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"id="alergias"><?php echo $historial['Alergias']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="enfermedades_cronicas "class="block text-sm font-medium mb-2 >Enfermedades"> Crónicas:</label>
                <textarea name="enfermedades_cronicas" class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"id="enfermedades_cronicas"><?php echo $historial['Enfermedades_Cronicas']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="cirugias_previas" class="block text-sm font-medium mb-2">Cirugías Previas:</label>
                <textarea name="cirugias_previas" class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50"id="cirugias_previas"><?php echo $historial['Cirugias_Previas']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="medicamentos_actuales" class="block text-sm font-medium mb-2">Medicamentos Actuales:</label>
                <textarea name="medicamentos_actuales"class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50" id="medicamentos_actuales"><?php echo $historial['Medicamentos_Actuales']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="grupo_sanguineo"  class="block text-sm font-medium mb-2">Grupo Sanguíneo:</label>
                <input type="text" name="grupo_sanguineo"class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50" id="grupo_sanguineo" value="<?php echo $historial['Grupo_Sanguineo']; ?>">
            </div>

            <div class="mb-4">
                <label for="antecedentes_familiares"  class="block text-sm font-medium mb-2">Antecedentes Familiares:</label>
                <textarea name="antecedentes_familiares"class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50" id="antecedentes_familiares"><?php echo $historial['Antecedentes_Familiares']; ?></textarea>
            </div>

            <div class="campo">
                <label for="vacunas"  class="block text-sm font-medium mb-2">Vacunas:</label>
                <textarea name="vacunas"class="w-full p-2 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-50" id="vacunas"><?php echo $historial['Vacunas']; ?></textarea>
            </div>

            <button type="submit"class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
