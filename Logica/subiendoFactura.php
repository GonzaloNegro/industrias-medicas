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
$idd = $_POST['nroFactura'];

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');


if(file_exists($_FILES['fichero']['tmp_name'])){
    $url = '../upload/ventas/facturas/'.$idd.".pdf";

    if(move_uploaded_file($_FILES['fichero']['tmp_name'], $url)){


        $nombre = $_POST['nombre'];
        mysqli_query($datos_base, "INSERT INTO archivos VALUES (DEFAULT, '$nombre', 'asd', '".$url."', 'asdasd', 'asdasd')");


        $tic = mysqli_query($datos_base, "SELECT MAX(id) AS id FROM archivos");
        if ($row = mysqli_fetch_row($tic)) {
            $tic1 = trim($row[0]);
            }

        mysqli_query($datos_base, "UPDATE archivos SET ruta = '../upload/ventas/facturas/".$idd."' WHERE id = '$tic1'");
    
        /* ENVIO DE MAIL */
        $sent= "SELECT u.correo FROM usuario u LEFT JOIN datosdocumento da ON da.idUsuario = u.idUsuario WHERE da.idDocumento = '$idd'";
        $resultado = $datos_base->query($sent);
        $row = $resultado->fetch_assoc();
        $destinatario = $row['correo'];

        if(isset($destinatario)){
            $header = 'Enviado desde Industrias Médicas';
            $asunto = "Nueva Factura generada correspondiente a la venta N°".$idd.".";
            $fec = date("d-m-Y", strtotime($fechaActual));
            $mensaje = "El día ".$fec." Industrias Médicas ha registrado una nueva factura correspondiente a su pedido médico N°".$idd.".\nPor favor ingrese a https://indumedsa.com.ar/ para ver el archivo."; 
            $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
            
            mail($destinatario, $asunto, $mensajeCompleto, $header);
        }
    }
};

header("Location: ../Sistema/Ventas/facturas.php?cargado");
mysqli_close($datos_base);
?>