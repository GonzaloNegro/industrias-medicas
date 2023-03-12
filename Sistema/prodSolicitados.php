<?php
/* error_reporting(0); */
session_start(); 
include('../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
    <div class="cont-img">
        <a href="./principal.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri"></header>

    <main>
    <section class="ini">
        <div class="ini-tit">
            <h1>Productos solicitados</h1>
        </div>
        <div class="container">
                <form method="POST" action="./prodSolicitados.php">
                    <div class="form-grilla">
                        <div class="form-grilla-busc">
                            <input type="text" style="text-transform:uppercase;" name="buscar"  placeholder="Buscar" class="busc">
                        </div>
                        <div class="form-grilla-but">
                            <input class="button" type="submit" name="btn2" value="BUSCAR"></input>
                            <input class="button" type="submit" name="btn1" value="LIMPIAR"></input>
                            <i class="fa-solid fa-phone-plus"></i>
                        </div>
                    </div>
                </form>
            </div>
        <?php
            $sql6 = "SELECT sum(pl.cantidad) as cantidad
            FROM licitacion l
            LEFT JOIN productolicitacion pl ON pl.idLicitacion = l.idLicitacion
            WHERE l.idEstadoLicitacion = 6";
            $result6 = $datos_base->query($sql6);
            $row6 = $result6->fetch_assoc();
            $totalProd = $row6['cantidad'];
            echo "<p>Total de productos solicitados: $totalProd</p>"
        ?>
        <?php
        echo "<table>
                <thead>
                    <tr>
                        <th><p>PRODUCTO</p></th>
                        <th><p>GRUPO</p></th>
                        <th><p>CANTIDAD</p></th>
                    </tr>
                </thead>
            ";
            if(isset($_POST['btn2']))
            {
                $doc = $_POST['buscar'];
                $consulta=mysqli_query($datos_base, "SELECT sum(pl.cantidad) as cantidad, pr.producto, g.grupoProducto
                FROM licitacion l
                LEFT JOIN productolicitacion pl ON pl.idLicitacion = l.idLicitacion
                LEFT JOIN producto pr ON pr.idProducto = pl.idProducto
                LEFT JOIN grupoproducto g ON g.idGrupoProducto = pr.idGrupoProducto
                WHERE l.idEstadoLicitacion = 6 AND (pl.cantidad LIKE '%$doc%' OR pr.producto LIKE '%$doc%' OR g.grupoProducto LIKE '%$doc%')
                GROUP BY pr.producto
                ORDER BY cantidad DESC
                ");
                    while($listar = mysqli_fetch_array($consulta)) 
                    {
                        echo
                        " 
                            <tr>
                            <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['producto']."</h4 ></td>
                            <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['grupoProducto']."</h4 ></td>
                            <td><h4 style='font-size:16px;'>".$listar['cantidad']."</h4 ></td>
                            </tr>
                        ";
                }

            } 
            else{
                    $consulta=mysqli_query($datos_base, "SELECT sum(pl.cantidad) as cantidad, pr.producto, g.grupoProducto
                    FROM licitacion l
                    LEFT JOIN productolicitacion pl ON pl.idLicitacion = l.idLicitacion
                    LEFT JOIN producto pr ON pr.idProducto = pl.idProducto
                    LEFT JOIN grupoproducto g ON g.idGrupoProducto = pr.idGrupoProducto
                    WHERE l.idEstadoLicitacion = 6
                    GROUP BY pr.producto
                    ORDER BY cantidad DESC
                    ");
                        while($listar = mysqli_fetch_array($consulta)) 
                        {
                            echo
                            "
                                <tr>
                                    <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['producto']."</h4></td>
                                    <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['grupoProducto']."</h4></td>
                                    <td><h4 style='font-size:16px;'>".$listar['cantidad']."</h4 ></td>
                                </tr>
                            ";
                        }
                    }
                    echo "</table>"?>
                ?>
            <div class="agregar">
                <a href="./estadisticas.php" class="volver">VOLVER</a>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>