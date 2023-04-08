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

$nombre = limpiar_cadena($_POST['nombre']);
$grupo = $_POST['grupo'];
$tipo = $_POST['tipo'];
$minimo = $_POST['minimo'];
$maximo = $_POST['maximo'];


/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT idProducto FROM producto WHERE (producto = '$nombre' AND idGrupoProducto = '$grupo')";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$prod = $row['idProducto'];

if(isset($prod)){
    header("Location: ../Sistema/Stock/productos.php?exist");
}else{
    mysqli_query($datos_base, "INSERT INTO producto VALUES (DEFAULT, '$nombre', '$grupo', '$tipo', 0, 1, '$minimo', '$maximo')");
    /* INSERT del producto en tabla producto  VERIFICAR QUE NO EXISTA*/
    header("Location: ../Sistema/Stock/productos.php?agregado");
}

mysqli_close($datos_base);
?>