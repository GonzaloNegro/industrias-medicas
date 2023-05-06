<?php
session_start();
include('../../Utils/conexion.php');

/*TRAIGO LOS DATOS DE QUIEN INGRESO AL SISTEMA*/
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../../Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario, nombre FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();


$idUsu = $row['idUsuario'];
$nombre = $row['nombre'];

$documento = $_GET['no'];


date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 9 WHERE idDocumento = '$documento'");




    $sent= "SELECT max(fecha) AS fecha FROM movimientodocumento WHERE idDocumento = '$documento';";
    $resultado = $datos_base->query($sent);
    $row = $resultado->fetch_assoc();
    $fechavieja = $row['fecha'];

    $fec1 = $fechavieja;
    $fec2 = $fechaActual;

    $segundosFecha = strtotime($fec1);
    $segundosFecha2 = strtotime($fec2);

    $segundosTranscurridos = $segundosFecha2 - $segundosFecha;
    $minutosTranscurridos = $segundosTranscurridos / 60;
    $horas = $minutosTranscurridos / 60;
    $dias = $horas / 24;
    $diasRedondedos = floor($dias);


mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$documento', 9, '$fechaActual', '0000-00-00', '$diasRedondedos')");


header("Location: ./historicoVentas.php?ok");
mysqli_close($datos_base);
?>