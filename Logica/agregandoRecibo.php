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


$id = $_POST['nroOP'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 10 WHERE idDocumento = '$id'");


    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 6";
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
mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 10, '$fechaActual', '0000-00-00', '$diasRedondedos')");


    /* ENVIO DE MAIL */
    if(isset($destinatario)){
        $header = 'Enviado desde Industrias Médicas';
        $asunto = "Orden de pago N°:".$id." aprobada";
        $fec = date("d-m-Y", strtotime($fechaActual));
        $destinatario = 'info@industriasmedicas.com';
        $mensaje = "El día ".$fec." Industrias Médicas ha aprobado la Orden de pago correspondiente al pedido médico N°".$id.".\nPor favor ingrese a https://indumedsa.com.ar/ para continuar con el proceso de venta.";
        $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
        
        mail($destinatario, $asunto, $mensajeCompleto, $header);
    }

header("Location: ../Sistema/Ventas/recibo.php?ok");
mysqli_close($datos_base);
?>