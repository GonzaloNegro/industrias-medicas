<?php
include('../Utils/conexion.php');

$regNom =$_POST['regNom'];
$regCor =$_POST['regCor'];
$regDir =$_POST['regDir'];
$regUsu =$_POST['regUsu'];
$regPas = "industrias";
$regRol =$_POST['rol'];
$regTipo =$_POST['tipo'];

$regPassword = password_hash($regPas, PASSWORD_DEFAULT);


/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT usuario FROM usuario WHERE usuario = '$regUsu'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$usuarioregistrado = $row['usuario'];

if($regUsu == $usuarioregistrado)
{
    header("Location: ../Sistema/agregarUsuario.php?error");
}else{
    mysqli_query($datos_base, "INSERT INTO usuario VALUES (DEFAULT, '$regUsu', '$regPassword', '$regRol', '$regTipo', '$regNom', '$regCor', '$regDir', 1)");
    header("Location: ../Sistema/agregarUsuario.php?ok");
}


mysqli_close($datos_base);
?>