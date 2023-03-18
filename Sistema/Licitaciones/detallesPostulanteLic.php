<?php
/* error_reporting(0); */
session_start(); 
include('../../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../../Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario'];

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	$datos_base=mysqli_connect('localhost', 'root', '', 'industrias') or exit('No se puede conectar con la base de datos');
	$sentencia =  "SELECT * FROM datospostulacionlicitacion WHERE idPostulacion='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idPostulacion'],/*0*/
		$filas['idProducto'],/* 1 */
		$filas['cantidad'],/* 2 */
        $filas['precio'],/*3*/
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
        <section class="inicio" id="imprimirEsto">
            <div class="inicio-tit">
                <?php 
                    $sent="SELECT u.usuario, p.producto, da.cantidad, da.precio, po.idLicitacion, po.observacion
                    FROM datospostulacionlicitacion da
                    LEFT JOIN producto p ON p.idProducto = da.idProducto
                    LEFT JOIN postulacionlicitacion po ON po.idPostulacion = da.idPostulacion
                    LEFT JOIN usuario AS u ON u.idUsuario = po.idUsuario
                    WHERE da.idPostulacion = $consulta[0]";
                    $resultado = $datos_base->query($sent);
                    $row = $resultado->fetch_assoc();
                    $usu = $row['usuario'];
                    $idLic = $row['idLicitacion'];
                    $observacion = $row['observacion'];
                ?>
                <h1>Detalles postulante: <?php echo "$usu";?></h1>
            </div>

            <div class="agrStock">
                <form method="POST" action="../../Logica/confirmarPostulanteLic.php">
                    <div class="nroCot">
                        <label for="cot">Postulación nro:</label>
                        <input type="text" id="cot" name="idPos" readonly="readonly" value="<?php echo $consulta[0]?>">
                        <label for="cot">Licitación nro:</label>
                        <input type="text" id="cot" name="idLic" readonly="readonly" value="<?php echo $idLic?>">
                    </div>

                    <?php
                    $productos="SELECT p.producto, da.cantidad, da.precio, da.idProducto
                    FROM datospostulacionlicitacion da
                    LEFT JOIN producto p ON p.idProducto = da.idProducto
                    WHERE da.idPostulacion = $consulta[0]";
                    $resProductos=$datos_base->query($productos);
                    ?>




                    <table class="table">
                        <tr>
                            <th style="width:85px;">ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                        </tr>

                        <?php
                        while ($registroProductos = $resProductos->fetch_array(MYSQLI_BOTH))
                        {
                            echo'<tr>
                                    <td style=width:85px;><input class="corto" name="idpro['.$registroProductos['idProducto'].']" value="'.$registroProductos['idProducto'].'" readonly="readonly"/></td>
                                    <td><input class="largo"  name="pro['.$registroProductos['idProducto'].']" value="'.$registroProductos['producto'].'" readonly="readonly"/></td>
                                    <td><input class="corto"  name="cant['.$registroProductos['idProducto'].']" value="'.$registroProductos['cantidad'].'" readonly="readonly"/></td>
                                    <td><input class="medio"  type=number min=1 onkeypress="return valideKey(event);" name="pre['.$registroProductos['idProducto'].']" readonly="readonly" value="'.$registroProductos['precio'].'" /></td>
                                </tr>';
                        }
                        ?>

                        </table>
                    <div>
                        <textarea name="obs" cols="30" readonly="readonly" rows="3"><?php echo $observacion;?></textarea>
                    </div>
                    <div>
                        <?php
                            $sent="SELECT m.fechaVen
                            FROM datospostulacionlicitacion d
                            LEFT JOIN postulacionlicitacion AS p ON p.idPostulacion = d.idPostulacion
                            LEFT JOIN movimientolicitacion AS m ON m.idLicitacion = p.idLicitacion";
                            $resultado = $datos_base->query($sent);
                            $row = $resultado->fetch_assoc();
                            $fven = $row['fechaVen'];

                            $fechaActual = date('Y-m-d');

                            $sent="SELECT l.idEstadoLicitacion 
                            FROM licitacion l
                            LEFT JOIN postulacionlicitacion p ON p.idLicitacion = l.idLicitacion
                            WHERE p.idPostulacion = '$consulta[0]'";
                            $resultado = $datos_base->query($sent);
                            $row = $resultado->fetch_assoc();
                            $est = $row['idEstadoLicitacion'];

                            if($fechaActual >= $fven AND $est == 1){
                                ?>
                                <button type="submit" class="btn btn-success">ACEPTAR POSTULACIÓN</button>
                                <?php
                            }
                        ?>
                    </div>
                </form>
            
                <div class="agregar">
                    <a href="./licCotizaciones.php" class="volver">VOLVER</a>
                </div>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>