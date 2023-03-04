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

$nombre = $_POST['nombre'];

/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT idGrupoProducto FROM grupoproducto WHERE grupoProducto = '$nombre'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$grup = $row['idGrupoProducto'];

if(isset($grup)){
    header("Location: ../Sistema/Stock/gruposProductos.php?exist");
}else{
    mysqli_query($datos_base, "INSERT INTO grupoproducto VALUES (DEFAULT, '$nombre')");
    /* INSERT del producto en tabla producto  VERIFICAR QUE NO EXISTA*/
    header("Location: ../Sistema/Stock/gruposProductos.php?agregado");
}

mysqli_close($datos_base);
?>