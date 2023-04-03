<?php
include('../Utils/conexion.php');

$nroUsu =$_POST['nroUsu'];
$regNom =$_POST['regNom'];
$regCor =$_POST['regCor'];
$regDir =$_POST['regDir'];
$regUsu =$_POST['regUsu'];
$regRol =$_POST['rol'];
$regTipo =$_POST['tipo'];
$regEstado =$_POST['estado'];

/*TRAIGO VALORES DE LOS CMB*/
if($regRol == "100"){
    $sql3 = "SELECT idRol FROM usuario WHERE idUsuario = '$nroUsu'";
    $result3 = $datos_base->query($sql3);
    $row3 = $result3->fetch_assoc();
  
    $regRol = $row3['idRol'];
}

if($regTipo == "200"){
    $sql4 = "SELECT idTipoUsuario FROM usuario WHERE idUsuario = '$nroUsu'";
    $result4 = $datos_base->query($sql4);
    $row4 = $result4->fetch_assoc();
  
    $regTipo = $row4['idTipoUsuario'];
}

if($regEstado == "300"){
    $sql4 = "SELECT idEstadoUsuario FROM usuario WHERE idUsuario = '$nroUsu'";
    $result4 = $datos_base->query($sql4);
    $row4 = $result4->fetch_assoc();
  
    $regEstado = $row4['idEstadoUsuario'];
}

/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$sql = "SELECT usuario FROM usuario WHERE usuario = '$regUsu' AND idUsuario != '$nroUsu'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$usuarioregistrado = $row['usuario'];

/* VERIFICO EL ESTADO ACTUAL DEL USUARIO */
$sql = "SELECT idEstadoUsuario FROM usuario WHERE idUsuario = '$nroUsu'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$estadoActualUsuario = $row['idEstadoUsuario'];


if($regUsu == $usuarioregistrado)
{
    header("Location: ../Sistema/usuarios.php?error");
}else{
    if($estadoActualUsuario == 2 AND $regEstado == 1){
        mysqli_query($datos_base, "UPDATE usuario SET usuario = '$regUsu', idRol = '$regRol', idTipoUsuario = '$regTipo', nombre = '$regNom', correo = '$regCor', direccion = '$regDir', idEstadoUsuario = '$regEstado' WHERE idUsuario = '$nroUsu'"); 

    /* 	$destinatario = $regCor;
        $asunto = 'Activación de usuario en Industrias Médicas.';
        $header = 'Enviado desde Industrias Médicas.';
        
        $mensaje = 'Se ha activado su cuenta.';
        $nombre = 'INDUSTRIAS MÉDICAS';
        $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
        
        mail($destinatario, $asunto, $mensajeCompleto, $header); */


        header("Location: ../Sistema/usuarios.php?activo");
    }else{
        mysqli_query($datos_base, "UPDATE usuario SET usuario = '$regUsu', idRol = '$regRol', idTipoUsuario = '$regTipo', nombre = '$regNom', correo = '$regCor', direccion = '$regDir', idEstadoUsuario = '$regEstado' WHERE idUsuario = '$nroUsu'"); 
        header("Location: ../Sistema/usuarios.php?mod");
    }
}

mysqli_close($datos_base);
?>