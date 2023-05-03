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
				swal.fire(  {title: "Orden de compra aceptada correctamente",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						});
			}	
			</script>
<script type="text/javascript">
function cargado(){
    swal.fire(  {title: "Se ha cargado correctamente su remito.",
            icon: "success",
            showConfirmButton: true,
            showCancelButton: false,
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
                <h5>REMITO PARA ENTREGA DE PRODUCTOS</h5>
            </div>
            <div class="container">

                <form method="POST" action="./remitos.php">
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
                    /* LO QUE VA A VER IM, ES DECIR, TODO */
                    if($idRol == $rolgerente OR $idRol == $roladmin)
                    {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p>N°REMITO</p></th>
                                    <th><p>FECHA</p></th>
                                    <th><p>USUARIO</p></th>
                                    <th><p>SUBIR PDF</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                    FROM documento d
                                    LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                    LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                    LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                    WHERE m.idEstadoDocumento = 4 AND (m.idDocumento LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR u.usuario LIKE '%$doc%')
                                    GROUP BY d.idDocumento
                                    ORDER BY d.idDocumento DESC");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        $idd = $listar['idDocumento'];
                                        echo
                                        " 
                                            <tr>
                                                <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['usuario']."</h4 ></td>
                                                <td class='text-center text-nowrap'><a href=./subirRemito.php?no=".$listar['idDocumento']." class='btn btn-sm btn-outline-danger'><i class='fa-solid fa-cloud-arrow-up'></i></a></td>
                                            </tr>
                                      ";
                                    } 
                                }
                                else{
                                    $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                    FROM documento d
                                    LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                    LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                    LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                    WHERE m.idEstadoDocumento = 4
                                    GROUP BY d.idDocumento
                                    ORDER BY d.idDocumento DESC");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        $fec = date("d-m-Y", strtotime($listar['fecha']));
                                        echo
                                        " 
                                            <tr>
                                                <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                                <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['usuario']."</h4 ></td>
                                                <td class='text-center text-nowrap'><a href=./subirRemito.php?no=".$listar['idDocumento']." class='btn btn-sm btn-outline-danger'><i class='fa-solid fa-cloud-arrow-up'></i></a></td>
                                            </tr>
                                      ";
                                    }
                                }
                                echo "</table>";
                            }

                            elseif($idRol == $rolobra){
                                echo "<table>
                                <thead>
                                    <tr>
                                        <th><p>N°REMITO</p></th>
                                        <th><p>FECHA</p></th>
                                        <th><p>USUARIO</p></th>
                                        <th><p>PDF</p></th>
                                    </tr>
                                </thead>
                            ";
                            if(isset($_POST['btn2']))
                                    {
                                        $doc = $_POST['buscar'];
                                        $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                        FROM documento d
                                        LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                        LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                        LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                        WHERE m.idEstadoDocumento = 4 AND (m.idDocumento LIKE '%$doc%' OR m.fecha LIKE '%$doc%' OR u.usuario LIKE '%$doc%') AND da.idUsuario = '$idUsu'
                                        GROUP BY d.idDocumento
                                        ORDER BY d.idDocumento DESC");
                                        while($listar = mysqli_fetch_array($consulta))
                                        {
                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            $idd = $listar['idDocumento'];
                                            echo
                                            " 
                                                <tr>
                                                    <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                                    <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                    <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['usuario']."</h4 ></td>
                                                    <td class='text-center text-nowrap'> <a class='btn btn-sm btn-outline-danger' href=./confirmarRemito.php?no=".$listar['idDocumento']." target=new><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-filetype-pdf' viewBox='0 0 16 16'>
                                                    <path fill-rule='evenodd' d='M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z'/></svg></a></td>
                                                </tr>
                                          ";
                                        } 
                                    }
                                    else{
                                        $consulta=mysqli_query($datos_base, "SELECT d.idDocumento, m.fecha, u.usuario, da.medico, da.paciente
                                        FROM documento d
                                        LEFT JOIN movimientodocumento AS m ON m.idDocumento = d.idDocumento
                                        LEFT JOIN datosdocumento AS da ON da.idDocumento = d.idDocumento
                                        LEFT JOIN usuario AS u ON u.idUsuario = da.idUsuario
                                        WHERE m.idEstadoDocumento = 4 AND da.idUsuario = '$idUsu'
                                        GROUP BY d.idDocumento
                                        ORDER BY d.idDocumento DESC");
                                        while($listar = mysqli_fetch_array($consulta))
                                        {
                                            $fec = date("d-m-Y", strtotime($listar['fecha']));
                                            echo
                                            " 
                                                <tr>
                                                    <td><h4 style='font-size:16px;text-align: right; margin-right: 5px; '>".$listar['idDocumento']."</h4 ></td>
                                                    <td><h4 style='font-size:16px;'>".$fec."</h4 ></td>
                                                    <td><h4 style='font-size:16px;text-transform:uppercase;'>".$listar['usuario']."</h4 ></td>
                                                    <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-danger' href=./confirmarRemito.php?no=".$listar['idDocumento']." target=new><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-filetype-pdf' viewBox='0 0 16 16'>
                                                    <path fill-rule='evenodd' d='M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z'/></svg></a></td>
                                                </tr>
                                          ";
                                        }
                                    }
                                    echo "</table>";
                            }
            ?>
            <?php
            if(isset($_GET['ok'])){
                ?>
                <script>ok();</script>
                <?php			
            }
            ?>
            <?php
            if(isset($_GET['cargado'])){
                ?>
                <script>cargado();</script>
                <?php			
            }
            ?>
            <?php
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
</body>
</html>