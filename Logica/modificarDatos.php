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

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];


/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT idUsuario FROM usuario WHERE (usuario = '$usuario' AND idUsuario != '$idUsu')";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$usuregistrado = $row['idUsuario'];

if(isset($usuregistrado)){
    header("Location: ../Sistema/datos.php?error");
    mysqli_close($datos_base);
}else{
    mysqli_query($datos_base, "UPDATE usuario SET usuario = '$usuario', nombre = '$nombre', correo = '$correo', direccion = '$direccion' WHERE idUsuario = '$idUsu'");
    header("Location: ../Sistema/datos.php?ok");
    mysqli_close($datos_base);
}




