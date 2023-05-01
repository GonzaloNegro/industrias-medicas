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
$idd = $_POST['nombreid'];

if ($_POST['submit']){
}
    if(file_exists($_FILES['fichero']['tmp_name'])){
        $url = '../upload/licitaciones/remitos/'.$idd.".pdf";

        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $url)){
   

            $nombre = $_POST['nombre'];
            mysqli_query($datos_base, "INSERT INTO archivos VALUES (DEFAULT, '$nombre', 'asd', '".$url."', 'asdasd', 'asdasd')");


            $tic = mysqli_query($datos_base, "SELECT MAX(id) AS id FROM archivos");
            if ($row = mysqli_fetch_row($tic)) {
                $tic1 = trim($row[0]);
                }

            mysqli_query($datos_base, "UPDATE archivos SET ruta = '../upload/licitaciones/remitos/".$idd."' WHERE id = '$tic1'");
        }
    /* ENVIO DE MAIL */

    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Nuevo remito generado";
    $destinatario = "gonzalonnegro@gmail.com";
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." el usuario ".$usuario." ha generado un nuevo remito para la licitación N°".$idd.".\nPor favor ingrese a https://indumedsa.com.ar/ para ver más detalles."; 
    $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
        
    mail($destinatario, $asunto, $mensajeCompleto, $header);
    };

header("Location: ../Sistema/Licitaciones/licRemitos.php?cargado");
mysqli_close($datos_base);
?>