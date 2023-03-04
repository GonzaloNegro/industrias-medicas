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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
<div class="cont-img">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri">

    </header>

    <main>
        <section class="inicio">
        <div class="inicio-tit">
                <h1>Agregar Grupo de productos</h1>
        </div>
        <div class="agrStock" style="padding:10px;">
            <form method="POST" action="../../Logica/agregandoGrupo.php">
                <div style="text-align: center; padding:10px;">
                        <label for="nombre">Nombre Grupo: </label>
                        <input type="text" style="width: 500px; text-transform:uppercase;" name="nombre" required>
                </div>
                <div>
                    <button type="submit">AGREGAR</button>
                </div>
            </form>
        
            <div class="agregar">
                    <a href="./gruposProductos.php" class="volver">VOLVER</a>
                </div>
        </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>