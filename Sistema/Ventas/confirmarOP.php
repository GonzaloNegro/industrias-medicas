<?php
error_reporting(0);
session_start();
include('../../Utils/conexion.php');

$consulta = ConsultarIncidente($_GET['no']);

function ConsultarIncidente($no_tic)
{	
	include('../../Utils/conexion.php');
	$sentencia =  "SELECT * FROM documento WHERE idDocumento='".$no_tic."'";
	$resultado = mysqli_query($datos_base, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return [
		$filas['idDocumento'],/*0*/
		$filas['idEstadoDocumento'],
	];
}

if(!isset($_SESSION['usuario']))
    {       
        header('Location: ./Principal/login.php'); 
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <h1>Ver Orden de Pago</h1>
        </div>
        <div class="agrStock">
            <form method="POST" action="../../Logica/agregandoRecibo.php">
                <div>
                    <p style="text-transform: uppercase;">Orden de Pago N°: <?php echo $consulta[0];?></p>
                    <?php
                    $sql6 = "SELECT da.idDocumento, da.medico, da.paciente, c.centroMedico, u.usuario
                    FROM datosdocumento da
                    LEFT JOIN centromedico c ON c.idCentro = da.idCentro
                    LEFT JOIN usuario u ON u.idUsuario = da.idUsuario
                    WHERE da.idDocumento = $consulta[0];";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $cli = $row6['usuario'];
                    $clin = $row6['centroMedico'];
                    $med = $row6['medico'];
                    $pac = $row6['paciente'];
                    ?>
                    <p style="text-transform: uppercase;">Cliente: <?php echo $cli;?></p>
                    <p style="text-transform: uppercase;">Clinica: <?php echo $clin;?></p>
                    <p style="text-transform: uppercase;">Médico: <?php echo $med;?></p>
                    <p style="text-transform: uppercase;">Paciente: <?php echo $pac;?></p>
                </div>
                <div>
                    <label for="remito">DESCARGAR PDF:</label>
                    <input type="text" class="ocultar" name="nroOP" id="remito" value="<?php echo $consulta[0]?>">
                    <?php
                    $idd = $consulta[0];
                    $est = $consulta[1];

                    $rut = '../upload/ventas/ordenPago/'.$idd;

                    $sql6 = "SELECT ruta FROM archivos WHERE ruta = '$rut'";
                    $result6 = $datos_base->query($sql6);
                    $row6 = $result6->fetch_assoc();
                    $rutafin = $row6['ruta'];
                    
                    if($rutafin != ""){

                    echo 
                        "
                        <a class='btn btn-sm btn-outline-danger' href=../../upload/ventas/ordenPago/$idd.pdf download='OrdenDePagoIM.pdf'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-filetype-pdf' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z'/>
                        </svg></a>
                        "; }
                        else{
                            echo "El archivo se está procesando";
                        }?>
                </div>
                <?php if($rutafin != "" AND $est == 6 AND $idRol == 1 OR $idRol == 2 OR $idRol == 4){?>
                <div>
                    <button type="submit" class="btn btn-success">CONFIRMAR OP</button>
                </div>
                <?php }?>
            </form>
          
            <div class="agregar">
                    <a href="./ordenPago.php" class="volver"><i class="fa-sharp fa-solid fa-arrow-left"></i></a><!-- MODIFICAR -->
                </div>
        </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>