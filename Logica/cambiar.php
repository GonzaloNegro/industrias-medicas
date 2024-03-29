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


$usuario = limpiar_cadena($_POST['usuario']);
$vieja = limpiar_cadena($_POST['vieja']);
$nueva = limpiar_cadena($_POST['nueva']);

if(strlen($nueva) < 8){
    header("location: ../Sistema/cambioClave.php?con");
    mysqli_close($datos_base);
}else{
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
        
    $resultado = $datos_base->query($sql);
    $fila = mysqli_fetch_assoc($resultado);

    $passwordHash = $fila['contraseña'];

    if(password_verify($vieja, $passwordHash)){
        $regPassword = password_hash($nueva, PASSWORD_DEFAULT);

        mysqli_query($datos_base, "UPDATE usuario SET contraseña = '$regPassword' WHERE usuario = '$usuario'");
        header("Location: ../Sistema/cambioClave.php?ok");
        mysqli_close($datos_base);
    }else {
        header("Location: ../Sistema/cambioClave.php?error");
        mysqli_close($datos_base);
    }
    }