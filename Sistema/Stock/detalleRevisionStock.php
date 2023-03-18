<?php
error_reporting(0);
session_start();
include('../../Utils/conexion.php');

if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../../Principal/login.php'); 
        exit();
    };

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	$datos_base=mysqli_connect('localhost', 'root', '', 'industrias') or exit('No se puede conectar con la base de datos');
	$sentencia =  "SELECT * FROM documento WHERE idDocumento='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idDocumento'],/*0*/
		$filas['idEstadoDocumento'],
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
<div class="cont-img" id="imagen">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>

    </div>
    <header class="hea-pri">
    <!-- <button id="botonright" type="button" class="btn btn-success" onClick="imprimir()" ></button> -->
    </header>

    <main>
        <section class="inicio">
            <?php $id = $consulta[0];?>
            <div class="inicio-tit">
                <h1>Solicitud stock</h1>
            </div>
            <div class="agrStock">
                <form method="POST" action="../../Logica/confirmarStock.php">
                    <div class="nroCot">
                        <label for="cot">Solicitud nro:</label>
                        <input type="text" id="cot" name="idSol" readonly="readonly" value="<?php echo $consulta[0]?>">
                    </div>
                    <table class="table">
                        <tr>
                            <th style="width:85px;">ID producto</th>
                            <th>Producto</th>
                            <th>Cantidad solicitada</th>
                            <th>Stock disponible</th>
                        </tr>

                        <?php

                        $productos="SELECT pr.cantidad, pr.precio, p.producto, p.idProducto
                        FROM productodocumento pr
                        LEFT JOIN producto p ON p.idProducto = pr.idProducto
                        WHERE pr.idDocumento = '$consulta[0]' AND pr.idEstadoDocumento = 2";
                        $resProductos=$datos_base->query($productos);

                        while ($registroProductos = $resProductos->fetch_array(MYSQLI_BOTH))
                        {
                            echo'<tr>
                                    <td style=width:85px;><input class="corto" name="idpro['.$registroProductos['idProducto'].']" value="'.$registroProductos['idProducto'].'" readonly="readonly"/></td>
                                    <td><input class="largo" name="pro['.$registroProductos['idProducto'].']" value="'.$registroProductos['producto'].'" readonly="readonly"/></td>
                                    <td><input class="corto" name="cant['.$registroProductos['idProducto'].']" value="'.$registroProductos['cantidad'].'" readonly="readonly"/></td>
                                ';

                                $sql6 = "SELECT cantidad
                                FROM producto
                                WHERE idProducto = '$registroProductos[idProducto]' AND idEstadoProducto = 1";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $cantstock = $row6['cantidad'];

                                $acumulado = 0;
                                if($registroProductos['cantidad'] > $cantstock){
                                    $acumulado = $acumulado + 1;
                                }
                                echo "
                                <td><h4 style='font-size:16px';>".$cantstock."</h4></td>
                                </tr>";
                        }
                        ?>
                    </table>
                    <div class="btn-pdf">
                    <?php 
                        if($acumulado > 0){
                            echo "<p>No hay stock suficiente, por favor realice una solicitud de compra.</p>";
                        } else{
                    ?>
                    <button class="btn btn-success">CONFIRMAR</button>
                    <?php 
                        }
                    ?>
                    </div>
                </form>
            </div>
        </section>
            <div class="agregar">
                <a href="./stockRevisar.php" class="volver" id="vlv"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>