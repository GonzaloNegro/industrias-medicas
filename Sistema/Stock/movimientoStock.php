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
    <link rel="shortcut icon" href="../../Imagenes/c-titulo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Css/estilos.css"/>
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
        if($idRol == $roladmin OR $idRol == $rolventas OR $idRol == $rolobra OR $idRol == $rolproveedor){
            header("Location: ../principal.php");
        }
    ?>
    <?php include('../Layouts/stockHeader.php'); ?>

    <main>
        <section class="ini">
            <div class="ini-tit">
                <h1>Movimiento stock</h1>
            </div>
            <div class="container">
                <form method="POST" action="./movimientoStock.php">
                    <div class="form-grilla">
                        <div class="form-grilla-busc">
                            <input type="text" style="text-transform:uppercase;" name="buscar"  placeholder="Buscar" class="busc">
                        </div>
                        <div class="form-grilla-but">
                            <input class="btn btn-success" type="submit" name="btn2" value="BUSCAR"></input>
                            <input class="btn btn-danger" type="submit" name="btn1" value="LIMPIAR"></input>
                            <i class="fa-solid fa-phone-plus"></i>
                        </div>
                    </div>
                </form>
            </div>

             <?php
                    echo "<table>
                            <thead>
                                <tr>
                                    <th style='width:85px;margin:5px;'><p>FECHA</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>PRODUCTO</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>ESTADO</p></th>
                                    <th><p style='margin:5px;'>CANTIDAD</p></th>
                                    <th><p style='margin:5px;'>OBSERVACIONES</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $cantidad = 0;
                                    $bajo = 0;
                                    $reserva = 0;
                                    $disponible = 0;
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT m.idMovimientoProducto, p.producto, m.fecha, e.estadoProducto, m.cantidad
                                    FROM movimientoproducto m
                                    LEFT JOIN producto p ON p.idProducto = m.idProducto
                                    LEFT JOIN estadoproducto e ON e.idEstadoProducto = m.idEstadoProducto
                                    WHERE p.producto LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR e.estadoProducto LIKE '%$doc%' OR m.cantidad LIKE '%$doc%'
                                    ORDER BY m.fecha DESC");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        if($$listar['estadoProducto'] == 'ALTA'){
                                            $color = 'green';
                                            $disponible++;
                                        }elseif($listar['estadoProducto'] == 'BAJA'){
                                            $color = 'red';
                                            $bajo++;
                                        }elseif($listar['estadoProducto'] == 'RESERVADO'){
                                            $color = 'blue';
                                            $reserva++;
                                        }else{
                                            $color = 'black';
                                        }

                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        $cantidad++;
                                    echo
                                    " 
                                        <tr>
                                        <td><h4 style='font-size:14px; text-align:left; margin-left: 5px; color:".$color."'>".$fec."</h4 ></td>
                                        <td><h4 style='font-size:14px; text-align:left; margin-left: 5px; color:".$color."'>".$listar['producto']."</h4 ></td>
                                        <td><h4 style='font-size:14px; text-align:left; margin-left: 5px; color:".$color."'>".$listar['estadoProducto']."</h4 ></td>
                                        <td><h4 style='font-size:14px; text-align: right; margin-right: 5px; color:".$color."'>".$listar['cantidad']."</h4 ></td>
                                        <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detallemov.php?no=".$listar['idMovimientoProducto']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                        </tr>
                                    ";
                                    } 
                                }
                                else{
                                    $cantidad = 0;
                                    $bajo = 0;
                                    $reserva = 0;
                                    $disponible = 0;
                                    $consulta=mysqli_query($datos_base, "SELECT m.idMovimientoProducto, p.producto, m.fecha, e.estadoProducto, m.cantidad
                                    FROM movimientoproducto m
                                    LEFT JOIN producto p ON p.idProducto = m.idProducto
                                    LEFT JOIN estadoproducto e ON e.idEstadoProducto = m.idEstadoProducto
                                    ORDER BY m.fecha DESC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                            if($listar['estadoProducto'] == 'ALTA'){
                                                $color = 'green';
                                                $disponible++;
                                            }elseif($listar['estadoProducto'] == 'BAJA'){
                                                $color = 'red';
                                                $bajo++;
                                            }elseif($listar['estadoProducto'] == 'RESERVADO'){
                                                $color = 'blue';
                                                $reserva++;
                                            }else{
                                                $color = 'black';
                                            }

                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            $cantidad++;
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:14px; text-align:left; margin-left: 5px; color:".$color."'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:14px; text-align:left; margin-left: 5px; color:".$color."'>".$listar['producto']."</h4 ></td>
                                            <td><h4 style='font-size:14px; text-align:left; margin-left: 5px; color:".$color."'>".$listar['estadoProducto']."</h4 ></td>
                                            <td><h4 style='font-size:14px; text-align: right; margin-right: 5px; color:".$color."'>".$listar['cantidad']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detallemov.php?no=".$listar['idMovimientoProducto']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    }
                                }
                                echo "<div class=contador>
                                        <div class=contador_pri>
                                            <p style='color: red; font-weight: bold;'>BAJA: $bajo</p>
                                        </div>
                                        <div class=contador_seg>
                                            <p style='color: blue; font-weight: bold;'>EN RESERVA: $reserva</p>
                                        </div>
                                        <div class=contador_ter>
                                            <p style='color: green; font-weight: bold;'>ALTA: $disponible</p>
                                        </div>
                                    </div>";
                                    if($doc != ""){
                                        echo "<div style='margin-top:30px;'><p style='text-transform: uppercase;'><u>Filtrado por</u>: ".$doc."</p></div>";
                                    }
                                    echo "<div style='margin-top:10px;'><p style='text-transform: uppercase;'><u>Cantidad de registros</u>: ".$cantidad."</p></div>";
                                    echo"
                                </table>";
                                    ?>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>