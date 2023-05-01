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
$usuario = $row['usuario'];

$id = $_POST['idlit'];
$obs = limpiar_cadena($_POST['obs']);

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


if(isset($_POST['actualizar'])){

    mysqli_query($datos_base, "INSERT INTO postulacionlicitacion VALUES (DEFAULT, '$id','$idUsu', '$obs')");

    $tic = mysqli_query($datos_base, "SELECT MAX(idPostulacion) AS id FROM postulacionlicitacion");
if ($row = mysqli_fetch_row($tic)) {
    $tic1 = trim($row[0]);
    }


    foreach ($_POST['idpro'] as $ids) 
    {
        $editPro=mysqli_real_escape_string($datos_base, $_POST['idpro'][$ids]);
        $editCant=mysqli_real_escape_string($datos_base, $_POST['cant'][$ids]);
        $editPre=mysqli_real_escape_string($datos_base, $_POST['pre'][$ids]);

        $actualizar=$datos_base->query("INSERT INTO datospostulacionlicitacion VALUES('$tic1', '$editPro', '$editCant', '$editPre')");
    }

    /* ENVIO DE MAIL */

    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Nueva postulación a licitación";
    $destinatario = "gonzalonnegro@gmail.com";
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." el usuario ".$usuario." ha generado un nuevo presupuesto para la licitación N°".$id.".\nPor favor ingrese a https://indumedsa.com.ar/ para ver más detalles."; 
    $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
        
    mail($destinatario, $asunto, $mensajeCompleto, $header);
}

header("Location: ../Sistema/Licitaciones/licCotizaciones.php?postulado");
mysqli_close($datos_base);
?>