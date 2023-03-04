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

$idProd = $_POST['idProd'];
$nombre = $_POST['nombre'];
$grupo = $_POST['grupo'];
$tipo = $_POST['tipo'];


if($grupo == "100"){
    $sql = "SELECT idGrupoProducto FROM producto WHERE idProducto = '$idProd'";
    $result = $datos_base->query($sql);
    $row = $result->fetch_assoc();
    $grupo = $row['idGrupoProducto'];
}
if($tipo == "200"){
    $sql2 = "SELECT idTipoProducto FROM producto WHERE idProducto = '$idProd'";
    $result2 = $datos_base->query($sql2);
    $row2 = $result2->fetch_assoc();
    $tipo = $row2['idTipoProducto'];
}

/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT idProducto FROM producto WHERE (producto = '$nombre' AND idGrupoProducto = '$grupo' AND idProducto != '$idProd')";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$prod = $row['idProducto'];

if(isset($prod)){
    header("Location: ../Sistema/Stock/productos.php?exist");
}else{
    mysqli_query($datos_base, "UPDATE producto SET producto = '$nombre', idGrupoProducto = '$grupo', idTipoProducto = '$tipo' WHERE idProducto = '$idProd'");
    /* UPDATE en la tabla de productos */
    header("Location: ../Sistema/Stock/productos.php?modif");
}

mysqli_close($datos_base);
?>