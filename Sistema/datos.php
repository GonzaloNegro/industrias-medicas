<?php
error_reporting(0);
session_start(); 
include('../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
{       
    header('Location: ../Principal/login.php'); 
    exit();
};
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario, idRol, idTipoUsuario, nombre, correo, direccion FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario'];
$idRol = $row['idRol'];
$idTipoUsuario = $row['idTipoUsuario'];
$nombre = $row['nombre'];
$correo = $row['correo'];
$direccion = $row['direccion'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
<script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Datos modificados correctamente",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						});
			}	
			</script>
<script type="text/javascript">
			function error(){
				swal.fire(  {title: "No se ha podido modificar el usuario, verifique los datos ingresados",
						icon: "error",
                        showConfirmButton: true,
						showCancelButton: false,
						});
			}	
			</script>
  <?php include('./Layouts/usuarioHeader.php'); ?>
    <main>
        <section>
           <?php 
            $sql6 = "SELECT rol FROM roles WHERE idRol = $idRol";
            $result6 = $datos_base->query($sql6);
            $row6 = $result6->fetch_assoc();
            $rol = $row6['rol'];

            $sql6 = "SELECT tipo FROM tipousuario WHERE idTipoUsuario = $idTipoUsuario";
            $result6 = $datos_base->query($sql6);
            $row6 = $result6->fetch_assoc();
            $tipo = $row6['tipo'];
            ?>
            <div class="principal">
                <div class="principal-info">
                    <div class="principal-info-datos" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                        <h1>Datos personales</h1>
                        <div class="principal-info-datos-info">
                            <p>-<u>Usuario:</u> <?php echo $nom;?></p>
                            <p>-<u>Rol:</u> <?php echo $rol;?></p>
                            <p>-<u>Nombre:</u> <?php echo $nombre;?></p>
                            <p>-<u>Tipo usuario:</u> <?php echo $tipo;?></p>
                            <p>-<u>Correo:</u> <?php echo $correo;?></p>
                            <p>-<u>Dirección:</u> <?php echo $direccion;?></p>
                        </div>
                        <div class="principal-info-datos-clave">
                            <div class="principal-info-datos-clave-datos">
                                <a href="./cambioDatos.php"><button class="btn btn-danger">Modificar datos</button></a>
                            </div>
                            <div class="principal-info-datos-clave-contra">
                                <a href="./cambioClave.php"><button class="btn btn-danger">Cambiar contraseña</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_GET['ok'])){
                    ?>
                    <script>ok();</script>
                    <?php			
                }
                if(isset($_GET['error'])){
                    ?>
                    <script>error();</script>
                    <?php			
                }
            ?>
        </section>
    </main>
    <footer>
        <div class="fot">
            <img src="../Imagenes/c-logotipo.png" alt="">
        </div>
        <div class="tel">
            <p>
                0810-555-6334<br/>
                (0351) 4866001<br/>
                info@industriasmedicas.com
            </p>
        </div>
      </footer>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
      <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>