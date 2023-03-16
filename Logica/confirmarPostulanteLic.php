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

/* ------------------------- */
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');
$idLic = $_POST['idLic']; /* ID DE LA LICITACION. TRAE EL NUMERO DE ESTA LICITACION */
$idPos = $_POST['idPos']; /* ID DE  LA POSTULACION. TRAE EL NUMERO DE LA POSTULACION A LA LICITACION*/

$obs = $_POST['obs'];


/* 
-TABLA movimientolicitacion se inserta el nuevo estado que va a pasar a ORDEN DE COMPRA con los dias correspondientes
-TABLA licitacion Modificar estado
-TABLA productolicitacion Se modifica la cantidad, el precio y el estado, traidos por lo que gano el postulante (TABLA datospostulacionlicitacion) y actualizo estado 
-TABLA datoslicitacion Se inserta el id de la licitacion,el usuario que la gano, el monto total con iva y la observacion
*/

/* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

$sent= "SELECT fecha FROM movimientolicitacion WHERE idLicitacion = '$idLic' AND idEstadoLicitacion = 1";
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


/* TABLA movimientolicitacion se inserta el nuevo estado que va a pasar a ORDEN DE COMPRA */
mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES('$idLic', 2, '$fechaActual', '0000-00-00', '$diasRedondedos')");

/* TABLA licitacion Modificar estado */
mysqli_query($datos_base, "UPDATE licitacion SET idEstadoLicitacion = 2 WHERE idLicitacion = '$idLic'");

/* TABLA productolicitacion Se modifica la cantidad, el precio y el estado, traidos por lo que gano el postulante (TABLA datospostulacionlicitacion) */

foreach ($_POST['idpro'] as $ids) 
{
    $editPro=mysqli_real_escape_string($datos_base, $_POST['idpro'][$ids]);
    $editCant=mysqli_real_escape_string($datos_base, $_POST['cant'][$ids]);
    $editPre=mysqli_real_escape_string($datos_base, $_POST['pre'][$ids]);

    $actualizar=$datos_base->query("UPDATE productolicitacion SET precio = '$editPre', idEstadoLicitacion = 2 WHERE idProducto = '$editPro' AND cantidad = '$editCant'");

    $to = $editCant * $editPre;
    $montototal = $montototal + $to;
}


/* CALCULO EL IVA DE LOS PRODUCTOS */
/* $sql6 = "SELECT sum(precio) as suma
FROM datospostulacionlicitacion
WHERE idPostulacion = '$idPos'";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montototal = $row6['suma']; */

$coniva = $montototal *1.21;

$sent= "SELECT idUsuario FROM postulacionlicitacion WHERE idPostulacion = '$idPos'";
$resultado = $datos_base->query($sent);
$row = $resultado->fetch_assoc();
$postulante = $row['idUsuario'];


/* TABLA datoslicitacion Se modifica el el usuario que la gano, monto y observacion nueva del usuario ingresada*/
mysqli_query($datos_base, "UPDATE datoslicitacion SET idUsuario = '$postulante', monto = '$coniva' WHERE idLicitacion = '$idLic'");

header("Location: ../Sistema/Licitaciones/licOrdenCompra.php?ok");
mysqli_close($datos_base);
?>