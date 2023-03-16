<?php
error_reporting(0);
session_start();
include('../../Utils/conexion.php');

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	$datos_base=mysqli_connect('localhost', 'root', '', 'industrias') or exit('No se puede conectar con la base de datos');
	$sentencia =  "SELECT * FROM movimientoproducto WHERE idMovimientoProducto='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idMovimientoProducto'],/*0*/
		$filas['idProducto'],/* 1 */
        $filas['fecha'],/*2*/
		$filas['idEstadoProducto'],/* 3 */
        $filas['cantidad'],/*4*/
        $filas['motivo'],/*5*/
	];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../Imagenes/c-titulo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
    <div class="cont-img">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri">

    </header>
    <main>
        <section class="inicio">
        <div class="inicio-tit">
            <h1>Detalles del movimiento</h1>
        </div>
        <div class="agrStock" style="padding:10px;">
            <form method="POST" action="../../Logica/modificarStock.php">
                <div style="text-align: center; padding:10px;">
                    <h4>Nombre del producto:</h4>
                    <p><?php 
                            $sql6 = "SELECT producto FROM producto WHERE idProducto = $consulta[1]";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $prod = $row6['producto'];
                    echo $prod;?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Fecha:</h4>
                    <p><?php 
                        $fec = date("d-m-Y", strtotime($consulta[2]));
                        echo $fec;?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Estado:</h4>
                    <p><?php 
                            $sql6 = "SELECT estadoProducto FROM estadoproducto WHERE idEstadoProducto = $consulta[3]";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $estado = $row6['estadoProducto'];
                    echo $estado;?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Cantidad:</h4>
                    <p><?php 
                    echo $consulta[4];?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Motivo:</h4>
                    <p><?php 
                    echo $consulta[5];?></p>
                </div>
            </form>
        
            <div class="agregar">
                <a href="./movimientoStock.php" class="volver">VOLVER</a>
            </div>
        </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>