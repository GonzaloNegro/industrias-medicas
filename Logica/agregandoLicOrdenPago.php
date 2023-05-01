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

$id = $_POST['nroFactura'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

/* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

$sent= "SELECT fecha FROM movimientolicitacion WHERE idLicitacion = '$id' AND idEstadoLicitacion = 4";
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

/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE licitacion SET idEstadoLicitacion = 5 WHERE idLicitacion = '$id'");

/* movimientodocumento INSERTAR nuevo estado y fecha de vencimiento */
mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES ('$id', 5, '$fechaActual', '0000-00-00', '$diasRedondedos')");


    /* ENVIO DE MAIL */
    $sent= "SELECT da.idLicitacion, u.correo
    FROM datoslicitacion da
    LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
    WHERE da.idLicitacion = '$id'";
    $resultado = $datos_base->query($sent);
    $row = $resultado->fetch_assoc();
    $destinatario = $row['correo'];

    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Confirmación de la recepción del comprobante";
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." Industrias Médicas ha confirmado la recepción del comprobante correspondiente a la licitación N°".$id.".\nPor favor ingrese a https://indumedsa.com.ar/ para continuar con el proceso."; 
    $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
        
    mail($destinatario, $asunto, $mensajeCompleto, $header);


header("Location: ../Sistema/Licitaciones/licOrdenPago.php?ok");
mysqli_close($datos_base);
?>