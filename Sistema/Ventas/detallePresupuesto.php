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
    <!-- <button id="botonright" type="button" class="btn btn-success" onClick="imprimir()" ></button> -->
    </header>

    <main>
        <section id="imprimirEsto">
        <?php $id = $consulta[0];?>
        <style type="text/css" media="print">
                              @media print {
                                            #imagen{display:none;}
                                             #vlv {display:none;}
		                                     #imp {display:none;}
                                             #botones {display:none;}
											 h4{font-size:15px;}
                                             h1{font-size:16px;}
                                             p{font-size:10px;}
                                             h2{font-size:14px;}
							  }
                    </style>
		            <script>
                           function imprim2() {
            	             window.print();
                                      }
                    </script>
            <div class="container cot tabla">
                <div class="cot-cab">
                    <div class="cot-cab-tit">
                        <h1>INDUSTRIAS MÉDICAS</h1>
                        <p>Pasaje Bordones 60 - Alberdi Sur - CÓRDOBA</p>
                        <p>Teléfono/Fax: 0351-4866001 / 4887201 / 0810 555 6334</p>
                        <p>E-Mail: info@industriasmedicas.com</p>
                        <p>IVA Responsable inscripto / 30-70951236-2 / GNL: 7798277500004</p>
                    </div>
                    <div class="cot-cab-nombre">
                        <h1>PRESUPUESTO</h1>
                        <?php echo str_pad($id, 10, "0", STR_PAD_LEFT); 
                            
                            $sql6 = "SELECT fecha, fechaven
                            FROM movimientodocumento
                            WHERE idDocumento = '$id' AND idEstadoDocumento = 2";
                            $result6 = $datos_base->query($sql6);
                            $row6 = $result6->fetch_assoc();
                            $fecha = $row6['fecha'];
                            $fechav = $row6['fechaven'];
                            $fec = date("d-m-Y", strtotime($fecha));
                            $fecv = date("d-m-Y", strtotime($fechav));
                        ?>
                        <p>Fecha de Emisión: <?php echo $fec ?></p>
                        <p>Fecha de Vencimiento: <?php echo $fecv ?></p>
                    </div>
                </div>
                <div class="cot-datos">
                    <div class="cot-datos-info">
                    <?php
                        $sql6 = "SELECT u.usuario, u.direccion
                                FROM datosdocumento d
                                LEFT JOIN usuario u ON u.idUsuario = d.idUsuario
                                WHERE d.idDocumento = '$id'";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $usuario = $row6['usuario'];
                                $direccion = $row6['direccion'];
                    ?>
                        <p>Señor/a: <?php echo $usuario;?></p>
                        <p>Domicilio: <?php echo $direccion;?></p>
                    </div>
                </div>
                <div class="cot-info">
                    <div class="cot-info-inf">
                    <h2>REFERENCIAS/DATOS CIRUGIA</h2>
                    <?php
                        $sql6 = "SELECT d.medico, d.paciente, d.monto, c.centroMedico
                                FROM datosdocumento d
                                LEFT JOIN centromedico c ON c.idCentro = d.idCentro
                                WHERE d.idDocumento = '$id'";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $medico = $row6['medico'];
                                $paciente = $row6['paciente'];
                                $monto = $row6['monto'];
                                $centroMedico = $row6['centroMedico'];
                    ?>
                    <p>Paciente: <?php echo $paciente;?></p>
                    <p>Profesional: <?php echo $medico;?></p>
                    <p>Centro de salud: <?php echo $centroMedico;?></p>
                    <p>Se presenta presupuesto del/los producto/s que a continuación se detallan</p>
                    </div>
                </div>

                <div class="cot-gri">
                    <div class="cot-gri-info">
                            <?php
                            echo "<table class=tabla>
                                    <thead>
                                        <tr>
                                            <th><p>PRODUCTO</p></th>
                                            <th><p>CANTIDAD</p></th>
                                            <th><p>PRECIO UNITARIO</p></th>
                                        </tr>
                                    </thead>
                                ";
                                        $consulta=mysqli_query($datos_base, "SELECT pr.cantidad, pr.precio, p.producto
                                        FROM productodocumento pr
                                        LEFT JOIN producto p ON p.idProducto = pr.idProducto
                                        WHERE pr.idDocumento = '$id'
                                        ");
                                            while($listar = mysqli_fetch_array($consulta)) 
                                            {
                                                echo
                                                " 
                                                    <tr>
                                                    <td><h4 style='font-size:16px;'>".$listar['producto']."</h4 ></td>
                                                    <td><h4 style='font-size:16px;'>".$listar['cantidad']."</h4 ></td>
                                                    <td><h4 style='font-size:16px;'>$".$listar['precio']."</h4 ></td>
                                                    </tr>
                                                ";
                                            }
                                        echo "</table>";
                                            ?>
                                            <?php
                                            if(isset($_GET['ok'])){
                                                ?>
                                                <script>ok();</script>
                                                <?php			
                                            }
                                            if(isset($_GET['no'])){
                                                ?>
                                                <script>no();</script>
                                                <?php			
                                            }
                                ?>
                    </div>
                </div>

                <div class="cot-fin">
                    <div class="cot-fin-info">
                    <?php
                        $sql6 = "SELECT monto
                                FROM datosdocumento
                                WHERE idDocumento = '$id'";
                                $result6 = $datos_base->query($sql6);
                                $row6 = $result6->fetch_assoc();
                                $monto = $row6['monto'];
                    ?>
                        <p><strong>Precio final (IVA INCLUIDO): $<?php echo $monto;?></strong></p>
                    </div>
                </div>

            </div>
            <div class="btn-pdf" id="botones">
                <button type="submit" class="btnPdf pre" id="imp" onclick="javascript:imprim2();">Imprimir</button>
                <form method="POST" action="../../Logica/agregandoOrdenCompra.php">
                    <input type="text" name="idnro" class="valorPeque" value="<?php echo $id;?>">
                    <?php
                        $sql6 = "SELECT idEstadoDocumento FROM documento WHERE idDocumento = '$id'";
                        $result6 = $datos_base->query($sql6);
                        $row6 = $result6->fetch_assoc();
                        $est = $row6['idEstadoDocumento'];

                        if($est == 2){
                            ?>
                            <button type="submit" class="btnPdf pre" name="aceptar" id="imp">Aceptar Presupuesto</button>
                            <button type="submit" class="btnPdf pre" name="rechazo" id="imp">Rechazar Presupuesto</button>
                            <?php
                        }
                        ?>

                </form>
               
            </div>
            <div class="agregar">
                <a href="./presupuestos.php" class="volver" id="vlv">VOLVER</a>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>