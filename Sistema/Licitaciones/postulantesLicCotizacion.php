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
    <div class="cont-img">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri"></header>

    <main>
        <section class="ini">
            <div class="ini-tit">
            <h1>Postulantes licitación nro: <?php echo "$consulta[0]";?></h1>
            </div>
            <div class="agrStock">
                <form action="">
                    <p>PRODUCTO/S SOLICITADOS</p>
                    <div class="gril">
                        <?php
                            $productos="SELECT p.producto, pl.cantidad, pl.precio, pl.idProducto
                            FROM productolicitacion pl
                            LEFT JOIN producto p ON p.idProducto = pl.idProducto
                            WHERE pl.idLicitacion = $consulta[0]";
                            $resProductos=$datos_base->query($productos);
                        ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>

                                <?php
                                while ($registroProductos = $resProductos->fetch_array(MYSQLI_BOTH))
                                {
                                    echo'<tr>
                                            <td><input class="corto" name="idpro['.$registroProductos['idProducto'].']" value="'.$registroProductos['idProducto'].'" readonly="readonly"/></td>
                                            <td><input class="largo" name="pro['.$registroProductos['idProducto'].']" value="'.$registroProductos['producto'].'" readonly="readonly"/></td>
                                            <td><input class="corto" name="cant['.$registroProductos['idProducto'].']" value="'.$registroProductos['cantidad'].'" readonly="readonly"/></td>
                                        </tr>';
                                }
                                ?>
                            </table>
                    </div>
                </form>
            </div>
            <div class="container">
<!--                 <div class="agregar">
                    <a href="agregarLicCotizacion.php" class="nuevo">+</a>
                </div> -->
            </div>

             <?php
                    echo "<table style='margin-bottom:20px;'>
                            <thead>
                                <tr>
                                    <th style='min-width:190px;'><p>POSTULANTE</p></th>
                                    <th style='min-width:190px;'><p>MONTO (+IVA)</p></th>
                                    <th><p style='margin:5px;'>DETALLES</p></th>
                                </tr>
                            </thead>
                        ";
                                $cantidad = 0;
                                $consulta=mysqli_query($datos_base, "SELECT p.idPostulacion, u.usuario
                                FROM postulacionlicitacion p
                                LEFT JOIN usuario AS u ON u.idUsuario = p.idUsuario
                                WHERE p.idLicitacion = $consulta[0]
                                ORDER BY u.usuario ASC
                                ");
                                while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $cantidad++;
                                        $idpo = $listar['idPostulacion'];

                                        $tot = 0;
                                        $conIva = 0;
                                        $suma = 0;

                                        $consult=mysqli_query($datos_base, "SELECT *
                                        FROM datospostulacionlicitacion
                                        WHERE idPostulacion = '$idpo'");
                                        while($lista = mysqli_fetch_array($consult)) 
                                        {
                                            $suma=$lista['cantidad']*$lista['precio'];
                                            $tot = $tot + $suma;
                                        }
                                        $conIva = $tot * 1.21;
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>$".number_format($conIva, 2, ',','.')."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./detallesPostulanteLic.php?no=".$listar['idPostulacion']." target=new class=mod><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentcolor' margin='5' class='bi bi-eye' viewBox='0 0 16 16'>
                                            <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                            <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                          </svg></a></td>
                                            </tr>
                                        ";
                                    }
                                    echo "<div style='margin-top:10px;'><p style='text-transform: uppercase;'><u>Postulantes registrados</u>: ".$cantidad."</p></div>";
                                    echo "
                            </table>";?>
                <div class="agregar">
                    <a href="./licCotizaciones.php" class="volver"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                </div>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>