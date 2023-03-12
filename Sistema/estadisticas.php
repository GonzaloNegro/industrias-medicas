<?php 
/* error_reporting(0); */
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
                            <h1>Balance 2023</h1>
                        </div>
                        <div class="grafico-gra">
                            <canvas id="MiGrafica2" style="width: 800px; height: 300px;"></canvas>
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

        $año2022 = 2022;
        $año2023 = 2023;

        $mes = 12; 
        $sql6 = "SELECT SUM(d.monto) AS total
        FROM movimientodocumento m
        LEFT JOIN datosdocumento d ON d.idDocumento = m.idDocumento
        WHERE m.idEstadoDocumento = 10 AND MONTH(m.fecha) = $mes AND YEAR(m.fecha) = $año2022";
        $result6 = $datos_base->query($sql6);
        $row6 = $result6->fetch_assoc();
        $diciembre = $row6['total'];
        echo $diciembre;
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
            "<?php echo "1- Enero";?>",
            "<?php echo "2- Febrero";?>",
            "<?php echo "3- Marzo";?>",
            "<?php echo "4- Abril";?>",
            "<?php echo "5- Mayo";?>",
            "<?php echo "6- Junio";?>",
            "<?php echo "7- Julio";?>",
            "<?php echo "8- Agosto";?>",
            "<?php echo "9- Septiembre";?>", 
            "<?php echo "10- Octubre";?>",
            "<?php echo "11- Noviembre";?>",
            "<?php echo "12- Diciembre";?>", 
                ],
        datasets:[{
            label: "INGRESOS",
            backgroundColor: "green",
            borderColor: "green",
            data:[22, 55, 35, 33, 24, 15, 50, 20, 33, 35, 24, 26]
        },
        {
            label: "EGRESOS",
            backgroundColor: "red",
            borderColor: "red",
            data:[12, 25, 45, 23, 14, 25, 46, 10, 23, 25, 30, 40]
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