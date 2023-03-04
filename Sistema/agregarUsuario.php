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
$sql = "SELECT idUsuario, usuario FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario']
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
<script type="text/javascript">
			function done(){
				swal("Usuario guardado!", "Se ha registrado el usuario!", "success");
			}	</script>
			<script>
			function error(){
				swal("Usuario no guardado!", "Nombre de usuario ya registrado!", "error");
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
                <form method="POST" action="../Logica/agregarUsuario.php" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                    <div>
                        <h3 style="padding:10px;">AGREGAR USUARIO</h3>
                    </div>
                    <div>
                        <input class="form-control" type="text" name="regUsu" placeholder="Usuario" required>
                    </div>
                    <div>
                        <input class="form-control" type="text" name="regNom" placeholder="Nombre" required>
                    </div>
                    <div>
                        <input class="form-control" type="email" name="regCor" placeholder="Correo" required>
                    </div>
                    <div>
                        <input class="form-control" type="text" name="regDir" placeholder="Dirección" required>
                    </div>
                    <div>
                        <label>Rol:</label>
                            <select name="rol" class="form-control" required>
                                <option value="" selected disabled="rol">-SELECCIONE UNA-</option>
                                <?php
                                $consulta= "SELECT * FROM roles";
                                $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                                ?>
                                <?php foreach ($ejecutar as $opciones): ?> 
                                <option value="<?php echo $opciones['idRol']?>"><?php echo $opciones['rol']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                    <div>
                        <label>Tipo:</label>
                            <select name="tipo" class="form-control" required>
                                <option value="" selected disabled="tipo">-SELECCIONE UNA-</option>
                                <?php
                                $consulta= "SELECT * FROM tipousuario";
                                $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                                ?>
                                <?php foreach ($ejecutar as $opciones): ?> 
                                <option value="<?php echo $opciones['idTipoUsuario']?>"><?php echo $opciones['tipo']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                    <div>
                        <button type="submit">Agregar</button>
                    </div><br>
                    <p>Se generará automaticamente la clave "industrias"<br> que deberá cambiarse al iniciar sesión.</p>
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
                <a href="./usuarios.php" class="volver" id="vlv">VOLVER</a>
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