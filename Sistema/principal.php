<?php
error_reporting(0);
session_start(); 
include('../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ./Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario, idRol FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario'];
$idRol = $row['idRol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
    <?php include('./Layouts/usuarioHeader.php'); ?>

    <main>
        <section>
            <div class="principal">
            <?php
                if($idRol == $rolgerente){
                    ?>
                <div class="principal-info">
                    <div class="principal-info-pri" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="500"
                                                    data-aos-duration="500">
                        <div>
                            <h2>Ventas activas</h2>
                        </div>
                        <div>
                            <?php 
                                $sql6 = "SELECT COUNT(*) AS total FROM documento WHERE idEstadoDocumento <> 9 AND idEstadoDocumento <> 10";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $cotact = $row6['total'];
                            ?>
                            <p><?php echo $cotact;?></p>
                        </div>
                    </div>
                    <div class="principal-info-sec" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="550"
                                                    data-aos-duration="550">
                        <div>
                            <h2>Licitaciones activas</h2>
                        </div>
                        <div>
                        <?php 
                                $sql6 = "SELECT COUNT(*) AS total FROM licitacion WHERE idEstadoLicitacion <> 6 AND idEstadoLicitacion <> 7";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $licact = $row6['total'];
                            ?>
                            <p><?php echo $licact;?></p>
                        </div>
                    </div>
                </div>

                <div class="principal-datos" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                    <div class="principal-datos-cont">
                        <h2>Estado últimas ventas</h2>
                        <?php $fechaActual = date('d-m-Y'); ?>
                        <p>Fecha actual: <?php echo $fechaActual;?></p>
                        <?php
                    echo "<table>
                            <thead class=colm>
                                <tr>
                                    <th><p>N°VENTA</p></th>
                                    <th><p>USUARIO</p></th>
                                    <th><p>FECHA</p></th>
                                    <th><p>ESTADO</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, e.estadoDocumento
                                FROM documento d
                                LEFT JOIN movimientodocumento m ON d.idDocumento = m.idDocumento
                                LEFT JOIN estadodocumento AS e ON e.idEstadoDocumento = d.idEstadoDocumento
                                LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                WHERE m.idEstadoDocumento = d.idEstadoDocumento
                                ORDER BY m.fecha DESC
                                LIMIT 4
                                ");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $fecha = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['idDocumento']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fecha."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['estadoDocumento']."</h4 ></td>                                        
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                    ?>
                    </div>
                </div>
                <?php
                    }
                ?>

                    <!-- OBRA SOCIAL -->
                    <?php
                        if($idRol == $rolobra){
                    ?>
                    <div class="principal-informacionVentas" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                        <div class="principal-informacionVentas-cont">
                            <h2>Estado últimas ventas</h2>
                            <?php $fechaActual = date('d-m-Y'); ?>
                            <p>Fecha actual: <?php echo $fechaActual;?></p>
                            <?php                    echo "<table>
                            <thead class=colm>
                                <tr>
                                    <th><p>N°VENTA</p></th>
                                    <th><p>FECHA ÚLT ACTIVIDAD</p></th>
                                    <th><p>ESTADO</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, e.estadoDocumento
                                FROM documento d
                                LEFT JOIN movimientodocumento m ON d.idDocumento = m.idDocumento
                                LEFT JOIN estadodocumento AS e ON e.idEstadoDocumento = d.idEstadoDocumento
                                LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                WHERE m.idEstadoDocumento = d.idEstadoDocumento AND da.idUsuario = $idUsu
                                ORDER BY m.fecha DESC
                                LIMIT 3
                                ");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $fecha = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['idDocumento']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fecha."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['estadoDocumento']."</h4 ></td>
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                    ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>


                    <!-- PROVEEDOR -->
                    <?php
                        if($idRol == $rolproveedor){
                    ?>
                    <div class="principal-informacionVentas" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                        <div class="principal-informacionVentas-cont">
                            <h2>Estado últimas licitaciones</h2>
                            <?php $fechaActual = date('d-m-Y'); ?>
                            <p>Fecha actual: <?php echo $fechaActual;?></p>
                            <?php                    echo "<table>
                            <thead class=colm>
                                <tr>
                                    <th><p>N°VENTA</p></th>
                                    <th><p>FECHA ÚLT ACTIVIDAD</p></th>
                                    <th><p>ESTADO</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT l.idLicitacion, m.fecha, e.estadoLicitacion
                                FROM licitacion l
                                LEFT JOIN movimientolicitacion m ON l.idLicitacion = m.idLicitacion
                                LEFT JOIN estadolicitacion AS e ON e.idEstadoLicitacion = l.idEstadoLicitacion
                                LEFT JOIN datoslicitacion AS da ON da.idLicitacion = l.idLicitacion
                                LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                WHERE m.idEstadoLicitacion = l.idEstadoLicitacion AND da.idUsuario = $idUsu
                                ORDER BY m.fecha DESC
                                LIMIT 3
                                ");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $fecha = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['idLicitacion']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fecha."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['estadoLicitacion']."</h4 ></td>
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                    ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>



                <!-- VENTAS Y LICITACIONES -->
                    <!-- PROVEEDOR -->
                    <?php
                        if($idRol == $rolventas OR $idRol == $roladmin OR $idRol == $roldeposito){
                    ?>
                    <div class="principal-ventaslicitaciones" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                        <div class="principal-ventaslicitaciones-img">
                            <h1>Bienvenido <?php echo $nom;?></h1>
                            <img src="../Imagenes/c-logotipo.png" alt="">
                            <?php 
                                $sql6 = "SELECT rol FROM roles WHERE idRol = $idRol";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $rolactual = $row6['rol'];
                            ?>
                            <p><strong><u>Rol del usuario:</u></strong> <?php echo $rolactual ?></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

            </div>
        </section>
    </main>
    <footer>
        <div class="fot">
            <img src="../Imagenes/c-logotipo.png" alt="">
        </div>
        <div class="tel">
            <p>
                0810-555-6334<br/>
                (0351) 4866001<br/>
                info@industriasmedicas.com
            </p>
        </div>
      </footer>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
      <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>