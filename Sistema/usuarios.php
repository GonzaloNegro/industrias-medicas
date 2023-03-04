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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        function done(){
            swal("Usuario modificado!", "Se ha registrado el usuario!", "success");
        }	</script>
        <script>
        function error(){
            swal("Usuario no guardado!", "Nombre del usuario en uso!", "error");
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
                            <input class="button" type="submit" name="btn2" value="BUSCAR"></input>
                            <input class="button" type="submit" name="btn1" value="LIMPIAR"></input>
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
                                    <th><p>USUARIO</p></th>
                                    <th><p>ROL</p></th>
                                    <th><p>TIPO USUARIO</p></th>
                                    <th><p>ESTADO</p></th>
                                    <th><p>MODIFICAR</p></th>
                                </tr>
                            </thead>
                        ";
                        if(isset($_POST['btn2']))
                                {
                                    $doc = $_POST['buscar'];
                                    $consulta=mysqli_query($datos_base, "SELECT u.idUsuario, u.usuario, r.rol, t.tipo, e.estadoUsuario
                                    FROM usuario u
                                    LEFT JOIN roles r ON r.idRol = u.idRol
                                    LEFT JOIN tipousuario t ON t.idTipoUsuario = u.idTipoUsuario,
                                    LEFT JOIN estadousuario e ON e.idEstadoUsuario = u.idEstadoUsuario
                                    WHERE u.idUsuario LIKE '%$doc%' OR u.usuario LIKE '%$doc%' OR r.rol LIKE '%$doc%' OR t.tipo LIKE '%$doc%' OR e.estadoUsuario LIKE '%$doc%'
                                    ORDER BY r.rol ASC");
                                    while($listar = mysqli_fetch_array($consulta))
                                    {
                                        echo
                                        " 
                                        <tr>
                                        <td><h4 style='font-size:16px;'>".$listar['usuario']."</h4 ></td>
                                        <td><h4 style='font-size:16px;'>".$listar['rol']."</h4 ></td>
                                        <td><h4 style='font-size:16px;'>".$listar['tipo']."</h4 ></td>
                                        <td><h4 style='font-size:16px;'>".$listar['estadoUsuario']."</h4 ></td>
                                        <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./detalleUsuario.php?no=".$listar['idUsuario']." class=mod><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                        </svg></a></td>
                                        </tr>
                                        ";
                                    } 
                                }
                                else{
                                    $consulta=mysqli_query($datos_base, "SELECT u.idUsuario, u.usuario, r.rol, t.tipo, e.estadoUsuario
                                FROM usuario u
                                LEFT JOIN roles r ON r.idRol = u.idRol
                                LEFT JOIN tipousuario t ON t.idTipoUsuario = u.idTipoUsuario
                                LEFT JOIN estadousuario e ON e.idEstadoUsuario = u.idEstadoUsuario
                                ORDER BY r.rol ASC");
                                    while($listar = mysqli_fetch_array($consulta)) 
                                    {
                                        echo
                                        " 
                                            <tr>
                                            <td><h4 style='font-size:16px;'>".$listar['usuario']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['rol']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['tipo']."</h4 ></td>
                                            <td><h4 style='font-size:16px;'>".$listar['estadoUsuario']."</h4 ></td>
                                            <td class='text-center text-nowrap'><a class='btn btn-sm btn-outline-primary' href=./detalleUsuario.php?no=".$listar['idUsuario']." class=mod><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                            </svg></a></td>
                                            </tr>
                                        ";
                                    }
                                }
                                echo "</table>";
                                    ?>
        </section>
        <?php
				if(isset($_GET['ok'])){
					/*echo "<h4>CONTRASEÑA CAMBIADA</h4>";*/?>
					<script>done();</script>
					<?php
				}
				if(isset($_GET['error'])){
					/*echo "<h4>CUIL O CONTRASEÑA INCORRECTA</h4>";*/?>
					<script>error();</script>
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