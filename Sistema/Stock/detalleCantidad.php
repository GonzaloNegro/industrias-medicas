<?php
error_reporting(0);
session_start();
include('../../Utils/conexion.php');

$consultar = $_GET['no'];

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
    <script type="text/javascript">
        function ok(){
            swal.fire(  {title: "Productos suprimidos correctamente",
                    icon: "success",
                    showConfirmButton: true,
                    showCancelButton: false,
                    })}	
	</script>
    <script type="text/javascript">
    function pedido(){
        swal.fire(  {title: "Stock solicitado correctamente",
                icon: "success",
                showConfirmButton: true,
                showCancelButton: false,
                })}	
	</script>
    <?php include('../Layouts/stockHeader.php'); ?>
    <main>
        <section class="ini">
            <div class="ini-tit">
                <?php
                if($consultar == "bajo"){
                    echo "<h1>Stock bajo</h1>";
                }elseif($consultar == "alto"){
                    echo "<h1>Stock alto</h1>";
                }elseif($consultar == "medio"){
                    echo "<h1>Stock óptimo</h1>";
                }
                ?>
                
            </div>
            <div class="container">
                <form method="POST" action=<?php echo "./detalleCantidad.php?no=$consultar"?>>
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
                                    <th><p style='text-align:left; margin-left: 5px;'>PRODUCTO</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>GRUPO</p></th>
                                    <th><p style='margin:5px;'>TIPO</p></th>
                                    <th><p style='margin:5px;'>CANTIDAD</p></th>
                                    <th><p style='margin:5px;'>MODIFICAR</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $cantidad = 0;

                                    if($consultar == "bajo"){
                                        $bajo = 0;
                                        $doc = $_POST['buscar'];
                                        $consulta=mysqli_query($datos_base, "SELECT p.idProducto, p.producto, g.grupoProducto, t.tipoProducto, p.cantidad, p.minimo, p.maximo
                                        FROM producto p
                                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                                        WHERE p.cantidad < p.minimo AND (p.producto LIKE '%$doc%' OR g.grupoProducto LIKE '%$doc%' OR t.tipoProducto LIKE '%$doc%' OR p.cantidad LIKE '%$doc%')
                                        ORDER BY t.tipoProducto ASC, p.cantidad ASC");
                                    }

                                    if($consultar == "alto"){
                                        $alto = 0;
                                        $doc = $_POST['buscar'];
                                        $consulta=mysqli_query($datos_base, "SELECT p.idProducto, p.producto, g.grupoProducto, t.tipoProducto, p.cantidad, p.minimo, p.maximo
                                        FROM producto p
                                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                                        WHERE p.cantidad > p.maximo AND (p.producto LIKE '%$doc%' OR g.grupoProducto LIKE '%$doc%' OR t.tipoProducto LIKE '%$doc%' OR p.cantidad LIKE '%$doc%')
                                        ORDER BY t.tipoProducto ASC, p.cantidad ASC");
                                    }

                                    if($consultar == "medio"){
                                        $medio = 0;
                                        $doc = $_POST['buscar'];
                                        $consulta=mysqli_query($datos_base, "SELECT p.idProducto, p.producto, g.grupoProducto, t.tipoProducto, p.cantidad, p.minimo, p.maximo
                                        FROM producto p
                                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                                        WHERE (p.cantidad <= p.maximo AND p.cantidad >= p.minimo)  AND (p.producto LIKE '%$doc%' OR g.grupoProducto LIKE '%$doc%' OR t.tipoProducto LIKE '%$doc%' OR p.cantidad LIKE '%$doc%')
                                        ORDER BY t.tipoProducto ASC, p.cantidad ASC");
                                    }


                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        if($consultar == "bajo"){$bajo++;}
                                        if($consultar == "alto"){$alto++;}
                                        if($consultar == "medio"){$medio++;}
                                        $cantidad++;
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['producto']."</h4 ></td>
                                            <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['grupoProducto']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['tipoProducto']."</h4 ></td>
                                            <td><h4 style='font-size:16px; text-align: right; margin-right: 5px;'>".$listar['cantidad']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleStock.php?no=".$listar['idProducto']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    } 
                                }



                                
                                else{
                                    $cantidad = 0;

                                    if($consultar == "bajo"){
                                        $bajo = 0;
                                        $consulta=mysqli_query($datos_base, "SELECT p.idProducto, p.producto, g.grupoProducto, t.tipoProducto, p.cantidad, p.minimo, p.maximo
                                        FROM producto p
                                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                                        WHERE p.cantidad < p.minimo
                                        ORDER BY t.tipoProducto ASC, p.cantidad ASC");
                                    }

                                    if($consultar == "alto"){
                                        $alto = 0;
                                        $consulta=mysqli_query($datos_base, "SELECT p.idProducto, p.producto, g.grupoProducto, t.tipoProducto, p.cantidad, p.minimo, p.maximo
                                        FROM producto p
                                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                                        WHERE p.cantidad > p.maximo
                                        ORDER BY t.tipoProducto ASC, p.cantidad ASC");
                                    }

                                    if($consultar == "medio"){
                                        $medio = 0;
                                        $consulta=mysqli_query($datos_base, "SELECT p.idProducto, p.producto, g.grupoProducto, t.tipoProducto, p.cantidad, p.minimo, p.maximo
                                        FROM producto p
                                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                                        WHERE p.cantidad <= p.maximo AND p.cantidad >= p.minimo
                                        ORDER BY t.tipoProducto ASC, p.cantidad ASC");
                                    }

                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        if($consultar == "bajo"){$bajo++;}
                                        if($consultar == "alto"){$alto++;}
                                        if($consultar == "medio"){$medio++;}
                                        $cantidad++;
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['producto']."</h4 ></td>
                                            <td><h4 style='font-size:16px; text-align:left; margin-left: 5px;'>".$listar['grupoProducto']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['tipoProducto']."</h4 ></td>
                                            <td><h4 style='font-size:16px; text-align: right; margin-right: 5px;'>".$listar['cantidad']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleStock.php?no=".$listar['idProducto']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    }
                                }
                                echo "<div class=contador>
                                        <a href='./stock.php'><button class='btn btn-info'; style='color:white;'>← VOLVER A STOCK GENERAL</button></a>
                                        <div class=contador_pri>
                                        ";
                                            if($consultar == "bajo"){
                                                echo "<p style='color: #DC3545; font-weight: bold;'>STOCK BAJO: $bajo</p>";}
                                            if($consultar == "alto"){
                                                echo "<p style='color: blue; font-weight: bold;'>STOCK ALTO: $alto</p>";}
                                            if($consultar == "medio"){
                                                echo "<p style='color: #198754; font-weight: bold;'>STOCK ÓPTIMO: $medio</p>";}
                                            echo "
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
            <?php
            if(isset($_GET['ok'])){
                ?>
                <script>ok();</script>
                <?php			
            }
            ?>
            <?php
            if(isset($_GET['pedido'])){
                ?>
                <script>pedido();</script>
                <?php			
            }
            ?>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>