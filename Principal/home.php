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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css"/>
    <title>Industrias Médicas</title>
    <meta name="description" content="Distribuidora de productos médicos. Nuestro compromiso es brindar productos y servicios de alto nivel tecnológco.">
    <meta name="keywords" content="industrias, medicas, protesis, implantes, argentina, cordoba, home">
</head>
<body>
    <script type="text/javascript">
			function ok(){
				swal.fire(  {title: "Mensaje enviado correctamente!",
						icon: "success",
						showConfirmButton: true,
						showCancelButton: false,
						})
						.then((confirmar) => {
						if (confirmar) {
							window.location.href='./home.php#contacto';
						}
						}
						);
			}	
		</script>
    <nav class="navbar navbar-expand-lg navPrincipal">

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          <div class="collapse navbar-collapse info" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link variacion" href="#nosotros"><span class="inicial">N</span>OSOTROS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link variacion" href="#productos"><span class="inicial">P</span>RODUCTOS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link variacion" href="#contacto"><span class="inicial">C</span>ONTACTO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link variacion" href="login.php"><span class="inicial">L</span>OGIN</a>
              </li>
            </ul>
          </div>

      </nav>

      <section>
        <div class="tamaño">
          <figure class="tamaño-img">
            <img src="../Imagenes/c-logotipo.png" alt="Logo de la marca Industrias Médicas">
          </figure>
          <div class="tamaño-ico">
            <a href="#nosotros">
              <i class="fa-solid fa-arrow-down fa-2x"></i>
            </a>
          </div>
        </div>
      </section>

      <section id="nosotros">
        <div class="container nos">
            <div class="nos-tit" data-aos="zoom-in">
                <img src="../Imagenes/c-titulo.png" alt=""><h2>¿QUIÉNES SOMOS?</h2>
            </div>
            <div class="nos-info">
              <div class="nos-info-arr" data-aos="zoom-in">
                <div class="nos-info-arr-mis">
                  <div class="nos-info-arr-mis-img">
                      <img src="../Imagenes/mision.jpg" alt="">
                  </div>
                  <div class="nos-info-arr-mis-txt">
                    <h3>NUESTRA MISIÓN</h3>
                    <P>Nuestro compromiso es el de brindar productos y servicios de alto nivel tecnológico. Nuestra orientación es hacia la excelencia en el servicio que prestamos, y los productos cuentan con las habilitaciones y controles correspondientes (ANMAT-FDA-CE) al igual que la rastreabilidad necesaria para ofrecer seguridad y garantía, tanto a los profesionales como a los pacientes.
                      Colaborar en el desarrollo de sistemas de salud que cubran las necesidades de los pacientes.
                      Asumir el compromiso, seriedad y responsabilidad que la salud de cada paciente merece.</P>
                    </div>
                </div>

                <div class="nos-info-arr-vis">
                  <div class="nos-info-arr-vis-txt">
                    <h3>NUESTRA VISIÓN</h3>
                    <P>Aspiramos a brindar a nuestros clientes una gama de servicios y productos que se acentúa principalmente en nuestros valores de innovación y calidad, basada en una filosofía de mejora continua en tecnología para la salud, en donde se persigan los más altos estándares de desempeño a nivel organizacional, para proporcionar el mejor soporte técnico y garantizar la postventa, buscando la excelencia, ampliando la variedad de nuestros productos y poder así llegar a nuestros mercados, nuevos sectores, nuevas alianzas y ser líderes en nuestro segmento.</P>
                    </div>
                    <div class="nos-info-arr-vis-img">
                      <img src="../Imagenes/vision.jpeg" alt="">
                    </div>
                  </div>
                </div>

              <div class="nos-info-aba" data-aos="zoom-in">
                <div class="nos-info-aba-tit">
                  <h2>NUESTROS VALORES</h2>
                </div>
                <div class="nos-info-aba-con">
                  <div class="nos-info-aba-con-pri">
                    <div class="nos-info-aba-con-pri-img">
                      <img src="../Imagenes/calidad.jpg" alt="">
                    </div>
                    <div class="nos-info-aba-con-pri-txt">
                      <h3>CALIDAD</h3>
                      <p>Es una de nuestras consignas, la cual significa sinónimo de garantía yseguridad al momento de adquirir uno de nuestros productos o servicios. Esto es vital para el paciente y los diferentes clientes. Es cumplir no solo con los requisitos, sino también con las exigencias de los usuarios.</p>
                    </div>
                  </div>
                  <div class="nos-info-aba-con-sec">
                    <div class="nos-info-aba-con-sec-txt">
                      <h3>SALUD</h3>
                      <p>Es nuestro interés y también un ideal trabajar para que desde nuestro lugar de trabajo logremos, a través de nuestros productos y servicios, el bienestar total que debe tener toda persona, desde el punto de vista físico, mental, emocional y espiritual y no solo la ausencia de enfermedades o impedimientos físicos.</p>
                    </div>
                    <div class="nos-info-aba-con-sec-img">
                      <img src="../Imagenes/salud.png" alt="">
                    </div>
                  </div>
                </div>
              </div>

          </div>
      </section>

      <section id="productos">
        <div class="container prod">
            <div class="prod-tit" data-aos="fade-right">
                <img src="../Imagenes/c-titulo.png" alt=""><h2>NUESTROS PRODUCTOS</h2>
            </div>
            <div class="prod-img" >
                  <div class="prod-img-pri">
                    <div class="card uno"></div>
                    <div class="card dos"></div>
                    <div class="card tres"></div>
                  </div>
                  <div class="prod-img-seg">
                    <div class="card cuatro"></div>
                    <div class="card cinco"></div>
                    <div class="card seis"></div>
                  </div>
                  <div class="prod-img-ter">
                    <div class="card siete"></div>
                    <div class="card ocho"></div>
                    <div class="card nueve"></div>
                  </div>
            </div>
            <div class="prod-but">
              <a href="https://www.flipsnack.com/industriasmedicas/brochure.html" target="_blank"><button class="btn btn-success">Ver catálogo</button></a>
              <a href="../catalogo.pdf" download="catalogoIM.pdf"><button class="btn btn-info" style="color:white;">Descargar catálogo</button></a> 
            </div>
        </div>
      </section>

      <section id="contacto">
        <div class="container con">
            <div class="con-tit" data-aos="fade-right">
                <img src="../Imagenes/c-titulo.png" alt=""><h2>CONTACTANOS</h2>
            </div>
            <div class="con-info" data-aos="zoom-in">
                    <div class="con-info-sup">
                      <div class="con-info-sup-dir">
                          <i class="fa-solid fa-location-dot fa-4x"></i>
                        <p>Pje. Dr. Tomás Bordone 60
                          Córdoba, Argentina</p>
                      </div>
                      <div class="con-info-sup-tel">
                          <i class="fa-solid fa-phone fa-4x"></i>
                        <p>0810-555-6334
                          (0351)4866001</p>
                      </div>
                      <div class="con-info-sup-mail">
                        <i class="fa-solid fa-envelope fa-4x"></i>
                        <p>info@industriasmedicas.com</p>
                      </div>
                    </div>
                    <div class="con-info-inf">
                      <div class="con-info-inf-for">
                        <form method="POST" action="../Utils/enviarConsulta.php">
                          <div>
                            <input type="text" name="nombre" placeholder="Nombre o razón social" required>
                            <input type="email" name="email" placeholder="E-mail" required>
                          </div>
                          <div>
                            <input type="number" name="tel" placeholder="Teléfono">
                            <input type="text" name="asunto" placeholder="Asunto" required>
                          </div>
                          <div>
                            <textarea id="" name="consulta" cols="30" rows="4" placeholder="Mensaje" required></textarea>
                          </div>
                          <div style="padding: 5px;">
                            <button type="submit" class="btn btn-success">Enviar</button>
                          </div>
                        </form>
                        <?php
                                if(isset($_GET['ok'])){
                        ?>
                        <script>ok();</script>
                        <?php			
                      }
                        ?>
                      </div>
                    </div>
            </div>
        </div>
      </section>
      <footer class="fotHome">
        <div class="fot">
            <img src="../Imagenes/c-logotipo.png" alt="">
        </div>
        <div class="tel">
            <p>
                0810-555-6334<br/>
                (0351) 4866001<br/>
                info@industriasmedicas.com
            </p>
        </div>
      </footer>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
      <script src="https://kit.fontawesome.com/ebb188da7c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../Js/script.js"></script>
</body>
</html>