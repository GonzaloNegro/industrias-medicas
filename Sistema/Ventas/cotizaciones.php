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
        if($idRol == $roldeposito OR $idRol == $rolventas OR $idRol == $rolproveedor){
            header("Location: ../principal.php");
        }
        ?>
<script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Cotización generada correctamente",
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
				swal.fire(  {title: "La cotización no pudo generarse, verifique los datos ingresados",
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
                <h5>PEDIDO MÉDICO PARA SOLICITUD DE PRODUCTOS</h5>
            </div>
            <div class="container">

                <form method="POST" action="./cotizaciones.php">
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
                <?php
                if($idRol == $rolobra){?>
                <div class="agregar">
                    <a href="./agregarCotizacion.php" class="nuevo" data-bs-toggle="tooltip" title="Nuevo pedido médico" data-bs-placement="left">+</a>
                </div>
                <?php };?>
            </div>

            <?php
            /* LO QUE VA A VER IM, ES DECIR, TODO */
                if($idRol == $rolgerente OR $idRol == $roladmin)
                {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p style='text-align:right; margin-right: 5px;'>N°COTIZACION</p></th>
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
                                    WHERE m.idEstadoDocumento = 1 AND (d.idDocumento LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR u.usuario LIKE '%$doc%' OR da.medico LIKE '%$doc%' OR da.paciente LIKE '%$doc%')
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
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleCotizacion.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
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
                                WHERE m.idEstadoDocumento = 1
                                GROUP BY m.idDocumento
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
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleCotizacion.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
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
                /* LO QUE VA A VER SOLAMENTE EL USUARIO EXTERNO QUE INGRESE */
                elseif($idRol == $rolobra){

                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p style='text-align:right; margin-right: 5px;'>N°COTIZACION</p></th>
                                    <th><p>FECHA</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>CLIENTE</p></th>
                                    <th><p style='text-align:left; margin-left: 5px;'>MÉDICO</p></th>
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
                                    WHERE m.idEstadoDocumento = 1 AND (d.idDocumento LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR u.usuario LIKE '%$doc%' OR da.medico LIKE '%$doc%' OR da.paciente LIKE '%$doc%') AND da.idUsuario = '$idUsu'
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
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['medico']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['paciente']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleCotizacion.php?no=".$listar['idDocumento']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
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
                                WHERE m.idEstadoDocumento = 1 AND da.idUsuario = '$idUsu'
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
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['medico']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['paciente']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./detalleCotizacion.php?no=".$listar['idDocumento']." class=mod><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                            </svg></a></td>
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