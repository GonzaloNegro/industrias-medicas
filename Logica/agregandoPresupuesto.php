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

$id = $_POST['idCot'];
$fecven = $_POST['fecven'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


/* documento CAMBIAR ESTADO CON UPDATE */

    mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 2 WHERE idDocumento = '$id'");


    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 1";
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


    /* movimientodocumento INSERTAR nuevo estado y fecha de vencimiento */
    mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 2, '$fechaActual', '$fecven', '$diasRedondedos')");

/* productodocumento INSERTAR nroproducto producto cantidad precio y estado nuevo */

foreach ($_POST['idpro'] as $ids) 
{
    $editPro=mysqli_real_escape_string($datos_base, $_POST['idpro'][$ids]);
    $editCant=mysqli_real_escape_string($datos_base, $_POST['cant'][$ids]);
    $editPre=mysqli_real_escape_string($datos_base, $_POST['pre'][$ids]);


    /* UPDATE PARA CAMBIAR EL PRECIO DE CADA PRODUCTO */
    $actualizar=$datos_base->query("UPDATE productodocumento SET precio = '$editPre', idEstadoDocumento = 2 WHERE idProducto = '$editPro' AND cantidad = '$editCant'");

    $to = $editCant * $editPre;
    $montototal = $montototal + $to;
}

/* CALCULO EL IVA DE LOS PRODUCTOS */
/* $sql6 = "SELECT sum(precio) as suma
FROM productodocumento
WHERE idDocumento = '$id'";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montototal = $row6['suma']; */

$coniva = $montototal *1.21;

mysqli_query($datos_base, "UPDATE datosdocumento SET monto = '$coniva' WHERE idDocumento = '$id'");

/* ENVIO DE MAIL */
$sent= "SELECT u.correo FROM usuario u LEFT JOIN datosdocumento da ON da.idUsuario = u.idUsuario WHERE da.idDocumento = '$id'";
$resultado = $datos_base->query($sent);
$row = $resultado->fetch_assoc();
$destinatario = $row['correo'];

if(isset($destinatario)){
    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Nuevo presupuesto generado";
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." Industrias Médicas ha registrado un nuevo presupuesto correspondiente a su pedido médico N°".$id.".\nPor favor ingrese a https://indumedsa.com.ar/ y verifique la nueva solicitud."; 
    $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
    
    mail($destinatario, $asunto, $mensajeCompleto, $header);
}

header("Location: ../Sistema/Ventas/presupuestos.php?ok");
mysqli_close($datos_base);
?>