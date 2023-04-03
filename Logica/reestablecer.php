<?php
include('../Utils/conexion.php');
include('../Utils/functions.php');
/* VALORES INGRESADOS EN EL FORMULARIO */
$email = limpiar_cadena($_POST['email']);

/* VERIFICO SI HAY ALGUN USUARIO CON ESOS DATOS */
$sql = "SELECT correo FROM usuario WHERE correo = '$email'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();
$destinatario = $row['correo'];

/* SI HAY ALGUN USUARIO CON ESOS DATOS ENVIO MAIL A ESA CASILLA DE CORREO */

if(isset($destinatario)){

    $nueva = "industrias";
    $regPassword = password_hash($nueva, PASSWORD_DEFAULT);

    mysqli_query($datos_base, "UPDATE usuario SET contraseña = '$regPassword' WHERE correo = '$email'");
    /* ENVIO DE MAIL */
    $nombre = 'Industrias Médicas';
    $asunto = 'Reestablecimiento de contraseña';
    $mensaje = "Buen día, nos comunicamos desde Industrias Médicas para reestablecer tu contraseña.\n Se te asignará una contraseña genérica, la cuál deberas cambiar al iniciar sesión nuevamente.\nTu nueva contraseña es: industrias";
    
    $header = 'Enviado desde Industrias Médicas.';
    $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
    mail($destinatario, $asunto, $mensajeCompleto, $header);


    header("Location: ../Principal/reestablecer.php?ok");
    mysqli_close($datos_base);
}else{

    header("Location: ../Principal/reestablecer.php?error");
    mysqli_close($datos_base);
}