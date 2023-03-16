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
	$sentencia =  "SELECT * FROM solicitudes WHERE idSolicitud='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idSolicitud'],/*0*/
		$filas['idProducto'],/* 1 */
        $filas['cantidad'],/*2*/
        $filas['observacion'],/*3*/
		$filas['fecha'],/* 4 */
        $filas['idEstadoSolicitud'],/* 5 */
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <main>
    <section class="inicio">
        <div class="inicio-tit">
                <h1>Detalle solicitud</h1>
        </div>
        <div class="agrStock">
            <form method="POST" action="../../Logica/agregandoLicCotizacion.php">
                <div>
                    <input type="text" class="ocultar" name="nroSolicitud" id="remito" value="<?php echo $consulta[0]?>">
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Nombre del producto:</h4>
                    <p><?php 
                        $sql6 = "SELECT producto FROM producto WHERE idProducto = $consulta[1]";
                        $result6 = $datos_base->query($sql6);
                        $row6 = $result6->fetch_assoc();
                        $producto = $row6['producto'];
                    
                    echo $producto;?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Cantidad:</h4>
                    <p><?php 
                    echo $consulta[2];?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Observación:</h4>
                    <p><?php 
                    echo $consulta[3];?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Fecha de solicitud:</h4>
                    <p><?php 
                    $fec = date("d-m-Y", strtotime($consulta[4]));
                    echo $fec;?></p>
                </div>
                <?php 
                if($consulta[5] == 1){
                ?>
                <div>
                    <label for="fecven">Fecha de vencimiento</label>
                    <input type="date" name="fecven" id="fecven" required>
                </div>
                <div>
                    <textarea style="text-transform:uppercase" name="obs" id="obs" cols="30" rows="3" placeholder="Agregar una Observación"></textarea>
                </div>
                <div>
                    <button type="submit">GENERAR SOLICITUD</button>
                </div>
                <?php }
                else{?>
                <div style="text-align: center; padding:10px;">
                    <h4>Estado de la solicitud:</h4>
                    <p><?php 
                        $sql6 = "SELECT estadoSolicitud FROM estadosolicitud WHERE idEstadoSolicitud = $consulta[5]";
                        $result6 = $datos_base->query($sql6);
                        $row6 = $result6->fetch_assoc();
                        $estado = $row6['estadoSolicitud'];
                    
                    echo $estado;?></p>
                </div>
                <?php 
                    $sql6 = "SELECT idLicitacion FROM solicitudes WHERE idSolicitud = $consulta[0]";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $numlic = $row6['idLicitacion'];
                    if($numlic != 0 ){
                ?>
                <div style="text-align: center; padding:10px;">
                    <h4>Licitación N°:</h4>
                    <p><?php 
                    echo $numlic;?></p>
                </div>
                    <?php
                    }
                }?>
            </form>
          
            <div class="agregar">
                    <a href="./solicitudLicitacion.php" class="volver">VOLVER</a>
                </div>
        </div>
        </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>