<?php
error_reporting(0);
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

/* ------ */

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	include('../../Utils/conexion.php');
	$sentencia =  "SELECT * FROM licitacion WHERE idLicitacion='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idLicitacion'],/*0*/
		$filas['idEstadoLicitacion'],
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
<script>
    function valideKey(evt){
    
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57 || code==44) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}
</script>
    <div class="cont-img">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri">

    </header>

    <main>
        <section class="inicio" id="imprimirEsto">
            <?php
                    $sql6 = "SELECT idUsuario, idPostulacion, observacion FROM postulacionlicitacion WHERE idLicitacion = $consulta[0] AND idUsuario = $idUsu";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $idpost = $row6['idPostulacion'];
                    $postulado = $row6['idUsuario'];
                    $observacion = $row6['observacion'];

                    $sql6 = "SELECT observacion FROM datoslicitacion WHERE idLicitacion = $consulta[0]";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $obse = $row6['observacion'];
            ?>
            <div class="inicio-tit">
                <?php
                    if(isset($postulado)){
                        echo "<h1>Detalles de su postulación</h1>
                        <p>Observacion: ".$observacion."</p>";}else{
                        ?>
                        <h1>Postularse a licitación</h1>
                        <p>Observación: <?php echo $obse; ?></p>
                <?php }?>
            </div>

            <div class="agrStock">

            <?php
                    $sql6 = "SELECT idUsuario, idPostulacion FROM postulacionlicitacion WHERE idLicitacion = $consulta[0] AND idUsuario = $idUsu";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $idpost = $row6['idPostulacion'];
                    $postulado = $row6['idUsuario'];
                   
                    if(isset($postulado)){
                        
                    echo "  
                    <table>
                            <thead>
                                <tr>
                                    <th><p>PRODUCTO</p></th>
                                    <th><p>CANTIDAD</p></th>
                                    <th><p>PRECIO UNITARIO</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT p.producto, da.cantidad, da.precio
                                FROM datospostulacionlicitacion da
                                LEFT JOIN producto p ON p.idProducto = da.idProducto
                                WHERE da.idPostulacion = $idpost");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        echo
                                        " 
                                            <tr>
                                                <td><h4 style='font-size:16px;'>".$listar['producto']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$listar['cantidad']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>$".$listar['precio']."</h4 ></td>
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                    }
                    else{
                        ?>
                <form method="POST" action="../../Logica/agregandoPostulacionLicCotizacion.php">
                <?php
                    $productos="SELECT p.producto, pl.cantidad, pl.precio, pl.idProducto
                    FROM productolicitacion pl
                    LEFT JOIN producto p ON p.idProducto = pl.idProducto
                    WHERE pl.idLicitacion = $consulta[0]";
                    $resProductos=$datos_base->query($productos);
                ?>
                    <div class="nroCot">
                        <label for="cot">Cotización nro:</label>
                        <input type="text" id="cot" name="idlit" readonly="readonly" value="<?php echo $consulta[0]?>">
                    </div>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                        </tr>

                        <?php
                        while ($registroProductos = $resProductos->fetch_array(MYSQLI_BOTH))
                        {
                            echo'<tr>
                                    <td style=width:85px;><input class="corto" name="idpro['.$registroProductos['idProducto'].']" value="'.$registroProductos['idProducto'].'" readonly="readonly"/></td>
                                    <td><input class="largo" name="pro['.$registroProductos['idProducto'].']" value="'.$registroProductos['producto'].'" readonly="readonly"/></td>
                                    <td><input class="corto" name="cant['.$registroProductos['idProducto'].']" value="'.$registroProductos['cantidad'].'" readonly="readonly"/></td>
                                    <td><input class="medio" type=number min=1 onkeypress="return valideKey(event);" step=.01 name="pre['.$registroProductos['idProducto'].']" value="'.$registroProductos['precio'].'" /></td>
                                </tr>';
                        }
                        ?>

                        </table>
                    <div>
                    <textarea name="obs" style="text-transform:uppercase" id="" cols="30" rows="3" placeholder="Observaciones"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="actualizar">GENERAR</button>
                    </div>
                </form>
                <?php 
                }
                    ?>
            
                <div class="agregar">
                    <a href="./licCotizaciones.php" class="volver"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                </div>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>