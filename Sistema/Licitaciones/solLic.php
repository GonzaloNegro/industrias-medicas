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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
        <!-- CONTROL DE QUE SOLO INGRESAN A ESTA PÁGINA GERENTE Y ADMINISTRADOR -->
        <?php
        $rolgerente = 1;
        $roladmin = 2;
        $roldeposito = 3;
        $rolventas = 4;
        $rolobra = 5;
        $rolproveedor = 6;
        if($idRol == $roldeposito OR $idRol == $roladmin OR $idRol == $rolobra OR $idRol == $rolproveedor){
            header("Location: ../principal.php");
        }
        ?>
<script type="text/javascript">
        function pedido(){
            swal.fire(  {title: "Solicitud de productos generada correctamente",
                icon: "success",
                showConfirmButton: true,
                showCancelButton: false,
                    })}	
	</script>
<script>		
    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
            numero++;
            contador.innerHTML = "Cantidad de productos: "+numero;
        });
        
        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
            if(numero == 0){
            }else{
                numero--;
                contador.innerHTML = "Cantidad de productos: "+numero;
                if(numero == 0){
                    location.reload();
                }
            }
        });
    });
</script>
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
                <h1>Solicitud de productos</h1>
        </div>
        <div class="agrStock">
        <form method="POST" id="formcot" action="../../Logica/solicitudProducto.php">
                <div>
                    <table class="table"  id="tabla">
                        <tr class="fila-fija">
                            <td>
                                <select name="producto[]" id="prod" class="form-control" required>
                                    <option value="" selected disabled="producto[]">-SELECCIONE EL PRODUCTO-</option>
                                    <?php
                                    $consulta= "SELECT * FROM producto";
                                    $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                                    ?>
                                    <?php foreach ($ejecutar as $opciones): ?> 
                                    <option value="<?php echo $opciones['idProducto']?>"><?php echo $opciones['producto']?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                            <td><input type="number" id="cant" required name="cantidad[]" min=1 onkeypress="return valideKey(event);" placeholder="Cantidad"/></td>
                            <td class="eliminar"><button type="button">Eliminar</button></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <textarea name="obs" style="text-transform:uppercase" id="" cols="30" rows="3" placeholder="Observaciones"></textarea>
                </div>
                <div>
                    <p id="contar">Cantidad de productos: 1</p>
                    <button type="submit" id="btncot" name="insertar">GENERAR</button>
                    <button id="adicional" name="adicional" type="button">Insertar otro producto </button>
                </div>
            </form>
          
            <div class="agregar">
                    <a href="../principal.php" class="volver">VOLVER</a>
                </div>
        </div>
        </section>
        <?php
            if(isset($_GET['pedido'])){
                ?>
                <script>pedido();</script>
                <?php			
            }
            ?>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="../Ventas/scriptcot.js"></script>
</body>
</html>