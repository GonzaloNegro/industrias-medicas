<?php
session_start();
include('../Utils/conexion.php');

/*TRAIGO LOS DATOS DE QUIEN INGRESO AL SISTEMA*/
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario, nombre FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

/*GUARDO LOS DATOS DEL ID_RESOLUTOR EN UNA VARIABLE*/
$idUsu = $row['idUsuario'];
$nombre = $row['nombre'];

$id = $_POST['nroRecibo'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

if(isset($_POST['uno'])){
    $valor = 1;
}elseif(isset($_POST['dos'])){
    $valor = 2;
}elseif(isset($_POST['tres'])){
    $valor = 3;
}elseif(isset($_POST['cuatro'])){
    $valor = 4;
}elseif(isset($_POST['cinco'])){
    $valor = 5;
}

/* valoracionventa INSERTAR*/
mysqli_query($datos_base, "INSERT INTO valoracionventa VALUES (DEFAULT, '$id', '$valor')");

/* ENVIO DE MAIL */
$header = 'Enviado desde Industrias Médicas';
$asunto = "Recibo N°:".$id." recibido y valoración registrada";
$fec = date("d-m-Y", strtotime($fechaActual));
$destinatario = 'gonzalonnegro@gmail.com';
$mensaje = "El día ".$fec." la Obra social: ".$nombre." ha verificado el recibo N°".$id." generado por Industrias Médicas y valorado el proceso de venta.\nIngrese a https://indumedsa.com.ar/ para ver mas detalles.";
$mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";

mail($destinatario, $asunto, $mensajeCompleto, $header);
header("Location: ../Sistema/Ventas/recibo.php?valorado");
mysqli_close($datos_base);
?>