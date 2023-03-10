<?php 
error_reporting(0);
session_start();
include('../../Utils/conexion.php');

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	$datos_base=mysqli_connect('localhost', 'root', '', 'industrias') or exit('No se puede conectar con la base de datos');
	$sentencia =  "SELECT * FROM documento WHERE idDocumento='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idDocumento'],/*0*/
		$filas['idEstadoDocumento'],
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>

<script>
    function imprim2(){
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
        mywindow.document.write('<html><head>');
        mywindow.document.write('<link rel="stylesheet" href="../Css/estilos.css">');
    
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById('imprimirEsto').innerHTML);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necesario para IE >= 10
        mywindow.focus(); // necesario para IE >= 10
        mywindow.print();
        mywindow.close();
        return true;}
</script>

    <div class="cont-img">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri">

    </header>

    <main>
        <section class="inicio" id="imprimirEsto">
            <div class="inicio-tit">
                <h1>Generar Presupuesto</h1>
            </div>

            <div class="agrStock">
            <form method="POST" action="../../Logica/agregandoPresupuesto.php">
                <?php
                    $productos="SELECT p.producto, pd.cantidad, pd.precio, pd.idProducto
                    FROM productodocumento pd
                    LEFT JOIN producto p ON p.idProducto = pd.idProducto
                    WHERE pd.idDocumento = $consulta[0]";
                    $resProductos=$datos_base->query($productos);
                ?>
                    <div class="nroCot">
                        <label for="cot">Cotización nro:</label>
                        <input type="text" id="cot" name="idCot" readonly="readonly" value="<?php echo $consulta[0]?>">
                    </div>
                    <table class="table">
                        <tr>
                            <th style="width:85px;">ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                        </tr>

                        <?php
                        while ($registroProductos = $resProductos->fetch_array(MYSQLI_BOTH))
                        {
                            echo'<tr>
                                    <td style=width:85px;><input class="corto" name="idpro['.$registroProductos['idProducto'].']" value="'.$registroProductos['idProducto'].'" readonly="readonly"/></td>
                                    <td><input class="largo" name="pro['.$registroProductos['idProducto'].']" value="'.$registroProductos['producto'].'" readonly="readonly"/></td>
                                    <td><input class="corto" name="cant['.$registroProductos['idProducto'].']" value="'.$registroProductos['cantidad'].'" readonly="readonly"/></td>
                                    <td><input class="medio" type=number min=1 onkeypress="return valideKey(event);" name="pre['.$registroProductos['idProducto'].']" value="'.$registroProductos['precio'].'" /></td>
                                </tr>';
                        }
                        ?>

                        </table>
                    <div>
                    <div>
                        <label for="fec">Fecha de vencimiento:</label>
                        <input type="date" id="fec" name="fecven" required>
                    </div>
                    <textarea name="obs" style="text-transform:uppercase" id="" cols="30" rows="3" placeholder="Observaciones"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="actualizar">GENERAR</button>
                    </div>
                </form>
            
                <div class="agregar">
                    <a href="./cotizaciones.php" class="volver">VOLVER</a>
                </div>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>