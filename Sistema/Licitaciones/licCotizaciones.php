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
        if($idRol == $roldeposito OR $idRol == $rolobra){
            header("Location: ../principal.php");
        }
        ?>
<script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Licitación generada correctamente",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						});
			}	
			</script>
<script type="text/javascript">
			function postulado(){
				swal.fire(  {title: "Postulación generada correctamente",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						});
			}	
			</script>
    <?php include('../Layouts/licitacionesHeader.php'); ?>
    <main>
        <section class="ini">
            <div class="ini-tit">
                <h1>LICITACIONES</h1>
                <h5>COTIZACIÓN DE PRODUCTOS</h5>
            </div>
            <div class="container">

                <form method="POST" action="./licCotizaciones.php">
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
                <?php if($idRol == $roladmin OR $idRol == $rolgerente){ ?>
                <div class="agregar">
                    <a href="./agregarLicCotizacion.php" class="nuevo" data-bs-toggle="tooltip" title="Nueva licitación" data-bs-placement="left">+</a>
                </div>
                <?php }?>
            </div>

             <?php
                    /* LO QUE VA A VER IM, ES DECIR, TODO */
                    if($idRol == $rolgerente OR $idRol == $roladmin)
                    {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p>N°LICITACIÓN</p></th>
                                    <th><p>FECHA APERTURA</p></th>
                                    <th><p>FECHA CIERRE</p></th>
                                    <th><p>POSTULACIÓN</p></th>
                                    <th><p>POSTULANTES</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT l.idLicitacion, m.fecha, m.fechaVen
                                    FROM licitacion l
                                    LEFT JOIN movimientolicitacion AS m ON m.idLicitacion = l.idLicitacion
                                    WHERE m.idEstadoLicitacion = 1  AND (l.idLicitacion LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR m.fechaVen LIKE '%$doc%')
                                    GROUP BY l.idLicitacion
                                    ORDER BY l.idLicitacion DESC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $lici = $listar['idLicitacion'];
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        $fecven = date("d-m-Y", strtotime($listar['fechaVen']));
                                        echo
                                        " 
                                        <tr>
                                            <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idLicitacion']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fecven."</h4 ></td>";

                                            $sql6 = "SELECT d.idUsuario, l.idEstadoLicitacion 
                                            FROM datoslicitacion d
                                            LEFT JOIN licitacion l ON l.idLicitacion = d.idLicitacion
                                            WHERE d.idLicitacion = $lici";
                                            $result6 = $datos_base->query($sql6);
                                            $row6 = $result6->fetch_assoc();
                                            $vacio = $row6['idUsuario'];
                                            $est = $row6['idEstadoLicitacion'];
                                            if($vacio == 0 AND $est != 7){
                                                echo "<td><h4 style='font-size:16px;'>ABIERTA</h4 ></td>";
                                            }else{
                                                echo "<td><h4 style='font-size:16px;'>CERRADA</h4 ></td>";
                                            }
                                            if($idUsu == 1){
                                                echo 
                                                "
                                                <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./postulantesLicCotizacion.php?no=".$listar['idLicitacion']." target=new class=mod><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentcolor' margin='5' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                              </svg></a></td>
                                                ";
                                            }

                                            echo "
                                            </tr>
                                        ";
                                    } 
                                }
                                else{
                                $consulta=mysqli_query($datos_base, "SELECT l.idLicitacion, m.fecha, m.fechaVen
                                FROM licitacion l
                                LEFT JOIN movimientolicitacion AS m ON m.idLicitacion = l.idLicitacion
                                WHERE m.idEstadoLicitacion = 1
                                GROUP BY l.idLicitacion
                                ORDER BY l.idLicitacion DESC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {   
                                        $lici = $listar['idLicitacion'];
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        $fecven = date("d-m-Y", strtotime($listar['fechaVen']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idLicitacion']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fecven."</h4 ></td>";

                                            $sql6 = "SELECT d.idUsuario, l.idEstadoLicitacion 
                                            FROM datoslicitacion d
                                            LEFT JOIN licitacion l ON l.idLicitacion = d.idLicitacion
                                            WHERE d.idLicitacion = $lici";
                                            $result6 = $datos_base->query($sql6);
                                            $row6 = $result6->fetch_assoc();
                                            $vacio = $row6['idUsuario'];
                                            $est = $row6['idEstadoLicitacion'];
                                            if($vacio == 0 AND $est != 7){
                                                echo "<td><h4 style='font-size:16px;'>ABIERTA</h4 ></td>";
                                            }else{
                                                echo "<td><h4 style='font-size:16px;'>CERRADA</h4 ></td>";
                                            }
                                            if($idUsu == 1){
                                                echo 
                                                "
                                                <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./postulantesLicCotizacion.php?no=".$listar['idLicitacion']." target=new class=mod><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentcolor' margin='5' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                              </svg></a></td>
                                                ";
                                            }

                                            echo "
                                            </tr>
                                        ";
                                    }
                                }
                                echo "</table>";
                            }
                            elseif($idRol == $rolproveedor){
                                echo "<table>
                                <thead>
                                    <tr>
                                        <th><p>N°LICITACIÓN</p></th>
                                        <th><p>FECHA APERTURA</p></th>
                                        <th><p>FECHA CIERRE</p></th>
                                        <th><p>POSTULACIÓN</p></th>
                                    </tr>
                                </thead>
                            ";
                            if(isset($_POST['btn2']))
                                    {
                                        $doc = $_POST['buscar'];
                                        $consulta=mysqli_query($datos_base, "SELECT l.idLicitacion, m.fecha, m.fechaVen
                                        FROM licitacion l
                                        LEFT JOIN movimientolicitacion AS m ON m.idLicitacion = l.idLicitacion
                                        WHERE m.idEstadoLicitacion = 1  AND (l.idLicitacion LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR m.fechaVen LIKE '%$doc%')
                                        GROUP BY l.idLicitacion
                                        ORDER BY l.idLicitacion DESC");
                                        while($listar = mysqli_fetch_array($consulta)) 
                                        {
                                            $lici = $listar['idLicitacion'];
                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            $fecven = date("d-m-Y", strtotime($listar['fechaVen']));
                                            echo
                                            " 
                                                <tr>
                                                <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idLicitacion']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fecven."</h4 ></td>";
    
                                                $sql6 = "SELECT d.idUsuario, l.idEstadoLicitacion 
                                                FROM datoslicitacion d
                                                LEFT JOIN licitacion l ON l.idLicitacion = d.idLicitacion
                                                WHERE d.idLicitacion = $lici";
                                                $result6 = $datos_base->query($sql6);
                                                $row6 = $result6->fetch_assoc();
                                                $vacio = $row6['idUsuario'];
                                                $est = $row6['idEstadoLicitacion'];
                                                if($vacio == 0 AND $est != 7){
                                                    echo "
                                                <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./postulacionLicCotizacion.php?no=".$listar['idLicitacion']." class=mod><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                </svg></a></td>
                                                ";}else{
                                                    echo "<td><h4 style='font-size:16px;'>CERRADA</h4 ></td>";
                                                }
                                                echo"</tr>";
                                        } 
                                    }
                                    else{
                                    $consulta=mysqli_query($datos_base, "SELECT l.idLicitacion, m.fecha, m.fechaVen
                                    FROM licitacion l
                                    LEFT JOIN movimientolicitacion AS m ON m.idLicitacion = l.idLicitacion
                                    WHERE m.idEstadoLicitacion = 1
                                    GROUP BY l.idLicitacion
                                    ORDER BY l.idLicitacion DESC");
                                        while($listar = mysqli_fetch_array($consulta)) 
                                        {   
                                            $lici = $listar['idLicitacion'];
                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            $fecven = date("d-m-Y", strtotime($listar['fechaVen']));
                                            echo
                                            " 
                                                <tr>
                                                <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idLicitacion']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fecven."</h4 ></td>";
    
                                                $sql6 = "SELECT d.idUsuario, l.idEstadoLicitacion 
                                                FROM datoslicitacion d
                                                LEFT JOIN licitacion l ON l.idLicitacion = d.idLicitacion
                                                WHERE d.idLicitacion = $lici";
                                                $result6 = $datos_base->query($sql6);
                                                $row6 = $result6->fetch_assoc();
                                                $vacio = $row6['idUsuario'];
                                                $est = $row6['idEstadoLicitacion'];
                                                if($vacio == 0 AND $est != 7){
                                                    echo "
                                                <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./postulacionLicCotizacion.php?no=".$listar['idLicitacion']." class=mod><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                </svg></a></td>
                                                ";}else{
                                                    echo "<td><h4 style='font-size:16px;'>CERRADA</h4 ></td>";
                                                }
                                                echo"</tr>";
                                        }
                                    }
                                    echo "</table>";
                                };?>
            <?php
            if(isset($_GET['ok'])){
                ?>
                <script>ok();</script>
                <?php			
            }
            ?>
            <?php
            if(isset($_GET['postulado'])){
                ?>
                <script>postulado();</script>
                <?php			
            }
            ?>
        </section>
    </main>

      <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>