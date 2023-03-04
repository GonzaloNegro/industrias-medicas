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

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$id = $_POST['idSol'];
$fechaActual = date('Y-m-d');


/* documento CAMBIAR ESTADO CON UPDATE */
mysqli_query($datos_base, "UPDATE documento SET idEstadoDocumento = 4 WHERE idDocumento = '$id'");


    /* CALCULAR DIAS TRANSCURRIDOS ENTRE ANTERIOR ESTADO Y ESTE */

    $sent= "SELECT fecha FROM movimientodocumento WHERE idDocumento = '$id' AND idEstadoDocumento = 8";
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
mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$id', 4, '$fechaActual', '0000-00-00', '$diasRedondedos')");


/* 
AGARRAR ESOS VALORES
Y DESCONTARLOS DEL STOCK PASANDOLOS A UN ESTADO DE PENDIENTE
Y PASAR AL ESTADO QUE SIGUE DEL DOCUMENTO.
RECORDAR QUE AL ACEPTAR EL REMITO YA SE DESCUENTAN LOS PRODUCTOS,
OSEA QUE CAMBIAN DE ESTADO DE PENDIENTE A BAJA

tabla producto hacer un UPDATE y actualizar el numero de productos, que se va a descontar
tabla movuimientoproducto INSERT el nuevo producto a RESERVADO 2
*/



foreach ($_POST['idpro'] as $ids) 
{
    $editPro=mysqli_real_escape_string($datos_base, $_POST['idpro'][$ids]);
    $editCant=mysqli_real_escape_string($datos_base, $_POST['cant'][$ids]);

    $sql6 = "SELECT cantidad
    FROM producto
    WHERE idProducto = '$editPro'";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $cantprod = $row6['cantidad'];

    $cantidadTotal = $cantprod - $editCant;

    $actualizar=$datos_base->query("UPDATE producto SET cantidad = '$cantidadTotal' WHERE idProducto = '$editPro'");
    /* FALTA INGRESAR EL NUMERO DEL DOCUMENTO---- TAMBIEN INSERTAR LA COLUMNA idDocumento EN LA TABLA movimientoproducto 
    Y FALTARIA EN LO DE DAR BAJA TAMBIEN AGREGAR EL ID
    */
    $actualizar=$datos_base->query("INSERT INTO movimientoproducto VALUES(DEFAULT, '$editPro', '$fechaActual', 2, '$editCant', 'RESERVA DE VENTA')");
}


header("Location: ../Sistema/Ventas/remitos.php?ok");
mysqli_close($datos_base);
?>