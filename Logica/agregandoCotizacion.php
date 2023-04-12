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
$sql = "SELECT idUsuario, usuario, nombre FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

/*GUARDO LOS DATOS DEL ID_RESOLUTOR EN UNA VARIABLE*/
$idUsu = $row['idUsuario'];
$nombre = $row['nombre'];
/* ------------------------- */
$medico = limpiar_cadena($_POST['medico']);
$paciente = limpiar_cadena($_POST['paciente']);
$centromedico = $_POST['centromedico'];
$observacion = limpiar_cadena($_POST['obs']);

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');



if(isset($_POST['insertar'])){


/* SI SE AGREGO ALGO, SE GENERA EL DOCUMENTO */
mysqli_query($datos_base, "INSERT INTO documento VALUES (DEFAULT, 1)");

$tic = mysqli_query($datos_base, "SELECT MAX(idDocumento) AS id FROM documento");
if ($row = mysqli_fetch_row($tic)) {
    $tic1 = trim($row[0]);
    }

mysqli_query($datos_base, "INSERT INTO movimientodocumento VALUES ('$tic1', 1, '$fechaActual', '0000-00-00', 0)");

mysqli_query($datos_base, "INSERT INTO datosdocumento VALUES ('$tic1', '$medico', '$paciente', '$idUsu', '$centromedico', 0, '$observacion')");


    /* PRODUCTOS A INSERTAR */
    $items1 = ($_POST['producto']);
    $items2 = ($_POST['cantidad']);
    
    ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
    while(true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1);
        $item2 = current($items2);
        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $producto=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $cantidad=(( $item2 !== false) ? $item2 : ", &nbsp;");

        //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores='("'.$tic1.'","'.$producto.'","'.$cantidad.'",0,1),';

        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql = "INSERT INTO productodocumento (idDocumento, idProducto, cantidad, precio, idEstadoDocumento) 
        VALUES $valoresQ";

        $sqlRes=$datos_base->query($sql) or mysql_error();

        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        
        // Check terminator
        if($item1 === false && $item2 === false) break;

    }
    $header = 'Enviado desde Industrias Médicas';
    $asunto = "Nuevo pedido médico generado";
    $destinatario = 'info@industriasmedicas.com';
    $fec = date("d-m-Y", strtotime($fechaActual));
    $mensaje = "El día ".$fec." la Obra social: ".$nombre." ha registrado un nuevo pedido médico.\nPor favor ingrese a https://indumedsa.com.ar/ y verifique la nueva solicitud.";

    $mensajeCompleto = $mensaje . "\nIndustrias Médicas";

    mail($destinatario, $asunto, $mensajeCompleto, $header);
}

header("Location: ../Sistema/Ventas/cotizaciones.php?ok");
mysqli_close($datos_base);
?>