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
        if($idRol == $roldeposito OR $idRol == $rolventas OR $idRol == $rolobra OR $idRol == $rolproveedor){
            header("Location: ../principal.php");
        }
        ?>
<script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Presupuesto generado correctamente",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='./cotizaciones.php';
						}
						}
						);
			}	
			</script>
<script type="text/javascript">
			function no(){
				swal.fire(  {title: "El presupuesto no se ha generado. Por favor verifique los datos ingresados",
						icon: "error",
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='./cotizaciones.php';
						}
						}
						);
			}	
			</script>
    <?php include('../Layouts/licitacionesHeader.php'); ?>
    <main>
        <section class="ini">
            <div class="ini-tit">
                <h1>LICITACIONES</h1>
                <h5>SOLICITUDES</h5>
            </div>
            <div class="container">

                <form method="POST" action="./solicitudLicitacion.php">
                    <div class="form-grilla">
                        <div class="form-grilla-busc">
                            <input type="text" style="text-transform:uppercase;" name="buscar"  placeholder="Buscar" class="busc">
                        </div>
                        <div class="form-grilla-but">
                            <input class="btn btn-success" type="submit" name="btn2" value="BUSCAR"></input>
                            <input class="btn btn-danger" type="submit" name="btn1" value="LIMPIAR"></input>
                        </div>
                    </div>
                </form>
            </div>

             <?php
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p style='text-align:left; margin-left: 5px;'>ESTADO</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>PRODUCTO</p></th>
                                    <th style='width:85px;'><p>FECHA</p></th>
                                    <th><p style='margin:5px;'>CANT</p></th>
                                    <th><p style='margin:5px;'>DETALLES</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT s.idSolicitud, p.producto, s.fecha, s.cantidad, e.estadoSolicitud
                                    FROM solicitudes s
                                    LEFT JOIN producto p ON p.idProducto = s.idProducto
                                    LEFT JOIN estadosolicitud e ON e.idEstadoSolicitud = s.idEstadoSolicitud
                                    WHERE s.idSolicitud LIKE '%$doc%' OR p.producto LIKE '%$doc%' OR s.fecha LIKE '%$doc%' OR s.cantidad LIKE '%$doc%' OR e.estadoSolicitud LIKE '%$doc%'
                                    ORDER BY e.estadoSolicitud DESC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        if($listar['estadoSolicitud'] == 'FINALIZADA'){
                                            $color = 'green';
                                        }elseif($listar['estadoSolicitud'] == 'PENDIENTE'){
                                            $color = 'red';
                                        }elseif($listar['estadoSolicitud'] == 'EN PROCESO'){
                                            $color = 'blue';
                                        }else{
                                            $color = 'black';
                                        }
                                        
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                        <tr>
                                        <td><h4 style='font-size:14px;text-align:left; margin-left: 5px;color:".$color."'>".$listar['estadoSolicitud']."</h4 ></td>
                                        <td><h4 style='font-size:14px; text-align:left; margin-left: 5px;'>".$listar['producto']."</h4 ></td>
                                        <td><h4 style='font-size:14px;'>".$fec."</h4 ></td>
                                        <td><h4 style='font-size:14px;text-align: right; margin-right: 5px; '>".$listar['cantidad']."</h4 ></td>
                                        <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleSolicitud.php?no=".$listar['idSolicitud']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                        </tr>
                                        ";
                                    } 
                                }
                                else{
                                    $consulta=mysqli_query($datos_base, "SELECT s.idSolicitud, p.producto, s.fecha, s.cantidad, e.estadoSolicitud
                                    FROM solicitudes s
                                    LEFT JOIN producto p ON p.idProducto = s.idProducto
                                    LEFT JOIN estadosolicitud e ON e.idEstadoSolicitud = s.idEstadoSolicitud
                                    ORDER BY e.estadoSolicitud DESC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {

                                        if($listar['estadoSolicitud'] == 'FINALIZADA'){
                                            $color = 'green';
                                        }elseif($listar['estadoSolicitud'] == 'PENDIENTE'){
                                            $color = 'red';
                                        }elseif($listar['estadoSolicitud'] == 'EN PROCESO'){
                                            $color = 'blue';
                                        }else{
                                            $color = 'black';
                                        }

                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:14px;text-align:left; margin-left: 5px;color:".$color."'>".$listar['estadoSolicitud']."</h4 ></td>
                                            <td><h4 style='font-size:14px; text-align:left; margin-left: 5px;'>".$listar['producto']."</h4 ></td>
                                            <td><h4 style='font-size:14px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:14px;text-align: right; margin-right: 5px; '>".$listar['cantidad']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleSolicitud.php?no=".$listar['idSolicitud']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    }
                                }
                                echo "</table>";
                                    ?>
        </section>
    </main>

      <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>