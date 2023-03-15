<?php 
error_reporting(0);
session_start();
include('../Utils/conexion.php');

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
    <script src="../chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
    <!-- CONTROL DE QUE SOLO INGRESAN A ESTA PÁGINA GERENTE Y ADMINISTRADOR -->
    <?php
        $rolgerente = 1;
        $roladmin = 2;
        $roldeposito = 3;
        $rolventas = 4;
        $rolobra = 5;
        $rolproveedor = 6;
        if($idRol == $roldeposito OR $idRol == $rolventas OR $idRol == $rolobra OR $idRol == $rolproveedor){
            header("Location: ./principal.php");
        }
    ?>
    <div class="cont-img">
    <a href="./principal.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid navpri">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Datos usuario</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./datos.php">Mis datos</a>
                                </li>
                                <?php
                                    $rolgerente = 1;
                                    $roladmin = 2;
                                    $roldeposito = 3;
                                    $rolventas = 4;
                                    $rolobra = 5;
                                    $rolproveedor = 6;
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li >
                                    <a class="nav-link variacion" href="./usuarios.php">Usuarios</a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./principal.php" class="nav-link variacion" aria-current="page">Principal</a>
                        </li>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roldeposito){
                        ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Stock</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Stock/stock.php">Consultar stock</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Stock/movimientoStock.php">Movimiento stock</a>
                                </li>
                                <li>
                                    <a class="nav-link variacion" href="./Stock/stockRevisar.php">A revisar</a>
                                </li>
                                <li>
                                    <a class="nav-link variacion" href="./Stock/productos.php">Productos</a>
                                </li>
                                <li>
                                    <a class="nav-link variacion" href="./Stock/gruposProductos.php">Grupos Productos</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roladmin OR $idRol == $rolventas OR $idRol == $rolproveedor){
                        ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Licitaciones</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Licitaciones/historicoLicitaciones.php">Histórico</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($idRol == $rolgerente OR $idRol == $rolventas){
                                ?>
                                <li class="nav-item">
                                    <a href="./Licitaciones/solLic.php" class="nav-link variacion" aria-current="page">Solicitar</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Licitaciones/solicitudLicitacion.php">Solicitudes</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Licitaciones/licCotizaciones.php">Cotizaciones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Licitaciones/licOrdenCompra.php">Orden de compra</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Licitaciones/licRemitos.php">Remitos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Licitaciones/licFacturas.php">Facturas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Licitaciones/licOrdenPago.php">Orden de pago</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Licitaciones/licRecibo.php">Recibo</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roladmin OR $idRol == $rolobra){
                        ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ventas</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Ventas/historicoVentas.php">Histórico</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./Ventas/cotizaciones.php">Pedido Médico</a>
                                </li>
                                <li >
                                    <a class="nav-link variacion" href="./Ventas/presupuestos.php">Presupuestos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Ventas/ordenCompra.php">Orden de compra</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Ventas/remitos.php">Remitos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Ventas/facturas.php">Facturas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Ventas/ordenPago.php">Orden de pago</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./Ventas/recibo.php">Recibo</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roladmin){
                        ?>
                        <li class="nav-item">
                            <a href="./estadisticas.php" class="nav-link variacion" aria-current="page">Estadisticas</a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="not-exit">
                    <div class="not-exit-name">
                        <p style='color: blue; font-weight: bold;'><u>Usuario</u>: <?php echo $nom;?></p>
                    </div>
                   <!--  <a href=""><i class="fa-regular fa-bell"></i></a> -->
                   <div class="not-exit-exit">
                       <a href="../Utils/salir.php">
                           <button class="btn btn-outline-danger" type="submit">Salir</button>
                        </a>
                   </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="principal">
                <div class="principal-info">
                <div class="principal-info-pri" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="500"
                                                    data-aos-duration="500">
                        <div>
                            <h2>Puntaje satisfacción ventas</h2>
                        </div>
                        <div>
                            <?php 
                                $sql6 = "SELECT COUNT(*) AS total FROM valoracionventa";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $cantvalor = $row6['total'];

                                $sql6 = "SELECT SUM(valoracion) AS valoracion FROM valoracionventa";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $valoracion = $row6['valoracion'];

                                $promedio = $valoracion / $cantvalor;
                            ?>
                            <p><?php echo round(($promedio) ,2)."/5";?></p>



                        </div>
                    </div>
                    <div class="principal-info-sec" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="550"
                                                    data-aos-duration="550">
                        <div>
                            <h2>Ingresos generados</h2>
                        </div>
                        <div>
                            <?php 
                                $sql6 = "SELECT sum(da.monto) as suma
                                FROM datosdocumento da
                                LEFT JOIN documento d ON d.idDocumento = da.idDocumento
                                WHERE d.idEstadoDocumento = 10";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $cotact = $row6['suma'];
                            ?>
                            <p><?php echo "$".round($cotact, 2);?></p>

                        </div>
                    </div>
                    <div class="principal-info-ter" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="600"
                                                    data-aos-duration="600">
                        <div>
                            <h2>Gastos generados</h2>
                        </div>
                        <div>
                        <?php 
                                $sql6 = "SELECT sum(da.monto) as suma
                                FROM datoslicitacion da
                                LEFT JOIN licitacion l ON l.idLicitacion = da.idLicitacion
                                WHERE l.idEstadoLicitacion = 6";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $lictot = $row6['suma'];
                            ?>
                            <p><?php echo "$".round($lictot, 2);?></p>
                        </div>
                    </div>
                </div>





                <div class="secundario-info">
                    <div class="secundario-info-pri" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="500"
                                                    data-aos-duration="500">
                        <div>
                            <h2>Días promedio p/venta</h2>
                        </div>
                        <div>
                        <?php 
                                $sql6 = "SELECT sum(m.cantDias) as cantidad
                                FROM movimientodocumento m
                                LEFT JOIN documento d ON d.idDocumento = m.idDocumento
                                WHERE d.idEstadoDocumento = 10";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $coantdias = $row6['cantidad'];

                                $sql6 = "SELECT count(idDocumento) as cant
                                FROM documento
                                WHERE idEstadoDocumento = 10";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $cantidadDoc = $row6['cant'];

                                $promTotal = $coantdias / $cantidadDoc;
                            ?>
                            <p><?php 
                            echo number_format($promTotal, 2);?></p>
                        </div>
                    </div>
                    <div class="secundario-info-sec" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="550"
                                                    data-aos-duration="550">
                         <div>
                            <h2>Ventas exitosas</h2>
                        </div>
                        <div>
                        <?php 
                            $sql6 = "SELECT COUNT(*) AS total FROM documento";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $doctot = $row6['total'];

                            $sql6 = "SELECT COUNT(*) AS total FROM documento WHERE idEstadoDocumento = 10";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $docven = $row6['total'];

                            ?>
                            <p><?php 
                            echo "%".round(($docven * 100)/$doctot, 2);?></p>
                        </div>
                    </div>

                    <div class="secundario-info-ter" data-aos="fade-left"
                                                    data-aos-anchor="#example-anchor"
                                                    data-aos-offset="600"
                                                    data-aos-duration="600">
                        <div>
                            <h2>Balance</h2>
                        </div>
                        <div>
                            <p><?php 
                            $balance = $cotact - $lictot;?>
                            <p><?php echo "$".round($balance, 2);?></p>
                        </div>
                    </div>
                </div>




                <div class="principal-datos" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                    <div class="principal-datos-cont">
                        <h2>PRODUCTOS MÁS VENDIDOS</h2>
                        <?php
                    echo "<table>
                            <thead class=colm>
                                <tr>
                                    <th><p>CANT</p></th>
                                    <th><p style='text-align:center;'>PRODUCTO</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT sum(pd.cantidad) as cantidad, pr.producto
                                FROM documento d
                                LEFT JOIN productodocumento pd ON pd.idDocumento = d.idDocumento
                                LEFT JOIN producto pr ON pr.idProducto = pd.idProducto
                                WHERE d.idEstadoDocumento = 10
                                GROUP BY pr.producto
                                ORDER BY cantidad DESC
                                LIMIT 3");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['cantidad']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['producto']."</h4 ></td>                                 
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                echo "<div class='verMas'><a href='prodVendidos.php'>Ver todos</a></div>"
                                    ?>
                    </div>
                </div>
                <br>


                <div class="principal-datos" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                    <div class="principal-datos-cont">
                        <h2>PRODUCTOS MAS SOLICITADO A PROVEEDORES</h2>
                        <?php
                    echo "<table>
                            <thead class=colm>
                                <tr>
                                    <th><p>CANT</p></th>
                                    <th><p style='text-align:center;'>PRODUCTO</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT sum(pl.cantidad) as cantidad, pr.producto
                                FROM licitacion l
                                LEFT JOIN productolicitacion pl ON pl.idLicitacion = l.idLicitacion
                                LEFT JOIN producto pr ON pr.idProducto = pl.idProducto
                                WHERE l.idEstadoLicitacion = 6
                                GROUP BY pr.producto
                                ORDER BY cantidad DESC
                                LIMIT 3");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['cantidad']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['producto']."</h4 ></td>                                 
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                echo "<div class='verMas'><a href='prodSolicitados.php'>Ver todos</a></div>"
                                    ?>
                    </div>
                </div>

                <div class="contGrafico">
                    <div class="grafico">
                        <div class="grafico-tit">
                            <h1>Estado ventas</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica" style="width: 400px; height: 300px;"></canvas>
                        </div>
                    </div>
    
                    <div class="grafico">
                        <div class="grafico-tit">
                            <h1>Estado Licitaciones</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica1" style="width: 400px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="contGrafico">
                    <div class="grafico">
                        <div class="grafico-tit">
                            <h1>INGRESOS</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica2" style="width: 800px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="contGrafico">
                    <div class="grafico">
                        <div class="grafico-tit">
                            <h1>EGRESOS</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica3" style="width: 800px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

            </div>
    <?php
        $sql6 = "SELECT COUNT(*) AS total FROM documento WHERE idEstadoDocumento <> 9 AND idEstadoDocumento <> 10";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $docProceso = $row6['total'];

        $sql6 = "SELECT COUNT(*) AS total FROM documento WHERE idEstadoDocumento = 9";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $docRechazado = $row6['total'];

        $sql6 = "SELECT COUNT(*) AS total FROM documento WHERE idEstadoDocumento = 10";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $docPagado = $row6['total'];



        $sql6 = "SELECT COUNT(*) AS total FROM licitacion WHERE idEstadoLicitacion <> 6 AND idEstadoLicitacion <> 7";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $licProceso = $row6['total'];

        $sql6 = "SELECT COUNT(*) AS total FROM licitacion WHERE idEstadoLicitacion = 7";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $licRechazada = $row6['total'];

        $sql6 = "SELECT COUNT(*) AS total FROM licitacion WHERE idEstadoLicitacion = 6";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $licPagada = $row6['total'];


/*         function meses($mes, $año){
            $mesReal = $mes - 1;
            if($mesReal == 0){
                $mesReal = 12;
            }
        return $mesReal;
        }

        echo meses(1, 3); */

/*         $año2022 = 2022;
        $año2023 = 2023;

        $mes = 12; 
        $sql6 = "SELECT SUM(d.monto) AS total
        FROM movimientodocumento m
        LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
        WHERE m.idEstadoDocumento = 10 AND MONTH(m.fecha) = $mes AND YEAR(m.fecha) = $año2022";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $diciembre = $row6['total'];
        echo $diciembre; */


        /* ESTADISTICAS MENSUAL INGRESOS */


    $arraym = [];
    $arrayf = [];

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 0,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto1 = $row6['total'];
    $fecha1 = $row6['fecha'];
    $fec1 = date("m/Y", strtotime($fecha1));
    if(isset($monto1)){
        array_push($arraym, $monto1);
        array_push($arrayf, $fec1);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 1,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto2 = $row6['total'];
    $fecha2 = $row6['fecha'];
    $fec2 = date("m/Y", strtotime($fecha2));
    if(isset($monto2)){
        array_push($arraym, $monto2);
        array_push($arrayf, $fec2);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC
    LIMIT 2,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto3 = $row6['total'];
    $fecha3 = $row6['fecha'];
    $fec3 = date("m/Y", strtotime($fecha3));
    if(isset($monto3)){
        array_push($arraym, $monto3);
        array_push($arrayf, $fec3);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 3,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto4 = $row6['total'];
    $fecha4 = $row6['fecha'];
    $fec4 = date("m/Y", strtotime($fecha4));
    if(isset($monto4)){
        array_push($arraym, $monto4);
        array_push($arrayf, $fec4);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 4,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto5 = $row6['total'];
    $fecha5 = $row6['fecha'];
    $fec5 = date("m/Y", strtotime($fecha5));
    if(isset($monto5)){
        array_push($arraym, $monto5);
        array_push($arrayf, $fec5);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 5,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto6 = $row6['total'];
    $fecha6 = $row6['fecha'];
    $fec6 = date("m/Y", strtotime($fecha6));
    if(isset($monto6)){
        array_push($arraym, $monto6);
        array_push($arrayf, $fec6);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 6,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto7 = $row6['total'];
    $fecha7 = $row6['fecha'];
    $fec7 = date("m/Y", strtotime($fecha7));
    if(isset($monto7)){
        array_push($arraym, $monto7);
        array_push($arrayf, $fec7);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 7,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto8 = $row6['total'];
    $fecha8 = $row6['fecha'];
    $fec8 = date("m/Y", strtotime($fecha8));
    if(isset($monto8)){
        array_push($arraym, $monto8);
        array_push($arrayf, $fec8);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 8,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto9 = $row6['total'];
    $fecha9 = $row6['fecha'];
    $fec9 = date("m/Y", strtotime($fecha9));
    if(isset($monto9)){
        array_push($arraym, $monto9);
        array_push($arrayf, $fec9);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 9,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto10 = $row6['total'];
    $fecha10 = $row6['fecha'];
    $fec10 = date("m/Y", strtotime($fecha10));
    if(isset($monto10)){
        array_push($arraym, $monto10);
        array_push($arrayf, $fec10);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 10,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto11 = $row6['total'];
    $fecha11 = $row6['fecha'];
    $fec11 = date("m/Y", strtotime($fecha11));
    if(isset($monto11)){
        array_push($arraym, $monto11);
        array_push($arrayf, $fec11);
    }

    $sql6 = "SELECT SUM(d.monto) AS total, m.fecha
    FROM movimientodocumento m
    LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
    WHERE m.idEstadoDocumento = 10 
    GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
    ORDER BY m.fecha DESC 
    LIMIT 11,1";
    $result6 = $datos_base->query($sql6);
    $row6 = $result6->fetch_assoc();
    $monto12 = $row6['total'];
    $fecha12 = $row6['fecha'];
    $fec12 = date("m/Y", strtotime($fecha12));
    if(isset($monto12)){
        array_push($arraym, $monto12);
        array_push($arrayf, $fec12);
    }


/* ------------------------------------------- */
/* ESTADISTICAS MENSUAL EGRESOS*/
/* ------------------------------------------- */
$arraym2 = [];
$arrayf2 = [];

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 0,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol1 = $row6['total'];
$fechal1 = $row6['fecha'];
$fecl1 = date("m/Y", strtotime($fechal1));
if(isset($montol1)){
    array_push($arraym2, $montol1);
    array_push($arrayf2, $fecl1);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 1,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol2 = $row6['total'];
$fechal2 = $row6['fecha'];
$fecl2 = date("m/Y", strtotime($fechal2));
if(isset($montol2)){
    array_push($arraym2, $montol2);
    array_push($arrayf2, $fecl2);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 2,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol3 = $row6['total'];
$fechal3 = $row6['fecha'];
$fecl3 = date("m/Y", strtotime($fechal3));
if(isset($montol3)){
    array_push($arraym2, $montol3);
    array_push($arrayf2, $fecl3);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 3,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol4 = $row6['total'];
$fechal4 = $row6['fecha'];
$fecl4 = date("m/Y", strtotime($fechal4));
if(isset($montol4)){
    array_push($arraym2, $montol4);
    array_push($arrayf2, $fecl4);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 4,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol5 = $row6['total'];
$fechal5 = $row6['fecha'];
$fecl5 = date("m/Y", strtotime($fechal5));
if(isset($montol5)){
    array_push($arraym2, $montol5);
    array_push($arrayf2, $fecl5);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 5,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol6 = $row6['total'];
$fechal6 = $row6['fecha'];
$fecl6 = date("m/Y", strtotime($fechal6));
if(isset($montol6)){
    array_push($arraym2, $montol6);
    array_push($arrayf2, $fecl6);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 6,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol7 = $row6['total'];
$fechal7 = $row6['fecha'];
$fecl7 = date("m/Y", strtotime($fechal7));
if(isset($montol7)){
    array_push($arraym2, $montol7);
    array_push($arrayf2, $fecl7);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 7,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol8 = $row6['total'];
$fechal8 = $row6['fecha'];
$fecl8 = date("m/Y", strtotime($fechal8));
if(isset($montol8)){
    array_push($arraym2, $montol8);
    array_push($arrayf2, $fecl8);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 8,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol9 = $row6['total'];
$fechal9 = $row6['fecha'];
$fecl9 = date("m/Y", strtotime($fechal9));
if(isset($montol9)){
    array_push($arraym2, $montol9);
    array_push($arrayf2, $fecl9);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 9,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol10 = $row6['total'];
$fechal10 = $row6['fecha'];
$fecl10 = date("m/Y", strtotime($fechal10));
if(isset($montol10)){
    array_push($arraym2, $montol10);
    array_push($arrayf2, $fecl10);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 10,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol11 = $row6['total'];
$fechal11 = $row6['fecha'];
$fecl11 = date("m/Y", strtotime($fechal11));
if(isset($montol11)){
    array_push($arraym2, $montol11);
    array_push($arrayf2, $fecl11);
}

$sql6 = "SELECT SUM(d.monto) AS total, m.fecha
FROM movimientolicitacion m
LEFT JOIN datoslicitacion d ON d.idLicitacion = m.idLicitacion
WHERE m.idEstadoLicitacion = 6
GROUP BY MONTH(m.fecha), YEAR(m.fecha) 
ORDER BY m.fecha DESC 
LIMIT 11,1";
$result6 = $datos_base->query($sql6);
$row6 = $result6->fetch_assoc();
$montol12 = $row6['total'];
$fechal12 = $row6['fecha'];
$fecl12 = date("m/Y", strtotime($fechal12));
if(isset($montol12)){
    array_push($arraym2, $montol12);
    array_push($arrayf2, $fecl12);
}

?>
    <script>
    let miCanvas=document.getElementById("MiGrafica").getContext("2d");

    var chart = new Chart(miCanvas,{
        type: "bar",/* doughnut  */
        data:{
            labels:[
            "<?php echo "1- En proceso";?>",
            "<?php echo "2- Concretadas:";?>",
            "<?php echo "3- Rechazadas:";?>", 
],

            datasets:[{
                label: "",
                backgroundColor: [
                    "rgb(0, 197, 255)", 
                    "rgb(0, 255, 42)",
                    "rgb(255, 0, 0)",],
                borderColor: "black",
                data:[
                    <?php echo $docProceso;?>, 
                    <?php echo $docPagado;?>,
                    <?php echo $docRechazado ;?>,
                ]
            }]
        }
    })
    </script>

    <script>
    let miCanvas1=document.getElementById("MiGrafica1").getContext("2d");

    var chart = new Chart(miCanvas1,{
        type: "bar",
        data:{
            labels:[
                "<?php echo "1- En proceso";?>",
                "<?php echo "2- Concretadas:";?>",
                "<?php echo "3- Rechazadas:";?>", 
                    ],
            datasets:[{
                label: "",
                backgroundColor: [
                    "rgb(0, 197, 255)", 
                    "rgb(0, 255, 42)",
                    "rgb(255, 0, 0)",],
                borderColor: "black",
                data:[
                    <?php echo $licProceso;?>, 
                    <?php echo $licPagada;?>,
                    <?php echo $licRechazada ;?>,
                ]
            }]
        }
    })
    </script>


<script>
let miCanvas2=document.getElementById("MiGrafica2").getContext("2d");

var chart = new Chart(miCanvas2,{
    type: "line",
    data:{
        labels:[
            <?php 
                $largo = count($arrayf);
                $i = $largo -1;
                while($i >= 0){
                    echo json_encode($arrayf[$i]).',';
                    $i--;
                }
                ;?>
        ],
        datasets:[{
            label: "INGRESOS",
            backgroundColor: "",
            borderColor: "green",
            data:[
                <?php 
                $largo = count($arraym);
                $i = $largo - 1;
                while($i >= 0){
                    echo json_encode($arraym[$i]).',';
                    $i--;
                }
                ;?>
                ]
        },
    ]
    }
})
    </script>
<script>
let miCanvas3=document.getElementById("MiGrafica3").getContext("2d");

var chart = new Chart(miCanvas3,{
    type: "line",
    data:{
        labels:[
            <?php 
                $largo = count($arrayf2);
                $i = $largo -1;
                while($i >= 0){
                    echo json_encode($arrayf2[$i]).',';
                    $i--;
                }
                ;?>
        ],
        datasets:[{
            label: "EGRESOS",
            backgroundColor: "",
            borderColor: "red",
            data:[
                <?php 
                $largo = count($arraym2);
                $i = $largo - 1;
                while($i >= 0){
                    echo json_encode($arraym2[$i]).',';
                    $i--;
                }
                ;?>
                ]
        },
    ]
    }
})
    </script>

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