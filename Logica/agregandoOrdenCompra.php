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

$id = $_POST['idnro'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


if(isset($_POST['aceptar'])){
/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 3 WHERE idDocumento = '$id'");

    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 2";
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
mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 3, '$fechaActual', '0000-00-00', '$diasRedondedos')");

$header = 'Enviado desde Industrias Médicas';
$asunto = "Presupuesto aprobado";
$fec = date("d-m-Y", strtotime($fechaActual));
$destinatario = 'gonzalonnegro@gmail.com';
$mensaje = "El día ".$fec." la Obra social: ".$nombre." ha aprobado el presupuesto N°".$id." generado por Industrias Médicas y ha generado una orden de compra.\nPor favor ingrese a https://indumedsa.com.ar/ para continuar con el proceso de venta.";
$mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("Location: ../Sistema/Ventas/ordenCompra.php?ok");
mysqli_close($datos_base);
}

/* RECHAZO */
if(isset($_POST['rechazo'])){
    /* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 9 WHERE idDocumento = '$id'");

    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 2";
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
$asunto = "Presupuesto rechazado";
$fec = date("d-m-Y", strtotime($fechaActual));
$destinatario = 'gonzalonnegro@gmail.com';
$mensaje = "El día ".$fec." la Obra social: ".$nombre." ha rechazado el presupuesto N°".$id." generado por Industrias Médicas.\nPor favor ingrese a https://indumedsa.com.ar/ para ver mas detalles.";
$mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("Location: ../Sistema/Ventas/presupuestos.php?rechazo");
mysqli_close($datos_base);
}
?>