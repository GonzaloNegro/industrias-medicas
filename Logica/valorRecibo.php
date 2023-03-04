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


$id = $_POST['nroRecibo'];
date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

if(isset($_POST['uno'])){
    $valor = 1;
}elseif(isset($_POST['dos'])){
    $valor = 2;
}elseif(isset($_POST['tres'])){
    $valor = 3;
}elseif(isset($_POST['cuatro'])){
    $valor = 4;
}elseif(isset($_POST['cinco'])){
    $valor = 5;
}


/* valoracionventa INSERTAR*/
mysqli_query($datos_base, "INSERT INTO valoracionventa VALUES (DEFAULT, '$id', '$valor')");

header("Location: ../Sistema/Ventas/recibo.php?valorado");
mysqli_close($datos_base);
?>