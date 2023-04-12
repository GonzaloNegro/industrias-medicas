<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagenes/c-titulo.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
    <meta name="description" content="Distribuidora de productos médicos. Nuestro compromiso es brindar productos y servicios de alto nivel tecnológco.">
    <meta name="keywords" content="industrias, medicas, protesis, implantes, argentina, cordoba, home">
</head>
<body class="fondo__inicio">
<script type="text/javascript">
			function error(){
				swal.fire(  {title: "Usuario o contraseña incorrecta.",
						icon: "error",
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='login.php';
						}
						}
						);
			}	
			</script>
            <script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Bienvenido!",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='../Sistema/principal.php';
						}
						}
						);
			}	
			</script>
            <script type="text/javascript">
			function reg(){
				swal.fire(  {title: "Usuario registrado!",
                        text: 'Recibirá un correo cuando Industrias Médicas habilite su cuenta.',
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='./login.php';
						}
						}
						);
			}	
			</script>
                        <script type="text/javascript">
			function ina(){
				swal.fire(  {title: "Usuario inactivo",
                        text: 'Su usuario aún no ha sido activado. Industrias Médicas se contactará con usted al darle de alta en el sistema.',
						icon: "info",
						showConfirmButton: true,
						showCancelButton: false,
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='./login.php';
						}
						}
						);
			}	
			</script>
            <script type="text/javascript">
			function con(){
				swal.fire("La contraseña es demasiado corta", "Por favor genere una nueva clave de al menos 8 caracteres", "error");
			}	
			</script>
    <main>
    <script>
    function valideKey(evt){
    
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code!=32) { // backspace.
      return true;
    } 
      return false;
    }
    </script>
        <div class="contenedor__todo" data-aos="fade-zoom-in"
                                        data-aos-easing="ease-in-back"
                                        data-aos-delay="500"
                                        data-aos-offset="0">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya estás registrado?</h3>
                    <p>Inicia sesión ingresar al sistema</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no estás registrado?</h3>
                    <p>Registrate para acceder al sistema</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <div class="contenedor__login-register">
                <form method="POST" action="../Utils/validarLogin.php" id="formu" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" id="user" name="usuario" placeholder="Usuario">
                    <input type="password" id="password" name="contraseña" onkeypress="return valideKey(event);"  placeholder="Contraseña">
                    <button type="submit" disabled id="btn" name="ingreso">Entrar</button>
                    <div class="centrado">
                        <li><a href="./restablecer.php">¿Olvidaste tu contraseña?</a></li>
                        <li><a href="../index.php">Volver</a></li>
                    </div>

                </form>
                <?php
                	if(isset($_GET['ok'])){
					?>
					<script>ok();</script>
					<?php			
				    }
                    if(isset($_GET['error'])){
                        ?>
                        <script>error();</script>
                        <?php
                    }
                    if(isset($_GET['reg'])){
                        ?>
                        <script>reg();</script>
                        <?php
                    }
                    if(isset($_GET['con'])){
                        ?>
                        <script>con();</script>
                        <?php
                    }
                    if(isset($_GET['ina'])){
                        ?>
                        <script>ina();</script>
                        <?php
                    }
			    ?>
                <form method="POST" action="../Utils/validarLogin.php"  class="formulario__register">
                    <h2>Registrate</h2>
                    <input type="text" id="nombreEmpresa" name="regNom" placeholder="Nombre de la Empresa" required>
                    <input type="text" id="correo" name="regCor" placeholder="Correo Electronico" required>
                    <input type="text" id="correo" name="regDir" placeholder="Dirección" required>
                    <input type="text" id="usuario" name="regUsu" placeholder="Usuario" required>
                    <input type="password" id="pass" name="regPas" placeholder="Contraseña" onkeypress="return valideKey(event);"  required>
                    <p style="font-size:12px;">*La contraseña debe ser de al menos 8 caracteres.</p>
                    <fieldset>
                        <div class="rad1">
                            <label>Obra Social</label>
                            <input class="rad" type="radio" id="huey" name="tipo" value="obra" checked>
                        </div>

                        <div class="rad2">
                            <div class="rad2-l">
                                <label>Proveedor</label>
                            </div>
                            <div class="rad2-i">
                                <input class="rad" type="radio" id="dewey" name="tipo" value="proveedor">
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" id="registrar" name="registrar">Regístrarse</button>
                </form>
            </div>
        </div>
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