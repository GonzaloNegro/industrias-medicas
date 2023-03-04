<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
</head>
<body>
<script type="text/javascript">
			function done(){
				swal("Solicitud enviada", "Verifique su correo para reestablecer su contraseña", "success");
			}	</script>
			<script>
			function error(){
				swal("Usuario o email incorrecto", "No existe usuario registrado con el usuario o email ingresado", "error");
			}	
			</script>
<div class="cont-img" id="imagen">
        <a href="./restablecer.php" class="imagenb">
            <img src="../Imagenes/c-titulo.png" alt="logo">
         </a>

    </div>

    <main>
        <section>
            <div class="clave">
                <form method="POST" action="../Logica/reestablecer.php" data-aos="fade-zoom-in"
                                                        data-aos-easing="ease-in-back"
                                                        data-aos-delay="300"
                                                        data-aos-offset="0">
                    <div>
                        <h3 style="padding:10px;">RESTABLECER CONTRASEÑA</h3></div>
                    <div>
                        <input class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div>
                        <input class="form-control" type="email" name="email" placeholder="Email registrado" required>
                    </div>
                    <div>
                        <button type="submit">Enviar</button>
                    </div>
                </form>
                <?php
				if(isset($_GET['ok'])){
					/*echo "<h4>CONTRASEÑA CAMBIADA</h4>";*/?>
					<script>done();</script>
					<?php
				}
				if(isset($_GET['error'])){
					/*echo "<h4>CUIL O CONTRASEÑA INCORRECTA</h4>";*/?>
					<script>error();</script>
					<?php
				}
			?>
            </div>
            <div class="agregar">
                <a href="./login.php" class="volver" id="vlv">VOLVER</a>
            </div>
        </section>
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>