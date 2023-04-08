<?php
session_start();
include('../Utils/conexion.php');
include('../Utils/functions.php');

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

/* ------------------------- */
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

$solicitud = $_POST['nroSolicitud'];

$sql6 = "SELECT idProducto, cantidad FROM solicitudes WHERE idSolicitud = '$solicitud'";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$producto = $row6['idProducto'];
$cantidad = $row6['cantidad'];

$feclim = $_POST['fecven'];
$obs = limpiar_cadena($_POST['obs']);

/* SI SE AGREGO ALGO, SE GENERA LA LICITACION NUEVA */
/* -licitacion: se crea una nueva
idLicitacion: DEFAULT
idEstadoLicitacion: Pongo el 1 */
mysqli_query($datos_base, "INSERT INTO licitacion VALUES (DEFAULT, 1)");

/* -movimientolicitacion: se crea un nuevo movimiento con sus fechas
idLicitacion: agrego el id
idEstadoLicitacion: agrego el 1
fecha: traigo la fecha de hoy
fechaven: traigo la fecha que señalé--------
cantDias: 0 */

$tic = mysqli_query($datos_base, "SELECT MAX(idLicitacion) AS id FROM licitacion");
if ($row = mysqli_fetch_row($tic)) {
    $tic1 = trim($row[0]);
    }
mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES ('$tic1', 1, '$fechaActual', '$feclim', 0)");

/* 
-productolicitacion: se agregan los datos de los productos solicitados
idLicitacion: agrego el id
idProducto: traigo el id del prod
cantidad: traigo la cantidad
precio: pongo 0
idEstadoLicitacion: pongo 1
*/

mysqli_query($datos_base, "INSERT INTO productolicitacion VALUES ('$tic1', '$producto', '$cantidad', 0, 1)");

/* CAMBIAR ESTADO EN SOLICITUDES */
mysqli_query($datos_base, "UPDATE solicitudes SET idEstadoSolicitud = 2, idLicitacion = '$tic1' WHERE idSolicitud = '$solicitud'");

/* INSERT EN datoslicitacion SIN TENER AUN UN idUsuario */
mysqli_query($datos_base, "INSERT INTO datoslicitacion VALUES ('$tic1', 0, 0, '$obs')");

header("Location: ../Sistema/Licitaciones/licCotizaciones.php?ok");
mysqli_close($datos_base);
?>