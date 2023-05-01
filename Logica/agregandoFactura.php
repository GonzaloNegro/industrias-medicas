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

$id = $_POST['nroRemito'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 5 WHERE idDocumento = '$id'");


    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 4";
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
mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 5, '$fechaActual', '0000-00-00', '$diasRedondedos')");



/* PASAR PRODUCTOS DE PENDIENTES A BAJA */
foreach ($_POST['idpro'] as $ids) 
{
    $editPro=mysqli_real_escape_string($datos_base, $_POST['idpro'][$ids]);
    $editCant=mysqli_real_escape_string($datos_base, $_POST['cant'][$ids]);


    /* HACER UN UPDATE DE EL ESTADO DEL PRODUCTO PARA QUE PASE DE RESERVADO A BAJA Y NO QUEDE EL RESERVADO CONTANDO
        FALTARIA EN LO DE DAR BAJA, TAMBIEN ACTUALIZARLO ASI NO QUEDA RESERVADO
    */
    $actualizar=$datos_base->query("INSERT INTO movimientoproducto VALUES(DEFAULT, '$editPro', '$fechaActual', 3, '$editCant', 3)");
}

/* ENVIO DE MAIL */
$header = 'Enviado desde Industrias Médicas';
$asunto = "Remito N°:".$id." aprobado";
$fec = date("d-m-Y", strtotime($fechaActual));
$destinatario = 'gonzalonnegro@gmail.com';
$mensaje = "El día ".$fec." la Obra social: ".$nombre." ha aprobado el remito N°".$id." generado por Industrias Médicas.\nPor favor ingrese a https://indumedsa.com.ar/ para continuar con el proceso de venta.";
$mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";

mail($destinatario, $asunto, $mensajeCompleto, $header);

header("Location: ../Sistema/Ventas/facturas.php?ok");
mysqli_close($datos_base);
?>