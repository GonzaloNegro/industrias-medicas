<?php
session_start();
include('../Utils/conexion.php');

$observacion = $_POST['obs'];

date_default_timezone_set('UTC');
date_default_timezone_set("America/Buenos_Aires");
$fechaActual = date('Y-m-d');

if(isset($_POST['insertar'])){
    
    
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
            $valores='(DEFAULT,"'.$producto.'","'.$cantidad.'","'.$observacion.'","'.$fechaActual.'",1,0),';
    
            //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
            $valoresQ= substr($valores, 0, -1);
            
            ///////// QUERY DE INSERCIÓN ////////////////////////////
            $sql = "INSERT INTO solicitudes (idSolicitud, idProducto, cantidad, observacion, fecha, idEstadoSolicitud, idLicitacion) 
            VALUES $valoresQ";
    
            $sqlRes=$datos_base->query($sql) or mysql_error();
    
            // Up! Next Value
            $item1 = next( $items1 );
            $item2 = next( $items2 );
            
            // Check terminator
            if($item1 === false && $item2 === false) break;
    
        }
    }


header("Location: ../Sistema/Licitaciones/solLic.php?pedido");
mysqli_close($datos_base);
?>