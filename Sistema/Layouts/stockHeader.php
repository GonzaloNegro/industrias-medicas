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
                            <li>
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
                                <a class="nav-link variacion" href="./stock.php">Consultar stock</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link variacion" href="./movimientoStock.php">Movimiento stock</a>
                            </li>
                            <li>
                                <a class="nav-link variacion" href="./stockRevisar.php">A revisar</a>
                            </li>
                            <li>
                                <a class="nav-link variacion" href="./productos.php">Productos</a>
                            </li>
                            <li>
                                <a class="nav-link variacion" href="./gruposProductos.php">Grupos Productos</a>
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
                        <a href="#" class="nav-link dropdown-toggle variacion" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ventas</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                if($idRol == $rolgerente OR $idRol == $roladmin){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link variacion" href="../Ventas/historicoVentas.php">Histórico</a>
                            </li>
                            <?php
                                }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link variacion" href="../Ventas/cotizaciones.php">Pedido Médico</a>
                            </li>
                            <li >
                                <a class="nav-link variacion" href="../Ventas/presupuestos.php">Presupuestos</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link variacion" href="../Ventas/ordenCompra.php">Orden de compra</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link variacion" href="../Ventas/remitos.php">Remitos</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link variacion" href="../Ventas/facturas.php">Facturas</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link variacion" href="../Ventas/ordenPago.php">Orden de pago</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link variacion" href="../Ventas/recibo.php">Recibo</a>
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
                    <p style='color: blue; font-weight: bold;'><u>Usuario</u>: <?php echo $nom;?></p>
                </div>
               <div class="not-exit-exit">
                   <a href="../Utils/salir.php">
                       <button class="btn btn-outline-danger" type="submit">Salir</button>
                    </a>
               </div>
            </div>
        </div>
    </nav>
</header>