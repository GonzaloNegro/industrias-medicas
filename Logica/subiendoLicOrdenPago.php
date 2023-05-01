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
$idd = $_POST['nombreid'];

if ($_POST['submit']){
}
    if(file_exists($_FILES['fichero']['tmp_name'])){
        $url = '../upload/licitaciones/ordenPago/'.$idd.".pdf";

        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $url)){
   

            $nombre = $_POST['nombre'];
            mysqli_query($datos_base, "INSERT INTO archivos VALUES (DEFAULT, '$nombre', 'asd', '".$url."', 'asdasd', 'asdasd')");


            $tic = mysqli_query($datos_base, "SELECT MAX(id) AS id FROM archivos");
            if ($row = mysqli_fetch_row($tic)) {
                $tic1 = trim($row[0]);
                }

            mysqli_query($datos_base, "UPDATE archivos SET ruta = '../upload/licitaciones/ordenPago/".$idd."' WHERE id = '$tic1'");
        }

    /* ENVIO DE MAIL */
    $sent= "SELECT da.idLicitacion, u.correo
    FROM datoslicitacion da
    LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
    WHERE da.idLicitacion = '$idd'";
    $resultado = $datos_base->query($sent);
    $row = $resultado->fetch_assoc();
    $destinatario = $row['correo'];

    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Nueva orden de pago";
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." Industrias Médicas ha generado una nueva orden de pago correspondiente a la licitación N°".$idd.".\nPor favor ingrese a https://indumedsa.com.ar/ para continuar con el proceso."; 
    $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
        
    mail($destinatario, $asunto, $mensajeCompleto, $header);
    };

header("Location: ../Sistema/Licitaciones/licOrdenPago.php?cargado");
mysqli_close($datos_base);
?>