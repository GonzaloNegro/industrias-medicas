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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <h1>Histórico Ventas N°<?php echo $consulta[0]; ?></h1>
            </div>
            <div>
                <?php 
                    $sql6 = "SELECT d.medico, d.paciente, c.centroMedico, d.monto, u.usuario
                    FROM datosdocumento d
                    LEFT JOIN centromedico c ON c.idCentro = d.idCentro
                    LEFT JOIN usuario u ON u.idUsuario = d.idUsuario
                    WHERE d.idDocumento = $consulta[0]";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $usuario = $row6['usuario'];
                    $medico = $row6['medico'];
                    $paciente = $row6['paciente'];
                    $centro = $row6['centroMedico'];
                    $monto = $row6['monto'];

                    $iddocu = $consulta[0];
                ?>
                <p><strong><u>Cliente:</u></strong> <?php echo $usuario;?></p>
                <p><strong><u>Médico/s:</u></strong> <?php echo $medico;?></p>
                <p><strong><u>Paciente:</u></strong> <?php echo $paciente;?></p>
                <p><strong><u>Centro Médico:</u></strong> <?php echo $centro;?></p>
                <p><strong><u>Inversión:</u></strong> <?php echo "$".$monto;?></p>

                <?php
                    $consulta=mysqli_query($datos_base, "SELECT p.producto, pr.cantidad, pr.precio
                    FROM productodocumento pr
                    LEFT JOIN producto p ON p.idProducto = pr.idProducto
                    WHERE pr.idDocumento = $iddocu");

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
                                $consulta=mysqli_query($datos_base, "SELECT e.estadoDocumento, m.fecha, m.cantDias
                                FROM movimientodocumento m
                                LEFT JOIN estadodocumento e ON e.idEstadoDocumento = m.idEstadoDocumento
                                WHERE m.idDocumento = $iddocu");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['estadoDocumento']."</h4></td>
                                            <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['cantDias']."</h4 ></td>
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                    ?>      
            <div class="agregar">
                    <a href="./historicoVentas.php" class="volver">VOLVER</a>
                </div>
        </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>