<?php
/* error_reporting(0); */
session_start(); 
include('../Utils/conexion.php');
if(!isset($_SESSION['usuario'])) 
    {       
        header('Location: ../Principal/login.php'); 
        exit();
    };
$iduser = $_SESSION['usuario'];
$sql = "SELECT idUsuario, usuario FROM usuario WHERE usuario='$iduser'";
$resultado = $datos_base->query($sql);
$row = $resultado->fetch_assoc();

$nom = $row['usuario'];
$idUsu = $row['idUsuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
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
<style type="text/css" media="print">
        @media print {
                        #formulario{display:none;}
                        #vlv {display:none;}
                        #imp {display:none;}
                        #logo {display:none;}
                        #titulo {display:none;}
                        header {display:none;}
                                        }
</style>
        <script>
        function imprim2() {
        window.print();
                }
</script>
    <?php
        if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
        if (!isset($_POST['buscadesde'])){$_POST['buscadesde'] = '';}
        if (!isset($_POST['buscahasta'])){$_POST['buscahasta'] = '';}
        if (!isset($_POST["cantidad"])){$_POST["cantidad"] = '';}
        if (!isset($_POST["orden"])){$_POST["orden"] = '';}
    ?>
    <div class="cont-img" id="logo">
        <a href="./principal.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri"></header>

    <main>
    <section class="ini">
        <div class="ini-tit" id="titulo">
            <h1>Productos vendidos</h1>
        </div>
       
        <form id="form2" name="form2"  method="POST" class="formFilter" action="./prodVendidos.php">
        <div class="contFilter" id="formulario">
                <div class="contFilter--name">
                        <label  class="form-label">Nombre a buscar</label>
                        <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
                </div>
                <div class="contFilter--order">
                        Selecciona el orden
                        <select id="assigned-tutor-filter" id="orden" name="orden" class="form-control mt-2" >
                                <?php if ($_POST["orden"] != ''){ ?>
                                        <option value="<?php echo $_POST["orden"]; ?>">
                                                <?php 
                        if ($_POST["orden"] == '1'){echo 'Ordenar por nombre';} 
                        if ($_POST["orden"] == '2'){echo 'Ordenar por Grupo';} 
                        if ($_POST["orden"] == '3'){echo 'Ordenar por Cantidad';} 
                        if ($_POST["orden"] == '4'){echo 'Ordenar por Precio';} 
                        ?>
                        </option>
                        <?php } ?>
                        <option value="">Sin orden</option>
                        <option value="1">Ordenar por nombre</option>
                        <option value="2">Ordenar por Grupo</option>
                        <option value="3">Ordenar por Cantidad</option>
                        <option value="4">Ordenar por Precio</option>
                </select>
                </div>
                <div class="contFilter--search">
                    <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: blue; color: white;">
                    <p>Exportar:</p>
                    <button type="submit" id="imp" style="border:none; background-color:transparent;" onclick="javascript:imprim2();"><i class="fa-solid fa-file-pdf fa-2x" style="color: #c82828;"></i></button>
                    <button type="submit" form="formu" style="border:none; background-color:transparent;"><i class="fa-solid fa-file-excel fa-2x" style="color: #1f5120;"></i></button>
                </div>
        </div>
<!--             <h4 class="card-title">Filtro de búsqueda</h4>
            <div class="col-11">
                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Cantidad desde:
                                                        <input type="number" id="buscadesde" name="buscadesde" class="form-control mt-2" value="<?php echo $_POST["buscadesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Cantidad hasta:
                                                        <input type="number" id="buscahasta" name="buscahasta" class="form-control mt-2" value="<?php echo $_POST["buscahasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Grupo
                                                        <select id="subject-filter" id="grupo" name="grupo" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <option value="">Todos</option>
                                                            <?php 
                                                            $consulta= "SELECT * FROM grupoproducto";
                                                            $ejecutar= mysqli_query($datos_base, $consulta) or die(mysqli_error($datos_base));
                                                            ?>
                                                            <?php foreach ($ejecutar as $opciones): ?> 
                                                            <option value="<?php echo $opciones['idGrupoProducto']?>"><?php echo $opciones['grupoProducto']?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                </th>
                                        </tr>
                                </thead>
                        </table>
                </div> -->




        <?php 

        if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
        $aKeyword = explode(" ", $_POST['buscar']);

        if ($_POST["buscar"] == '' AND $_POST['idGrupoProducto'] == '' AND $_POST['buscadesde'] == '' AND $_POST['buscahasta'] == '' AND $_POST['grupo'] == ''){ 
                $query ="SELECT sum(pd.cantidad) as cantidad, pr.producto, g.grupoProducto, (pd.cantidad * pd.precio) AS total
                FROM documento d
                LEFT JOIN productodocumento pd ON pd.idDocumento = d.idDocumento
                LEFT JOIN producto pr ON pr.idProducto = pd.idProducto
                LEFT JOIN grupoproducto g ON g.idGrupoProducto = pr.idGrupoProducto
                WHERE d.idEstadoDocumento = 10
                GROUP BY pr.producto ";
        }else{

                $query = "SELECT sum(pd.cantidad) as cantidad, pr.producto, g.grupoProducto, (pd.cantidad * pd.precio) AS total
                FROM documento d
                LEFT JOIN productodocumento pd ON pd.idDocumento = d.idDocumento
                LEFT JOIN producto pr ON pr.idProducto = pd.idProducto
                LEFT JOIN grupoproducto g ON g.idGrupoProducto = pr.idGrupoProducto ";

                if ($_POST["buscar"] != '' ){ 
                        $query .= " WHERE (pr.producto LIKE LOWER('%".$aKeyword[0]."%')) AND d.idEstadoDocumento = 10 GROUP BY pr.producto ";
                
                    for($i = 1; $i < count($aKeyword); $i++) {
                    if(!empty($aKeyword[$i])) {
                        $query .= " OR pr.producto LIKE '%" . $aKeyword[$i] . "%'  ";
                    }
                    }

                }

/*          if ($_POST["buscadesde"] != '' ){
                $query .= " AND cantidad BETWEEN '".$_POST["buscadesde"]."' AND '".$_POST["buscahasta"]."' GROUP BY pr.producto ";
         } */

/*          if ($_POST["grupo"] != '' ){
                $query .= " AND pr.idGrupoProducto = '".$_POST["grupo"]."'  ";
         } */


         if ($_POST["orden"] == '1' ){
                    $query .= " ORDER BY pr.producto ASC ";
         }

         if ($_POST["orden"] == '2' ){
                $query .= " ORDER BY g.grupoProducto ASC ";
         }

         if ($_POST["orden"] == '3' ){
                $query .= "  ORDER BY cantidad DESC ";
         }

         if ($_POST["orden"] == '4' ){
                $query .= "  ORDER BY total DESC ";
         }
}

/*         $consulta=mysqli_query($datos_base, $query); */
         $sql = $datos_base->query($query);

         $numeroSql = mysqli_num_rows($sql);

        ?>
        <div class="contResult">
                <p style="font-weight: bold; color:blue; margin-bottom: 0px;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
        </div>
</form>


        <div class="table-responsive" id="imprimirEsto">
                <table class="table">
                <thead>
                        <tr>
                            <th style=" text-align: center; width:500px;">PRODUCTO</th>
                            <th style=" text-align: center; width:300px;">GRUPO</th>
                            <th style=" text-align: center; width:200px;">CANTIDAD</th>
                            <th style=" text-align: center; width:250px;">PRECIO + IVA</th>
                        </tr>
                </thead>
                <tbody>
                <?php While($rowSql = $sql->fetch_assoc()) {?>
                        <tr>
                        <td><h4 style="font-size:14px; text-align:left; margin-left: 5px;"><?php echo $rowSql["producto"]; ?></h4></td>
                        <td><h4 style="font-size:14px; text-align:left; margin-left: 5px;"><?php echo $rowSql["grupoProducto"]; ?></h4></td>
                        <td><h4 style="font-size:14px; text-align: right; margin-right: 5px;"><?php echo $rowSql["cantidad"]; ?></h4></td>
                        <td><h4 style="font-size:14px; text-align: right; margin-right: 5px;"><?php echo "$".number_format($rowSql["total"]*1.21,2); ?></h4></td>
                        </tr>
               
               <?php } ?>
                </tbody>
            </table>
        </div>

        <form id="formu" action="../Exportar/ExcelProdVendidos.php" method="POST">
            <input type="text" name="sql" class="valorPeque" readonly="readonly" value="<?php echo $query;?>">
        </form>

        <div class="agregar" id="imp">
            <a href="./estadisticas.php" class="volver"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
        </div>
    </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>