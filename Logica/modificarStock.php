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
$fechaActual = date('Y-m-d');

$id = $_POST['nroProducto'];
$cant = $_POST['cant'];
$mot = $_POST['mot'];

$sql6 = "SELECT cantidad FROM producto WHERE idProducto = '$id'";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$cantidadbd = $row6['cantidad'];

$total = $cantidadbd - $cant; 

/* UPDATE modificar cantidad en  producto*/
mysqli_query($datos_base, "UPDATE producto SET cantidad = '$total' WHERE idProducto = '$id'");

/* INSERT añadirlo en tabla de movimientoproducto como una BAJA*/
mysqli_query($datos_base, "INSERT INTO movimientoproducto VALUES (DEFAULT, '$id', '$fechaActual', 3, '$cant', '$mot')");


header("Location: ../Sistema/Stock/stock.php?ok");
mysqli_close($datos_base);
?>