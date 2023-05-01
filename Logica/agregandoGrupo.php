<?php

session_start();
include('../Utils/conexion.php');
include('../Utils/functions.php');
/*TRAIGO LOS DATOS DE QUIEN INGRESO AL SISTEMA*/
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

/*GUARDO LOS DATOS DEL ID_RESOLUTOR EN UNA VARIABLE*/
$idUsu = $row['idUsuario'];
$nombre = strtoupper($_POST['nombre']);


//CORTAR ESPACIOS EN BLANCO:
$sinEspacios = preg_replace("/[[:space:]]/","",($nombre));
//CALCULAR EL TAMAÑO
$tamaño = mb_strlen($sinEspacios);
//ORDENAR ALFABÉTICAMENTE
$letras = (str_split($sinEspacios));
sort($letras, SORT_REGULAR);
$respuesta = implode($letras);

/* SI UNO DE LOS CAMPOS ESTA REPETIDO */
$contador = 0;

$consulta=mysqli_query($datos_base, "SELECT REPLACE(grupoProducto, ' ', '') AS GRUPO FROM grupoproducto");
while($listar = mysqli_fetch_array($consulta)) 
{
  //CALCULAR EL TAMAÑO
  $tamaño2 = mb_strlen($listar['GRUPO']);
  //ORDENAR ALFABÉTICAMENTE
  $letras2 = (str_split($listar['GRUPO']));
  sort($letras2, SORT_REGULAR);
  //var_dump($letras);
  $respuesta2 = implode($letras2);

  if($respuesta == $respuesta2 AND $tamaño == $tamaño2){
    $contador ++;
  }
}

if($contador > 0){
    header("Location: ../Sistema/Stock/gruposProductos.php?exist");
    mysqli_close($datos_base);
  }
  else{
    mysqli_query($datos_base, "INSERT INTO grupoproducto VALUES (DEFAULT, '$nombre')");
    header("Location: ../Sistema/Stock/gruposProductos.php?agregado");
    mysqli_close($datos_base);
  }
?>