<div class="cont-img">
        <a href="../principal.php" class="imagenb">
            <img src="../../Imagenes/c-titulo.png" alt="logo">
         </a>
    </div>
    <header class="hea-pri">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid navpri">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Datos usuario</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="../datos.php">Mis datos</a>
                                </li>
                                <?php
                                    $rolgerente = 1;
                                    $roladmin = 2;
                                    $roldeposito = 3;
                                    $rolventas = 4;
                                    $rolobra = 5;
                                    $rolproveedor = 6;
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li >
                                    <a class="nav-link variacion" href="../usuarios.php">Usuarios</a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../principal.php" class="nav-link variacion" aria-current="page">Principal</a>
                        </li>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roldeposito){
                        ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Stock</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="../Stock/stock.php">Consultar stock</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="../Stock/movimientoStock.php">Movimiento stock</a>
                                </li>
                                <li>
                                    <a class="nav-link variacion" href="../Stock/stockRevisar.php">A revisar</a>
                                </li>
                                <li>
                                    <a class="nav-link variacion" href="../Stock/productos.php">Productos</a>
                                </li>
                                <li>
                                    <a class="nav-link variacion" href="../Stock/gruposProductos.php">Grupos Productos</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roladmin OR $idRol == $rolventas OR $idRol == $rolproveedor){
                        ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Licitaciones</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="../Licitaciones/historicoLicitaciones.php">Histórico</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($idRol == $rolgerente OR $idRol == $rolventas){
                                ?>
                                <li class="nav-item">
                                    <a href="../Licitaciones/solLic.php" class="nav-link variacion" aria-current="page">Solicitar</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($idRol == $rolgerente OR $idRol == $roladmin){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="../Licitaciones/solicitudLicitacion.php">Solicitudes</a>
                                </li>
                                <?php
                                    }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="../Licitaciones/licCotizaciones.php">Cotizaciones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="../Licitaciones/licOrdenCompra.php">Orden de compra</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="../Licitaciones/licRemitos.php">Remitos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="../Licitaciones/licFacturas.php">Facturas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="../Licitaciones/licOrdenPago.php">Orden de pago</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="../Licitaciones/licRecibo.php">Recibo</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roladmin OR $idRol == $rolobra){
                        ?>
                        <li class="nav-item dropdown">
                            <?php
                            if($idRol != $rolobra){?>
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">VENTAS</a>
                            <?php }else{?>
                            <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">COMPRAS</a>
                            <?php }?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./historicoVentas.php">Histórico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link variacion" href="./cotizaciones.php">Pedido Médico</a>
                                </li>
                                <li >
                                    <a class="nav-link variacion" href="./presupuestos.php">Presupuestos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./ordenCompra.php">Orden de compra</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./remitos.php">Remitos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./facturas.php">Facturas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./ordenPago.php">Orden de pago</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link variacion" href="./recibo.php">Recibo</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($idRol == $rolgerente OR $idRol == $roladmin){
                        ?>
                        <li class="nav-item">
                            <a href="../estadisticas.php" class="nav-link variacion" aria-current="page">Estadisticas</a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="not-exit">
                    <div class="not-exit-name">
                        <p><i class="fa-solid fa-user" style="color: #dc3545;">&nbsp<?php echo $nom;?></i></p>
                    </div>
                   <div class="not-exit-exit">
                       <a href="../../Utils/salir.php">
                            <i class="fa-solid fa-right-from-bracket fa-2x" style="color: #dc3545;"></i>
                        </a>
                   </div>
                </div>
            </div>
        </nav>
    </header>