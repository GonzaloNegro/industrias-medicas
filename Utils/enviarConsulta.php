<?php
include('conexion.php');

$nombre =$_POST['nombre'];
$email =$_POST['email'];
$tel =$_POST['tel'];
$asunto = $_POST['asunto'];
$mensaje =$_POST['consulta'];

$destinatario = 'info@industriasmedicas.com';
$header = 'Enviado desde Industrias Médicas.';

$mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("location: ../Principal/home.php?ok");
mysqli_close($datos_base);
?>

