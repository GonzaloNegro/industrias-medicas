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

$id = $_POST['nroRemito'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


/* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

$sent= "SELECT fecha FROM movimientolicitacion WHERE idLicitacion = '$id' AND idEstadoLicitacion = 3";
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


/* AGREGAR PRODUCTOS DE LA TABLA PRODUCTOS (STOCK) */

foreach ($_POST['idpro'] as $ids){
    /* TRAIGO CADA PRODUCTO CON EL ID */
    $editPro=mysqli_real_escape_string($datos_base, $_POST['idpro'][$ids]);
    $editCant=mysqli_real_escape_string($datos_base, $_POST['cant'][$ids]);
    $editPre=mysqli_real_escape_string($datos_base, $_POST['pre'][$ids]);

    /* BUSCO LA CANTIDAD ACTUAL DE EL PRODUCTO */
    $sql6 = "SELECT cantidad FROM producto WHERE idProducto = '$editPro'";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $cantidadReal = $row6['cantidad'];

    /* LE AGREGO A LA CANTIDAD ACTUAL, LA CANTIDAD QUE SE LE SUMA DE LA LICITACIÓN */
    $totalNuevo = $cantidadReal + $editCant;

    /* REGISTRAR MOVIMIENTO DE PRODUCTOS */
    mysqli_query($datos_base, "INSERT INTO movimientoproducto VALUES (DEFAULT, '$editPro', '$fechaActual', 1, '$editCant', 2)");

    /* ACTUALIZO */
    $actualizar=$datos_base->query("UPDATE producto SET cantidad = '$totalNuevo' WHERE idProducto = '$editPro'");
}

/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE licitacion SET idEstadoLicitacion = 4 WHERE idLicitacion = '$id'");


/* movimientodocumento INSERTAR nuevo estado y fecha de vencimiento */
mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES ('$id', 4, '$fechaActual', '0000-00-00', '$diasRedondedos')");




/* solicitudes ACTUALIZO el estado de la solicitud a 3 FINALIZADA SI ES QUE FUE MEDIANTE UNA SOLICITUD DE FALTA DE STOCK*/
$sql6 = "SELECT idSolicitud FROM solicitudes WHERE idLicitacion = '$id'";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$solicitud = $row6['idSolicitud'];

if(isset($solicitud)){
    mysqli_query($datos_base, "UPDATE solicitudes SET idEstadoSolicitud = 3 WHERE idLicitacion = '$id'");
}

    /* ENVIO DE MAIL */
    $sent= "SELECT da.idLicitacion, u.correo
    FROM datoslicitacion da
    LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
    WHERE da.idLicitacion = '$id'";
    $resultado = $datos_base->query($sent);
    $row = $resultado->fetch_assoc();
    $destinatario = $row['correo'];

    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Confirmación de remito";
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." Industrias Médicas ha confirmado el remito de la licitación N°".$id.".\nPor favor ingrese a https://indumedsa.com.ar/ para continuar con el proceso."; 
    $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
        
    mail($destinatario, $asunto, $mensajeCompleto, $header);

header("Location: ../Sistema/Licitaciones/licFacturas.php?ok");
mysqli_close($datos_base);
?>