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
$sql = "SELECT idUsuario, usuario FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

/*GUARDO LOS DATOS DEL ID_RESOLUTOR EN UNA VARIABLE*/
$idUsu = $row['idUsuario'];

$id = $_POST['idnro'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

if(isset($_POST['aceptar'])){
/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 8 WHERE idDocumento = '$id'");


    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 3";
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
    echo $diasRedondedos;

/* movimientodocumento INSERTAR nuevo estado y fecha de vencimiento */
mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 8, '$fechaActual', '0000-00-00', '$diasRedondedos')");

$header = 'Enviado desde Industrias Médicas';
$asunto = "Orden de compra N°".$id." aprobada - Envío a depósito para verificación";
$fec = date("d-m-Y", strtotime($fechaActual));
$mensaje = "El día ".$fec." Industrias Médicas ha aprobado la orden de compra del documento N°".$id." y se ha enviado a depósito para verificar disponibilidad de los productos solicitados.\nPor favor ingrese a https://indumedsa.com.ar/ y verifique la nueva solicitud.";
$destinatario = 'info@industriasmedicas.com';

$mensajeCompleto = $mensaje . "\nIndustrias Médicas";

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("Location: ../Sistema/Ventas/ordenCompra.php?deposito");
}


/* RECHAZO */
if(isset($_POST['rechazo'])){
    /* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 9 WHERE idDocumento = '$id'");


/* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

$sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 3";
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
echo $diasRedondedos;

/* movimientodocumento INSERTAR nuevo estado y fecha de vencimiento */
mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 9, '$fechaActual', '0000-00-00', '$diasRedondedos')");

$header = 'Enviado desde Industrias Médicas';
$asunto = "Orden de compra N°".$id." rechazada";
$fec = date("d-m-Y", strtotime($fechaActual));
$mensaje = "El día ".$fec." Industrias Médicas ha rechazado la orden de compra del documento N°".$id.".\nPor favor ingrese a https://indumedsa.com.ar/ para ver mas detalles.";
$destinatario = 'info@industriasmedicas.com';
$mensajeCompleto = $mensaje . "\nIndustrias Médicas";

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("Location: ../Sistema/Ventas/ordenCompra.php?rechazo");
}


mysqli_close($datos_base);
?>