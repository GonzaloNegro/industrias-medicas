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
<script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Presupuesto generado correctamente",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						});
			}	
			</script>
<script type="text/javascript">
			function no(){
				swal.fire(  {title: "El presupuesto no pudo generarse, verifique los datos ingresados",
						icon: "error",
						});
			}	
</script>
<script type="text/javascript">
			function rechazo(){
				swal.fire(  {title: "El presupuesto ha sido rechazado",
						icon: "error",
						});
			}	
</script>
        <!-- CONTROL DE QUE SOLO INGRESAN A ESTA PÁGINA GERENTE Y ADMINISTRADOR -->
        <?php
        $rolgerente = 1;
        $roladmin = 2;
        $roldeposito = 3;
        $rolventas = 4;
        $rolobra = 5;
        $rolproveedor = 6;
        if($idRol == $roldeposito OR $idRol == $rolventas OR $idRol == $rolproveedor){
            header("Location: ../principal.php");
        }
        ?>
    <?php include('../Layouts/ventasHeader.php'); ?>
    <main>
        <section class="ini">
            <div class="ini-tit">
                <?php
                if($idRol != $rolobra){?>
                    <h1>VENTAS</h1>
                <?php }else{?>
                    <h1>COMPRAS</h1>
                <?php }?>
                <h5>PRESUPUESTO PARA VENTA DE PRODUCTOS</h5>
            </div>
            <div class="container">
                <form method="POST" action="./presupuestos.php">
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
                    if($idRol == $rolgerente OR $idRol == $roladmin)
                    {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p style='text-align:right; margin-right: 5px;'>N°PRESUPUESTO</p></th>
                                    <th><p>FECHA</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>CLIENTE</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>MÉDICO/S</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>PACIENTE</p></th>
                                    <th><p>DETALLES</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $cantidad = 0;
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                    FROM documento d
                                    LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                    LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                    LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                    WHERE m.idEstadoDocumento = 2 AND (d.idDocumento LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR u.usuario LIKE '%$doc%' OR da.medico LIKE '%$doc%' OR da.paciente LIKE '%$doc%')
                                    GROUP BY d.idDocumento
                                    ORDER BY d.idDocumento DESC");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        $cantidad++;
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['medico']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['paciente']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detallePresupuesto.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    } 
                                }
                                else{
                                $cantidad = 0;
                                $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                FROM documento d
                                LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                WHERE m.idEstadoDocumento = 2
                                GROUP BY d.idDocumento
                                ORDER BY d.idDocumento DESC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $cantidad++;
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['medico']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['paciente']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detallePresupuesto.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    }
                                }
                                if($doc != ""){
                                    echo "<div style='margin-top:30px;'><p style='text-transform: uppercase;'><u>Filtrado por</u>: ".$doc."</p></div>";
                                }
                                echo "<div style='margin-top:10px;'><p style='text-transform: uppercase;'><u>Cantidad de registros</u>: ".$cantidad."</p></div>";
                                echo "</table>";
                            }


                            elseif($idRol == $rolobra){
                                echo "<table>
                                <thead>
                                    <tr>
                                        <th><p style='text-align:right; margin-right: 5px;'>N°PRESUPUESTO</p></th>
                                        <th><p>FECHA</p></th>
                                        <th><p style='text-align:left; margin-left: 5px;'>CLIENTE</p></th>
                                        <th><p style='text-align:left; margin-left: 5px;'>MÉDICO/S</p></th>
                                        <th><p style='text-align:left; margin-left: 5px;'>PACIENTE</p></th>
                                        <th><p>DETALLES</p></th>
                                    </tr>
                                </thead>
                            ";
                            if(isset($_POST['btn2']))
                                    {
                                        $cantidad = 0;
                                        $doc = $_POST['buscar'];
                                        $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                        FROM documento d
                                        LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                        LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                        LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                        WHERE m.idEstadoDocumento = 2 AND (d.idDocumento LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR u.usuario LIKE '%$doc%' OR da.medico LIKE '%$doc%' OR da.paciente LIKE '%$doc%) AND da.idUsuario = '$idUsu'
                                        GROUP BY d.idDocumento
                                        ORDER BY d.idDocumento DESC");
                                        while($listar = mysqli_fetch_array($consulta))
                                        {
                                            $cantidad++;
                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            echo
                                            " 
                                                <tr>
                                                <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['usuario']."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['medico']."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['paciente']."</h4 ></td>
                                                <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detallePresupuesto.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                                </tr>
                                            ";
                                        } 
                                    }
                                    else{
                                    $cantidad = 0;
                                    $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                    FROM documento d
                                    LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                    LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                    LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                    WHERE m.idEstadoDocumento = 2 AND da.idUsuario = '$idUsu'
                                    GROUP BY d.idDocumento
                                    ORDER BY d.idDocumento DESC");
                                        while($listar = mysqli_fetch_array($consulta)) 
                                        {
                                            $cantidad++;
                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            echo
                                            " 
                                                <tr>
                                                <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['usuario']."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['medico']."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left; margin-left: 5px;'>".$listar['paciente']."</h4 ></td>
                                                <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detallePresupuesto.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                                </tr>
                                            ";
                                        }
                                    }
                                    if($doc != ""){
                                        echo "<div style='margin-top:30px;'><p style='text-transform: uppercase;'><u>Filtrado por</u>: ".$doc."</p></div>";
                                    }
                                    echo "<div style='margin-top:10px;'><p style='text-transform: uppercase;'><u>Cantidad de registros</u>: ".$cantidad."</p></div>";
                                    echo "</table>";
                            }
                        ?>


                    <?php
					if(isset($_GET['ok'])){
						?>
						<script>ok();</script>
						<?php			
					}
					if(isset($_GET['no'])){
						?>
						<script>no();</script>
						<?php			
					}
                    if(isset($_GET['rechazo'])){
						?>
						<script>rechazo();</script>
						<?php			
					}
					?>
        </section>
    </main>
      <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>