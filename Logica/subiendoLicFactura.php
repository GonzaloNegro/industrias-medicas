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
        $url = '../upload/licitaciones/facturas/'.$idd.".pdf";

        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $url)){
   

            $nombre = $_POST['nombre'];
            mysqli_query($datos_base, "INSERT INTO archivos VALUES (DEFAULT, '$nombre', 'asd', '".$url."', 'asdasd', 'asdasd')");


            $tic = mysqli_query($datos_base, "SELECT MAX(id) AS id FROM archivos");
            if ($row = mysqli_fetch_row($tic)) {
                $tic1 = trim($row[0]);
                }

            mysqli_query($datos_base, "UPDATE archivos SET ruta = '../upload/licitaciones/facturas/".$idd."' WHERE id = '$tic1'");
        }
    };

header("Location: ../Sistema/Licitaciones/licFacturas.php?cargado");
mysqli_close($datos_base);
?>