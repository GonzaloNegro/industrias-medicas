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
/* ------------------------- */
$feclim = $_POST['feclim'];
$observacion = limpiar_cadena($_POST['obs']);

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');



if(isset($_POST['insertar'])){


/* SI SE AGREGO ALGO, SE GENERA EL DOCUMENTO */
mysqli_query($datos_base, "INSERT INTO licitacion VALUES (DEFAULT, 1)");

$tic = mysqli_query($datos_base, "SELECT MAX(idLicitacion) AS id FROM licitacion");
if ($row = mysqli_fetch_row($tic)) {
    $tic1 = trim($row[0]);
    }

mysqli_query($datos_base, "INSERT INTO movimientolicitacion VALUES ('$tic1', 1, '$fechaActual', '$feclim', 0)");

mysqli_query($datos_base, "INSERT INTO datoslicitacion VALUES ('$tic1', 0, 0, '$observacion')");


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
        $valores='("'.$tic1.'","'.$producto.'","'.$cantidad.'",1,1),';

        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql = "INSERT INTO productolicitacion (idLicitacion, idProducto, cantidad, precio, idEstadoLicitacion) 
        VALUES $valoresQ";

        $sqlRes=$datos_base->query($sql) or mysql_error();

        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        
        // Check terminator
        if($item1 === false && $item2 === false) break;

    }

    /* ENVIO DE MAIL */
    $feclim1 = date("d-m-Y", strtotime($feclim));

    $arraymail = [];

    $consulta=mysqli_query($datos_base, "SELECT correo FROM usuario WHERE idTipoUsuario = 2");
    while($listar = mysqli_fetch_array($consulta)) 
        {
            if(isset($listar['correo'])){
                $dest = $listar['correo'].",";
                array_push($arraymail, $dest);
            }
        }
        /* echo json_encode($arraymail); */
        $destinatario = implode($arraymail);

        $header = 'Enviado desde Industrias Médicas';
        $asunto = "Nueva licitación";
        $fec = date("d-m-Y", strtotime($fechaActual));
        $mensaje = "El día ".$fec." Industrias Médicas notifica que se ha abierto una nueva licitación con fecha de cierre: ".$feclim1.".\nPor favor ingrese a https://indumedsa.com.ar/ para ver más detalles."; 
        $mensajeCompleto = $mensaje . "\nAtentamente: Industrias Médicas";
            
        mail($destinatario, $asunto, $mensajeCompleto, $header);
}

header("Location: ../Sistema/Licitaciones/licCotizaciones.php?ok");
mysqli_close($datos_base);
?>