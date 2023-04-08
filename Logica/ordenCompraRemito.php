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

$id = $_POST['idnro'];/* NRO DE LICITACION */
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

if(isset($_POST['aceptar'])){
/* licitacion CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE licitacion SET idEstadoLicitacion = 3 WHERE idLicitacion = '$id'");

    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */
 
    $sent= "SELECT fecha FROM movimientolicitacion WHERE idLicitacion = '$idLic' AND idEstadoLicitacion = 2";
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


/*     if($diasRedondedos = 0){
        $diasRedondedos = 0;
    } */
    

/* movimientolicitacion INSERTAR nuevo estado y fecha de vencimiento */
mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES ('$id', 3, '$fechaActual', '0000-00-00', '$diasRedondedos')");
header("Location: ../Sistema/Licitaciones/licRemitos.php?ok");
}


/* RECHAZADA */
if(isset($_POST['rechazar'])){
    /* licitacion CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE licitacion SET idEstadoLicitacion = 7 WHERE idLicitacion = '$id'");

/* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

$sent= "SELECT fecha FROM movimientolicitacion WHERE idLicitacion = '$idLic' AND idEstadoLicitacion = 2";
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


/* if($diasRedondedos = 0){
    $diasRedondedos = 0;
} */


/* movimientolicitacion INSERTAR nuevo estado y fecha de vencimiento */
mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES ('$id', 7, '$fechaActual', '0000-00-00', '$diasRedondedos')");
header("Location: ../Sistema/Licitaciones/licRemitos.php?no");
}


mysqli_close($datos_base);
?>