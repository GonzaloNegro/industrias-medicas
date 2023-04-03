<?php
include('conexion.php');
include('./functions.php');

$nombre = limpiar_cadena($_POST['nombre']);
$email = limpiar_cadena($_POST['email']);
$tel = limpiar_cadena($_POST['tel']);
$asunto = limpiar_cadena($_POST['asunto']);
$mensaje = limpiar_cadena($_POST['consulta']);

$destinatario = 'info@industriasmedicas.com';
$header = 'Enviado desde Industrias Médicas';

$mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre . "\nTeléfono: " . $tel . "\nCorreo: " . $email;

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("location: ../Principal/home.php?ok");
mysqli_close($datos_base);
?>

