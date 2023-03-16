<?php
/* error_reporting(0); */
session_start();
include('../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../rincipal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario, idRol, nombre, correo, direccion FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario'];
$idRol = $row['idRol'];
$nombreUsu = $row['nombre'];
$correoUsu = $row['correo'];
$direccionUsu = $row['direccion'];
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
<script type="text/javascript">
			function done(){
				swal.fire("Constraseña cambiada!", "Se ha actualizado tu contraseña!", "success");
			}	</script>
			<script>
			function error(){
				swal.fire("Usuario o contraseña incorrecta!", "Por favor revise los datos ingresados!", "error");
			}	
			</script>
<div class="cont-img" id="imagen">
        <a href="./principal.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>

    </div>

    <main>
        <section>
            <div class="clave">
                <form method="POST" action="../Logica/modificarDatos.php" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                    <div>
                        <h3 style="padding:10px;">MODIFICAR DATOS</h3></div>
                    <div>
                        <label for="usu">Usuario:</label>
                        <input class="form-control" id="usu" type="text" name="usuario" required value="<?php echo $nom?>">
                    </div>
                    <div>
                        <label for="fan">Nombre de fantasia:</label>
                        <input class="form-control" id="fan" type="text" name="nombre" required value="<?php echo $nombreUsu?>">
                    </div>
                    <div>
                        <label for="cor">Correo:</label>
                        <input class="form-control" id="cor" type="email" name="correo" required value="<?php echo $correoUsu?>">
                    </div>
                    <div>
                        <label for="dir">Dirección:</label>
                        <input class="form-control" id="dir" type="text" name="direccion" required value="<?php echo $direccionUsu?>">
                    </div>
                    <div>
                        <button type="submit">Cambiar</button>
                    </div>
                </form>
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
            </div>
            <div class="agregar">
                <a href="./datos.php" class="volver" id="vlv">VOLVER</a>
            </div>
        </section>
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>