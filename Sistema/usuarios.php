<?php
error_reporting(0);
session_start(); 
include('../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ./Principal/login.php'); 
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
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
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
        <script type="text/javascript">
        function ok(){
            swal.fire("Usuario Agregado correctamente!", "Se ha registrado el usuario!", "success");
        }

        function mod(){
            swal.fire("Usuario modificado!", "Se han modificado los datos del usuario!", "success");
        }

        function error(){
            swal.fire("Usuario no guardado!", "Nombre del usuario en uso!", "error");
        }

        function activo(){
            swal.fire("Usuario modificado!", "Se ha registrado el usuario! El usuario fué activado correctamente!", "success");
        }	
        </script>
  <?php include('./Layouts/usuarioHeader.php'); ?>
    <main>
        <section class="ini">
            <div class="ini-tit">
                <h1>Usuarios del sistema</h1>
            </div>
            <div class="container">

                <form method="POST" action="./usuarios.php">
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
                <div class="agregar">
                    <a href="./agregarUsuario.php" class="nuevo" data-bs-toggle="tooltip" title="Nuevo usuario" data-bs-placement="left">+</a>
                </div>
            </div>

             <?php
                    echo "<table>
                            <thead>
                                <tr>
                                    <th><p style='text-align: left; margin-left:5px;'>USUARIO</p></th>
                                    <th><p style='text-align: left; margin-left:5px;'>ROL</p></th>
                                    <th><p style='text-align: left; margin-left:5px;'>TIPO USUARIO</p></th>
                                    <th><p style='text-align: left; margin-left:5px;'>ESTADO</p></th>
                                    <th><p>MODIFICAR</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $cantidad = 0;
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT u.idUsuario, u.usuario, r.rol, t.tipo, e.estadoUsuario
                                    FROM usuario u
                                    LEFT JOIN roles r ON r.idRol = u.idRol
                                    LEFT JOIN tipousuario t ON t.idTipoUsuario = u.idTipoUsuario
                                    LEFT JOIN estadousuario e ON e.idEstadoUsuario = u.idEstadoUsuario
                                    WHERE u.usuario LIKE '%$doc%' OR r.rol LIKE '%$doc%' OR t.tipo LIKE '%$doc%' OR e.estadoUsuario LIKE '%$doc%'
                                    ORDER BY r.rol ASC");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        $cantidad++;
                                        echo
                                        " 
                                        <tr>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['rol']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['tipo']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['estadoUsuario']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleUsuario.php?no=".$listar['idUsuario']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                        </tr>
                                        ";
                                    } 
                                }
                                else{
                                    $cantidad = 0;
                                    $consulta=mysqli_query($datos_base, "SELECT u.idUsuario, u.usuario, r.rol, t.tipo, e.estadoUsuario
                                FROM usuario u
                                LEFT JOIN roles r ON r.idRol = u.idRol
                                LEFT JOIN tipousuario t ON t.idTipoUsuario = u.idTipoUsuario
                                LEFT JOIN estadousuario e ON e.idEstadoUsuario = u.idEstadoUsuario
                                ORDER BY r.rol ASC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        $cantidad++;
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['rol']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['tipo']."</h4 ></td>
                                            <td><h4 style='font-size:16px;text-transform:uppercase;text-align: left;margin-left:5px;'>".$listar['estadoUsuario']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm' href=./detalleUsuario.php?no=".$listar['idUsuario']." class=mod><i class='fa-solid fa-pen-to-square fa-2x'></i></a></td>
                                            </tr>
                                        ";
                                    }
                                }
                                if($doc != ""){
                                    echo "<div style='margin-top:30px;'><p style='text-transform: uppercase;'><u>Filtrado por</u>: ".$doc."</p></div>";
                                }
                                echo "<div style='margin-top:10px;'><p style='text-transform: uppercase;'><u>Cantidad de registros</u>: ".$cantidad."</p></div>";
                                echo"
                            </table>";
                                    ?>
        </section>
        <?php
				if(isset($_GET['ok'])){?>
					<script>ok();</script>
					<?php
				}
                if(isset($_GET['mod'])){?>
					<script>mod();</script>
					<?php
				}
				if(isset($_GET['error'])){?>
					<script>error();</script>
					<?php
				}
                if(isset($_GET['activo'])){?>
					<script>activo();</script>
					<?php
				}
			?>
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