<?php
session_start();
include('../Utils/conexion.php');

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$observacion = $_POST['obs'];

mysqli_query($datos_base, "INSERT INTO SOLICITUDES VALUES (DEFAULT, '$producto', '$cantidad', '$observacion', '$fechaActual', 1, 0)");

header("Location: ../Sistema/Stock/stock.php?pedido");
mysqli_close($datos_base);
?>