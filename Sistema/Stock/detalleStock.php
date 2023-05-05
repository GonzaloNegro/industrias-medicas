<?php
error_reporting(0);
session_start();
include('../../Utils/conexion.php');

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	include('../../Utils/conexion.php');
	$sentencia =  "SELECT * FROM producto WHERE idProducto='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idProducto'],/*0*/
		$filas['producto'],/* 1 */
        $filas['idGrupoProducto'],/*2*/
		$filas['idTipoProducto'],/* 3 */
        $filas['cantidad'],/*4*/
	];
}

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
<script>
    function valideKey(evt){
    
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}
</script>
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
                <h1>Dar de baja stock</h1>
        </div>
        <div class="agrStock" style="padding:10px;">
            <form method="POST" action="../../Logica/modificarStock.php">
                <div style="text-align: center; padding:10px;">
                    <h4>Nombre del producto:</h4>
                    <p><?php echo $consulta[1];?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Grupo:</h4>
                    <p><?php 
                        $sql6 = "SELECT g.grupoProducto
                        FROM producto p
                        LEFT JOIN grupoproducto g ON g.idGrupoProducto = p.idGrupoProducto
                        WHERE g.idGrupoProducto = $consulta[2]";
                        $result6 = $datos_base->query($sql6);
                        $row6 = $result6->fetch_assoc();
                        $grup = $row6['grupoProducto'];
                    
                    echo $grup;?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Tipo:</h4>
                    <p><?php 
                        $sql6 = "SELECT t.tipoProducto
                        FROM producto p
                        LEFT JOIN tipoproducto t ON t.idTipoProducto = p.idTipoProducto
                        WHERE t.idTipoProducto = $consulta[3]";
                        $result6 = $datos_base->query($sql6);
                        $row6 = $result6->fetch_assoc();
                        $tipo = $row6['tipoProducto'];
                    
                    echo $tipo;?></p>
                </div>
                <div style="text-align: center; padding:10px;">
                    <h4>Stock disponible:</h4>
                    <p><?php echo $consulta[4];?></p>
                </div>
                <div>
                    <input type="text" class="ocultar" name="nroProducto" id="remito" value="<?php echo $consulta[0]?>">
                </div>
                <?php 
                $cantTotal = $consulta[4];
                if($cantTotal > 0)
                {
                ?>
                    <div>
                        <label for="cant">Cantidad a dar de baja</label>
                        <input type="number" name="cant" id="cant" min=1 onkeypress="return valideKey(event);" <?php echo "max= ".$consulta[4]."";?> required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger">DAR DE BAJA</button>
                    </div>
                <?php
                    }else{echo"
                        <div>
                            <p>No hay stock para dar de baja.</p>
                        </div>
                    ";
                    }
                ?>
            </form>
        
            <div class="agregar">
                <a href="./stock.php" class="volver"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="agregar">
                <?php
                echo
                    "<a href=./agregarSolicitud.php?no=".$consulta[0]." class='agregando'>SOLICITAR</a>";
                ?>
            </div>
        </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>