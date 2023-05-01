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

$idProd = $_POST['idProd'];
$nombre = strtoupper($_POST['nombre']);
$grupo = $_POST['grupo'];
$tipo = $_POST['tipo'];
$minimo = $_POST['minimo'];
$maximo = $_POST['maximo'];


if($grupo == "100"){
    $sql = "SELECT idGrupoProducto FROM producto WHERE idProducto = '$idProd'";
    $result = $datos_base->query($sql);
    $row = $result->fetch_assoc();
    $grupo = $row['idGrupoProducto'];
}
if($tipo == "200"){
    $sql2 = "SELECT idTipoProducto FROM producto WHERE idProducto = '$idProd'";
    $result2 = $datos_base->query($sql2);
    $row2 = $result2->fetch_assoc();
    $tipo = $row2['idTipoProducto'];
}


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

$consulta=mysqli_query($datos_base, "SELECT REPLACE(producto, ' ', '') AS PROD, idProducto FROM producto WHERE idProducto != '$idProd'");
while($listar = mysqli_fetch_array($consulta)) 
{
  //CALCULAR EL TAMAÑO
  $tamaño2 = mb_strlen($listar['PROD']);
  //ORDENAR ALFABÉTICAMENTE
  $letras2 = (str_split($listar['PROD']));
  sort($letras2, SORT_REGULAR);
  //var_dump($letras);
  $respuesta2 = implode($letras2);

  if($respuesta == $respuesta2 AND $tamaño == $tamaño2){
    $contador ++;
  }
}

if($contador > 0){
    header("Location: ../Sistema/Stock/productos.php?exist");
    mysqli_close($datos_base);
}
else{
    mysqli_query($datos_base, "UPDATE producto SET producto = '$nombre', idGrupoProducto = '$grupo', idTipoProducto = '$tipo', minimo = '$minimo', maximo = '$maximo' WHERE idProducto = '$idProd'");
    header("Location: ../Sistema/Stock/productos.php?modif");
    mysqli_close($datos_base);
}

?>