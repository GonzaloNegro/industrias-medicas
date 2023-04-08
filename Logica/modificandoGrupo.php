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

$idGru = $_POST['idGrupo'];
$nombre = limpiar_cadena($_POST['nombre']);


/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT idGrupoProducto FROM grupoproducto WHERE (grupoProducto = '$nombre' AND idGrupoProducto != '$idGru')";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$grup = $row['idGrupoProducto'];

if(isset($grup)){
    header("Location: ../Sistema/Stock/gruposProductos.php?exist");
}else{
    mysqli_query($datos_base, "UPDATE grupoproducto SET grupoProducto = '$nombre' WHERE idGrupoProducto = '$idGru'");
    /* UPDATE en la tabla de productos */
    header("Location: ../Sistema/Stock/gruposProductos.php?modif");
}

mysqli_close($datos_base);
?>