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
$idUsu = $row['idUsuario'];

$consulta = ConsultarIncidente($_GET['no']);
function ConsultarIncidente($no_tic)
{	
	$datos_base=mysqli_connect('localhost', 'root', '', 'industrias') or exit('No se puede conectar con la base de datos');
	$sentencia =  "SELECT * FROM usuario WHERE idUsuario='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idUsuario'],/*0*/
		$filas['usuario'],/* 1 */
        $filas['contraseña'],/* 2 */
        $filas['idRol'],/*3*/
		$filas['idTipoUsuario'],/* 4 */
        $filas['nombre'],/*5*/
		$filas['correo'],/* 6 */
        $filas['direccion'],/*7*/
        $filas['idEstadoUsuario'],/*8*/
	];
}
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
<div class="cont-img" id="imagen">
        <a href="./principal.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>

    </div>

    <main>
        <section class="inicio">
<?php        $idd = $consulta[0];?>
        <div class="inicio-tit">
                <h1>Modificar datos del usuario</h1>
        </div>
        <div class="agrStock">
        <?php 
            $sent= "SELECT rol FROM roles WHERE idRol = $consulta[3]";
            $resultado = $datos_base->query($sent);
            $row = $resultado->fetch_assoc();
            $rol = $row['rol'];

            $sent= "SELECT tipo FROM tipousuario WHERE idTipoUsuario = $consulta[4]";
            $resultado = $datos_base->query($sent);
            $row = $resultado->fetch_assoc();
            $tipo = $row['tipo'];

            $sent= "SELECT estadoUsuario FROM estadousuario WHERE idEstadoUsuario = $consulta[8]";
            $resultado = $datos_base->query($sent);
            $row = $resultado->fetch_assoc();
            $estado = $row['estadoUsuario'];
        ?>

            <form action="../Logica/modificarUsuario.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="usu">Usuario id: <?php echo $idd ?></label>
                    <input type="text" class="ocultar" name="nroUsu" id="usu" value="<?php echo $idd?>">
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="regNom"  id="nombre" value="<?php echo $consulta[5]?>">
                </div>
                <div>
                    <label for="usuario">Usuario</label>
                    <input type="text" name="regUsu"  id="usuario" value="<?php echo $consulta[1]?>">
                </div>
                <div>
                    <label for="correo">Correo</label>
                    <input type="email" name="regCor"  id="correo" value="<?php echo $consulta[6]?>">
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="regDir"  id="direccion" value="<?php echo $consulta[7]?>">
                </div>
                <div>
                    <label id="rol">Rol: </label>
                        <select name="rol">
                            <option selected value="100"><?php echo $rol?></option>
                            <?php
                            $consulta= "SELECT * FROM roles";
                            $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                            ?>
                            <?php foreach ($ejecutar as $opciones): ?> 
                            <option value= <?php echo $opciones['idRol'] ?>><?php echo $opciones['rol']?></option>
                            <?php endforeach?>
                        </select>
                </div>
                <div>
                    <label id="tipo">Tipo Usuario: </label>
                        <select name="tipo">
                            <option selected value="200"><?php echo $tipo?></option>
                            <?php
                            $consulta= "SELECT * FROM tipousuario";
                            $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                            ?>
                            <?php foreach ($ejecutar as $opciones): ?> 
                            <option value= <?php echo $opciones['idTipoUsuario'] ?>><?php echo $opciones['tipo']?></option>
                            <?php endforeach?>
                        </select>
                </div>
                <div>
                    <label id="estado">Estado Usuario: </label>
                        <select name="estado">
                            <option selected value="300"><?php echo $estado?></option>
                            <?php
                            $consulta= "SELECT * FROM estadousuario";
                            $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                            ?>
                            <?php foreach ($ejecutar as $opciones): ?> 
                            <option value= <?php echo $opciones['idEstadoUsuario'] ?>><?php echo $opciones['estadoUsuario']?></option>
                            <?php endforeach?>
                        </select>
                </div>
                <div>
                    <button type="submit" name="submit">GUARDAR</button>
                </div>
            </form>
            <div class="agregar">
                    <a href="./usuarios.php" class="volver"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                </div>
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