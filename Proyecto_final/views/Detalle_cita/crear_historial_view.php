<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Historial Médico</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 10px; }
        textarea, input[type="text"] { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Historial Médico</h1>
        <form method="POST">
            <label for="diagnostico">Diagnóstico:</label>
            <textarea id="diagnostico" name="diagnostico" required></textarea>

            <label for="alergias">Alergias:</label>
            <textarea id="alergias" name="alergias"></textarea>

            <label for="enfermedadesCronicas">Enfermedades Crónicas:</label>
            <textarea id="enfermedadesCronicas" name="enfermedadesCronicas"></textarea>

            <label for="cirugiasPrevias">Cirugías Previas:</label>
            <textarea id="cirugiasPrevias" name="cirugiasPrevias"></textarea>

            <label for="medicamentosActuales">Medicamentos Actuales:</label>
            <textarea id="medicamentosActuales" name="medicamentosActuales"></textarea>

            <label for="grupoSanguineo">Grupo Sanguíneo:</label>
            <input type="text" id="grupoSanguineo" name="grupoSanguineo">

            <label for="antecedentesFamiliares">Antecedentes Familiares:</label>
            <textarea id="antecedentesFamiliares" name="antecedentesFamiliares"></textarea>

            <label for="vacunas">Vacunas:</label>
            <textarea id="vacunas" name="vacunas"></textarea>

            <button type="submit">Crear Historial</button>
        </form>
    </div>
</body>
</html>