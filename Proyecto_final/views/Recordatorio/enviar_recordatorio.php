<?php
include 'C:\xampp\htdocs\Clinica_D_sistemas2\Proyecto_final\includes\conexion.php';


$sid = ''; 
$token = ''; 
$from = ''; 
$sql = "SELECT 
            U.id_Usuario,
            U.Alias,
            U.Telefono,
            U.Correo,
            P.id_Paciente,
            P.Nombre AS Nombre_Paciente,
            P.Apellido AS Apellido_Paciente,
            H.Fecha AS Fecha_Cita,
            H.Hora_Inicio AS Hora_Inicio_Cita,
            H.Hora_Fin AS Hora_Fin_Cita
        FROM Usuario U
        JOIN Paciente P ON U.id_Usuario = P.id_Usuario
        JOIN Cita C ON U.id_Usuario = C.id_Usuario
        JOIN Horarios H ON C.id_Horario = H.id_Horario
        WHERE H.Fecha = CURDATE() + INTERVAL 1 DAY
        ORDER BY H.Hora_Inicio";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
       
        $nombre = $row['Nombre_Paciente'] . ' ' . $row['Apellido_Paciente'];
        $fecha = $row['Fecha_Cita'];
        $hora_inicio = $row['Hora_Inicio_Cita'];
        $hora_fin = $row['Hora_Fin_Cita'];
        $telefono = trim($row['Telefono']); 
        echo($telefono);
       
        if (!empty($telefono) && is_numeric($telefono)) {
            $to = "whatsapp:+59167966970"; 

           
            $body = "Hola $nombre, te recordamos que tienes una cita programada el $fecha de $hora_inicio a $hora_fin.";

        
            $url = "https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json";

          
            $data = array(
                'From' => $from,
                'To' => $to,
                'Body' => $body
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_USERPWD, "$sid:$token");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

            $response = curl_exec($ch);

          
            if (curl_errno($ch)) {
                echo "No se pudo enviar el mensaje a $nombre ($telefono): " . curl_error($ch) . "<br>";
            } else {
               
                $response_data = json_decode($response, true);

               
                if (isset($response_data['sid'])) {
                    echo "Mensaje enviado correctamente a $nombre ($telefono).<br>";
                } else {
                    echo "Error al enviar el mensaje a $nombre ($telefono): " . $response_data['message'] . "<br>";
                }
            }
            curl_close($ch);
        } else {
            echo "El paciente $nombre no tiene un número de teléfono válido registrado.<br>";
        }
    }
} else {
    echo "No hay citas programadas para mañana.";
}


$conn->close();
?>
