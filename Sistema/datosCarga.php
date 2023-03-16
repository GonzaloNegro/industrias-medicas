<?php
session_start();
include('../Utils/conexion.php');

$tipo = $_POST['tipo'];

$sql = "SELECT idRol, rol FROM roles WHERE idTipoUsuario = '$tipo'";

$result = mysqli_query($datos_base, $sql);

$cadena = "<label>Rol: </label>
<select id='lista2' name='rol' class='form-control' required>";

while($ver=mysqli_fetch_row($result)){
    $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
}

echo $cadena."</select";

?>