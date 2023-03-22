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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
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
    <?php include('./Layouts/usuarioHeader.php'); ?>

    <main>
        <section>
            <div class="principal">
                <div class="principal-info">
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
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <div class="card-pri">
                                <i class="fa-solid fa-face-smile"></i>
                                <span class="count-numbers"><?php echo round(($promedio) ,2)."/5";?></span>
                            </div>
                            <div class="card-sec">
                                <span class="count-name">Satisfacción ventas</span>
                            </div>
                        </div>
                    </div>

                        <?php 
                            $sql6 = "SELECT sum(da.monto) as suma
                            FROM datosdocumento da
                            LEFT JOIN documento d ON d.idDocumento = da.idDocumento
                            WHERE d.idEstadoDocumento = 10";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $cotact = $row6['suma'];
                        ?>
                    <div class="col-md-3">
                        <div class="card-counter success">
                            <div class="card-pri">
                                <i class="fa-sharp fa-solid fa-arrow-up"></i>
                                <span class="count-numbers"><?php echo "$".round($cotact, 2);?></span>
                            </div>
                            <div class="card-sec">
                                <span class="count-name">Ingresos generados</span>
                            </div>
                        </div>
                    </div>

                    <?php 
                            $sql6 = "SELECT sum(da.monto) as suma
                            FROM datoslicitacion da
                            LEFT JOIN licitacion l ON l.idLicitacion = da.idLicitacion
                            WHERE l.idEstadoLicitacion = 6";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $lictot = $row6['suma'];
                        ?>
                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <div class="card-pri">
                                <i class="fa-sharp fa-solid fa-arrow-down"></i>
                                <span class="count-numbers"><?php echo "$".round($lictot, 2);?></span>
                            </div>
                            <div class="card-sec">
                                <span class="count-name">Gastos generados</span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="secundario-info">
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
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <div class="card-pri">
                                <i class="fa-sharp fa-regular fa-calendar"></i>
                                <span class="count-numbers"><?php echo number_format($promTotal, 2);?></span>
                            </div>
                            <div class="card-sec">
                                <span class="count-name">Dìas promedio p/venta</span>
                            </div>
                        </div>
                    </div>

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
                    <div class="col-md-3">
                        <div class="card-counter success">
                            <div class="card-pri">
                                <i class="fa-regular fa-circle-check"></i>
                                <span class="count-numbers"><?php echo round(($docven * 100)/$doctot, 2)."%";?></span>
                            </div>
                            <div class="card-sec">
                                <span class="count-name">Ventas exitosas</span>
                            </div>
                        </div>
                    </div>

                    <?php $balance = $cotact - $lictot;?>

                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <div class="card-pri">
                                <i class="fa-solid fa-dollar-sign"></i>
                                <span class="count-numbers"><?php echo "$".round($balance, 2);?></span>
                            </div>
                            <div class="card-sec">
                                <span class="count-name">Balance</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tercer-card">
                    <div class="card stats">
                        <div class="card-body">
                            <h5 class="card-title">Productos más solicitados</h5>
                            <a href='prodSolicitados.php' class="btn btn-secondary">Ver todos</a>
                        </div>
                    </div>
                    
                    <div class="card stats">
                        <div class="card-body">
                            <h5 class="card-title">Productos más vendidos</h5>
                            <a href='prodVendidos.php' class="btn btn-secondary">Ver todos</a>
                        </div>
                    </div>
                </div>

                <div class="tercer-card">
                    <div class="card stats">
                        <div class="card-body">
                            <h5 class="card-title">Obras sociales mas recurrentes</h5>
                            <a href='obrasRecurrentes.php' class="btn btn-secondary">Ver todos</a>
                        </div>
                    </div>
                    
                    <div class="card stats">
                        <div class="card-body">
                            <h5 class="card-title">Proveedores màs recurrentes</h5>
                            <a href='provRecurrentes.php' class="btn btn-secondary">Ver todos</a>
                        </div>
                    </div>
                </div>


                <div class="principal-datos">
                    <div class="principal-datos-cont">
                        <h2>OBRA SOCIAL MÁS RECURRENTE</h2>
                        <?php
                    echo "<table>
                    <thead class=colm>
                        <tr>
                            <th><p>PROVEEDOR</p></th>
                            <th><p style='text-align:right;'>CANTIDAD</p></th>
                        </tr>
                    </thead>
                ";
                        $consulta=mysqli_query($datos_base, "SELECT COUNT(da.idDocumento) AS cantidad, u.usuario
                        FROM datosdocumento da 
                        LEFT JOIN documento d ON d.idDocumento = da.idDocumento
                        LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
                        WHERE d.idEstadoDocumento = 10 
                        GROUP BY da.idUsuario 
                        LIMIT 3");
                            while($listar = mysqli_fetch_array($consulta)) 
                            {
                                echo
                                " 
                                    <tr>
                                    <td><h4 style='font-size:16px;'>".$listar['usuario']."</h4 ></td>
                                    <td><h4 style='font-size:16px; text-align: right; margin-right: 5px;'>".$listar['cantidad']."</h4 ></td>
                                    </tr>
                                ";
                            }
                                echo "</table>";
                                    ?>
                    </div>
                </div>
                <br>


                <div class="principal-datos">
                    <div class="principal-datos-cont">
                        <h2>PROVEEDORES MÁS RECURRENTES</h2>
                        <?php
                    echo "<table>
                            <thead class=colm>
                                <tr>
                                    <th><p>PROVEEDOR</p></th>
                                    <th><p style='text-align:right;'>CANTIDAD</p></th>
                                </tr>
                            </thead>
                        ";
                                $consulta=mysqli_query($datos_base, "SELECT COUNT(da.idLicitacion) AS cantidad, u.usuario
                                FROM datoslicitacion da 
                                LEFT JOIN licitacion l ON l.idLicitacion = da.idLicitacion
                                LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
                                WHERE l.idEstadoLicitacion = 6 
                                GROUP BY da.idUsuario 
                                LIMIT 3");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px; text-align: right; margin-right: 5px; '>".$listar['cantidad']."</h4 ></td>
                                            </tr>
                                        ";
                                    }
                                echo "</table>";
                                    ?>
                    </div>
                </div>

                <?php
                /* GRÁFICO DÍAS VENTA */
                    $sql6 = "SELECT COUNT(*) AS CANTIDADDIAS FROM documento WHERE idEstadoDocumento = 10";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $cantidadDiasVentas = $row6['CANTIDADDIAS'];


                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 2";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $cotPresupuestada = round(($row6['total'] / $cantidadDiasVentas) ,1);

                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 3";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $ordenCompra = round(($row6['total'] / $cantidadDiasVentas) ,1);

                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 8";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $deposito = round(($row6['total'] / $cantidadDiasVentas) ,1);

                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 4";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $remito = round(($row6['total'] / $cantidadDiasVentas) ,1);

                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 5";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $factura = round(($row6['total'] / $cantidadDiasVentas) ,1);

                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 6";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $ordenPago = round(($row6['total'] / $cantidadDiasVentas) ,1);

                    $sql6 = "SELECT SUM(cantDias) AS total
                    FROM movimientodocumento WHERE idEstadoDocumento = 10";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $pagado = round(($row6['total'] / $cantidadDiasVentas) ,1);



                   /* GRÀFICO DÌAS DE LICITACIÒN */ 
                   $sql6 = "SELECT COUNT(*) AS CANTIDADDIAS FROM licitacion WHERE idEstadoLicitacion = 6";
                   $result6 = $datos_base->query($sql6);
                   $row6 = $result6->fetch_assoc();
                   $cantidadDiasLicitacion = $row6['CANTIDADDIAS'];



                   $sql6 = "SELECT SUM(m.cantDias) AS total
                   FROM movimientolicitacion m
                   LEFT JOIN licitacion l ON l.idLicitacion = m.idLicitacion
                   WHERE m.idEstadolicitacion = 2
                   AND l.idEstadoLicitacion = 6";
                   $result6 = $datos_base->query($sql6);
                   $row6 = $result6->fetch_assoc();
                   $licOrdenCompra = round(($row6['total'] / $cantidadDiasLicitacion) ,1);

                   $sql6 = "SELECT SUM(m.cantDias) AS total
                   FROM movimientolicitacion m
                   LEFT JOIN licitacion l ON l.idLicitacion = m.idLicitacion
                   WHERE m.idEstadolicitacion = 3
                   AND l.idEstadoLicitacion = 6";
                   $result6 = $datos_base->query($sql6);
                   $row6 = $result6->fetch_assoc();
                   $licRemito = round(($row6['total'] / $cantidadDiasLicitacion) ,1);

                   $sql6 = "SELECT SUM(m.cantDias) AS total
                   FROM movimientolicitacion m
                   LEFT JOIN licitacion l ON l.idLicitacion = m.idLicitacion
                   WHERE m.idEstadolicitacion = 4
                   AND l.idEstadoLicitacion = 6";
                   $result6 = $datos_base->query($sql6);
                   $row6 = $result6->fetch_assoc();
                   $licFactura = round(($row6['total'] / $cantidadDiasLicitacion) ,1);

                   $sql6 = "SELECT SUM(m.cantDias) AS total
                   FROM movimientolicitacion m
                   LEFT JOIN licitacion l ON l.idLicitacion = m.idLicitacion
                   WHERE m.idEstadolicitacion = 5
                   AND l.idEstadoLicitacion = 6";
                   $result6 = $datos_base->query($sql6);
                   $row6 = $result6->fetch_assoc();
                   $licOrdenPago = round(($row6['total'] / $cantidadDiasLicitacion) ,1);

                   $sql6 = "SELECT SUM(m.cantDias) AS total
                   FROM movimientolicitacion m
                   LEFT JOIN licitacion l ON l.idLicitacion = m.idLicitacion
                   WHERE m.idEstadolicitacion = 6
                   AND l.idEstadoLicitacion = 6";
                   $result6 = $datos_base->query($sql6);
                   $row6 = $result6->fetch_assoc();
                   $licAprobada = round(($row6['total'] / $cantidadDiasLicitacion) ,1);
                ?>



                <div class="contGrafico">
                    <div class="grafico">
                        <div class="grafico-tit">
                            <h1>Días promedio por estado de venta</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica4" style="width: 800px; height: 300px;"></canvas>
                        </div>
                    </div>
                    <div class="grafico">
                        <div class="grafico-tit">
                            <h1>Días promedio por estado de Licitación</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica5" style="width: 800px; height: 300px;"></canvas>
                        </div>
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
    let miCanvas4=document.getElementById("MiGrafica4").getContext("2d");

    var chart = new Chart(miCanvas4,{
        type: "bar",
        data:{
            labels:[
                "<?php echo "1- Pedido Médico";?>",
                "<?php echo "2- Presupuesto:";?>",
                "<?php echo "3- Orden de compra:";?>",
                "<?php echo "4- Depósito";?>",
                "<?php echo "5- Remito:";?>",
                "<?php echo "6- Factura:";?>", 
                "<?php echo "7- Orden de pago";?>",
                    ],
            datasets:[{
                label: "",
                backgroundColor: [
                    "rgb(0, 197, 255)", 
                    "rgb(255, 0, 0)",
                    "rgb(0, 197, 255)", 
                    "rgb(0, 255, 42)",
                    "rgb(255, 0, 0)",
                    "rgb(0, 255, 42)",
                    "rgb(255, 0, 0)",],
                borderColor: "black",
                data:[
                    <?php echo $cotPresupuestada;?>, 
                    <?php echo $ordenCompra;?>,
                    <?php echo $deposito;?>, 
                    <?php echo $remito;?>,
                    <?php echo $factura;?>,
                    <?php echo $ordenPago;?>, 
                    <?php echo $pagado;?>,
                ]
            }]
        }
    })
    </script>

<script>
    let miCanvas5=document.getElementById("MiGrafica5").getContext("2d");

    var chart = new Chart(miCanvas5,{
        type: "bar",
        data:{
            labels:[
                "<?php echo "1- Lic.Cotizada";?>",
                "<?php echo "2- Lic.Orden de compra:";?>",
                "<?php echo "3- Lic.Remito:";?>",
                "<?php echo "4- Lic.Factura";?>",
                "<?php echo "5- Lic.Orden de pago:";?>",
                    ],
            datasets:[{
                label: "",
                backgroundColor: [
                    "rgb(0, 197, 255)", 
                    "rgb(255, 0, 0)",
                    "rgb(0, 197, 255)", 
                    "rgb(0, 255, 42)",
                    "rgb(255, 0, 0)",],
                borderColor: "black",
                data:[
                    <?php echo $licOrdenCompra;?>, 
                    <?php echo $licRemito;?>,
                    <?php echo $licFactura;?>, 
                    <?php echo $licOrdenPago;?>,
                    <?php echo $licAprobada;?>,
                ]
            }]
        }
    })
    </script>

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
    <script src="../Js/estadisticas.js"></script>
</body>
</html>