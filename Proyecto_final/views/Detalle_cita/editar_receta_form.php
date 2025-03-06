<?php
include '../../includes/conexion.php';

$id_tratamiento = isset($_GET['id_tratamiento']) ? $_GET['id_tratamiento'] : 0;
$id_Paciente = isset($_GET['id_Paciente']) ? $_GET['id_Paciente'] : 0;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

$sql_receta = "SELECT * FROM Receta WHERE id_tratamiento = $id_tratamiento AND Fecha_Emision = '$fecha'";

$result_receta = $conn->query($sql_receta);


if ($result_receta->num_rows > 0) {
    $receta = $result_receta->fetch_assoc();
    $id_receta = $receta['id_receta'];
} else {
    echo "No se encontró la receta para editar.";
    exit;
}


$conn->close();
?>


<form action="guardar_receta.php" method="POST">
    <input type="hidden" name="id_tratamiento" value="<?php echo $id_tratamiento; ?>">
    <input type="hidden" name="id_receta" value="<?php echo $id_receta; ?>">
    <input type="hidden" name="id_Paciente" value="<?php echo $id_Paciente; ?>">
    <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">

    
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"><?php echo $receta['Descripcion']; ?></textarea>
    </div>
    
    <div>
        <label for="fecha_emision">Fecha de Emisión:</label>
        <input type="date" name="fecha_emision" id="fecha_emision" value="<?php echo $receta['Fecha_Emision']; ?>">
    </div>
    <?php if (isset($_GET['actualizado'])): ?>
        <p style="color: green; text-align: center;">¡Receta actualizada correctamente!</p>
    <?php endif; ?>

    <button type="submit">Guardar Cambios</button>
</form>
