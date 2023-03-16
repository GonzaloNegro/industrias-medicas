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
    <?php
        if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
        if (!isset($_POST['buscadesde'])){$_POST['buscadesde'] = '';}
        if (!isset($_POST['buscahasta'])){$_POST['buscahasta'] = '';}
        if (!isset($_POST["cantidad"])){$_POST["cantidad"] = '';}
        if (!isset($_POST["orden"])){$_POST["orden"] = '';}

    ?>
    <div class="cont-img">
        <a href="./principal.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri"></header>

    <main>
    <section class="ini">
        <div class="ini-tit">
            <h1>Productos vendidos</h1>
        </div>
       
        <form id="form2" name="form2" method="POST" action="./prodVendidos.php">
        <div class="col-12 row">

            <div class="mb-3">
                    <label  class="form-label">Nombre a buscar</label>
                    <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
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
            
            <div class="col-11">

                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Selecciona el orden
                                                        <select id="assigned-tutor-filter" id="orden" name="orden" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <?php if ($_POST["orden"] != ''){ ?>
                                                                <option value="<?php echo $_POST["orden"]; ?>">
                                                                <?php 
                                                                if ($_POST["orden"] == '1'){echo 'Ordenar por nombre';} 
                                                                if ($_POST["orden"] == '2'){echo 'Ordenar por Grupo';} 
                                                                if ($_POST["orden"] == '3'){echo 'Ordenar por Cantidad';} 
                                                                ?>
                                                                </option>
                                                                <?php } ?>
                                                                <option value="">Sin orden</option>
                                                                <option value="1">Ordenar por nombre</option>
                                                                <option value="2">Ordenar por Grupo</option>
                                                                <option value="3">Ordenar por Cantidad</option>
                                                        </select>
                                                </th>
                                          
                                              
                                      
                                        </tr>
                                </thead>
                        </table>
                </div>


                <div class="col-1">
                        <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: blue; color: white;">
                </div>
        </div>


        <?php 

        if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
        $aKeyword = explode(" ", $_POST['buscar']);

        if ($_POST["buscar"] == '' AND $_POST['idGrupoProducto'] == '' AND $_POST['buscadesde'] == '' AND $_POST['buscahasta'] == '' AND $_POST['grupo'] == ''){ 
                $query ="SELECT sum(pd.cantidad) as cantidad, pr.producto, g.grupoProducto
                FROM documento d
                LEFT JOIN productodocumento pd ON pd.idDocumento = d.idDocumento
                LEFT JOIN producto pr ON pr.idProducto = pd.idProducto
                LEFT JOIN grupoproducto g ON g.idGrupoProducto = pr.idGrupoProducto
                WHERE d.idEstadoDocumento = 10
                GROUP BY pr.producto ";
        }else{

                $query = "SELECT sum(pd.cantidad) as cantidad, pr.producto, g.grupoProducto
                FROM documento d
                LEFT JOIN productodocumento pd ON pd.idDocumento = d.idDocumento
                LEFT JOIN producto pr ON pr.idProducto = pd.idProducto
                LEFT JOIN grupoproducto g ON g.idGrupoProducto = pr.idGrupoProducto ";

                if ($_POST["buscar"] != '' ){ 
                        $query .= " WHERE (pr.producto LIKE LOWER('%".$aKeyword[0]."%')) GROUP BY pr.producto ";
                
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
                $query .= "  ORDER BY cantidad ASC ";
         }
}

/*         $consulta=mysqli_query($datos_base, $query); */
         $sql = $datos_base->query($query);

         $numeroSql = mysqli_num_rows($sql);

        ?>
        <p style="font-weight: bold; color:blue;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
</form>


        <div class="table-responsive">
            <table class="table">
                <thead>
                        <tr style="background-color:blue; color:#FFFFFF;">
                                <th style=" text-align: center;"> Producto </th>
                                <th style=" text-align: center;"> Grupo </th>
                                <th style=" text-align: center;"> Cantidad </th>
                        </tr>
                </thead>
                <tbody>
                <?php While($rowSql = $sql->fetch_assoc()) {?>
                        <tr>
                        <td style="text-align: center;"><?php echo $rowSql["producto"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["grupoProducto"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["cantidad"]; ?></td>
                        </tr>
               
               <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="agregar">
            <a href="./estadisticas.php" class="volver">VOLVER</a>
        </div>
    </section>
    </main>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>