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

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	$datos_base=mysqli_connect('localhost', 'root', '', 'industrias') or exit('No se puede conectar con la base de datos');
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
    <section class="ini">
            <div class="ini-tit">
                <h1>Histórico Licitación N°<?php echo $consulta[0]; ?></h1>
            </div>
            <div class="ini-hist">
                <?php 
                    $sql6 = "SELECT d.monto, u.usuario
                    FROM datoslicitacion d
                    LEFT JOIN usuario u ON u.idUsuario = d.idUsuario
                    WHERE d.idLicitacion = $consulta[0]";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $usuario = $row6['usuario'];
                    $monto = $row6['monto'];

                    $idlic = $consulta[0];
                ?>
                <p><strong><u>Proveedor:</u></strong> <?php if(isset($usuario)){echo $usuario;}?></p>
                <p><strong><u>Inversión:</u></strong> <?php if(isset($monto)){echo "$".$monto;}?></p>

                <?php
                    $consulta=mysqli_query($datos_base, "SELECT p.producto, pr.cantidad, pr.precio
                    FROM productolicitacion pr
                    LEFT JOIN producto p ON p.idProducto = pr.idProducto
                    WHERE pr.idLicitacion = $idlic");

                    $contador = 0;

                    while($listar = mysqli_fetch_array($consulta)) 
                    {
                        $contador++;
                        echo"
                            <li><strong><u>Producto N°".$contador.":</u></strong> ".$listar['producto']."</li>
                            <li><strong><u>Cantidad:</u></strong> ".$listar['cantidad']."</li>
                            <li><strong><u>Precio unitario:</u></strong> $".$listar['precio']."</li>
                            <br>
                            ";
                    }
                    mysqli_close($datos_base);
                ?>


                <!-- HAY QUE LISTAR
                    TODOS LOS PRODUCTOS, 
                    EN ESTE MOMENTO
                    SOLO LISTA 1 -->
            </div>
             <?php
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p>ESTADO</p></th>
                                    <th><p>CREACIÓN</p></th>
                                    <th><p>DÍAS TRANSCURRIDOS</p></th>
                                </tr>
                            </thead>
                        ";
                        include('../../Utils/conexion.php');
                        if(isset($_POST['btn2']))
                                {
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT e.estadoLicitacion, m.fecha, m.cantDias
                                    FROM movimientolicitacion m
                                    LEFT JOIN estadolicitacion e ON e.idEstadoLicitacion = m.idEstadoLicitacion
                                    LEFT JOIN datoslicitacion da ON da.idLicitacion  = m.idLicitacion
                                    LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
                                    WHERE m.idLicitacion = '$idlic' AND (d.idDocumento LIKE '%$doc%' OR e.estadoDocumento LIKE '%$doc%' OR u.usuario LIKE '%$doc%')");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                        <tr>
                                        <td><h4 style='font-size:16px;'>".$listar['estadoLicitacion']."</h4 ></td>
                                        <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                        <td><h4 style='font-size:16px;'>".$listar['cantDias']."</h4 ></td>
                                        </tr>
                                        ";
                                    } 
                                }
                                else{
                                $consulta=mysqli_query($datos_base, "SELECT e.estadoLicitacion, m.fecha, m.cantDias
                                FROM movimientolicitacion m
                                LEFT JOIN estadolicitacion e ON e.idEstadoLicitacion = m.idEstadoLicitacion
                                LEFT JOIN datoslicitacion da ON da.idLicitacion  = m.idLicitacion
                                LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
                                WHERE m.idLicitacion = '$idlic'");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['estadoLicitacion']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['cantDias']."</h4 ></td>
                                            </tr>
                                        ";
                                    }
                                }
                                echo "</table><br><br>";
                                    ?>
            <div class="agregar">
                    <a href="./historicoLicitaciones.php" class="volver">VOLVER</a>
                </div>
        </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>