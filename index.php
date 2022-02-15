
<?php
  
    include("headers/nav-bar-visint.php");
 // include("public/css/bootstrap.min.css");
?>

  <!-- Barra de navegacion -->
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!--  -->
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-globe"></i> Carreras online!</h1>
        <?php if(@$_SESSION["email"] > 1) {?>
          <h5 class="name-user">
            <span data-feather="user">
            </span>Usuario: <?php echo @$_SESSION["email"]; ?>
          </h5>
        <?php } else{ ?>
          <h5 class="name-user">
            <span data-feather="arrow-up">
            </span>Aquí!
          </h5>
          <?php } ?>
      </div>

    <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
          <img src="customer/public/images/areas/banner-8.png" class="d-block w-200" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h4 class="textBanner">¿Quieres aprender a programar?</h4>
            <p class="textBannerParrafo">Este curso es para ti!.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
          <img src="customer/public/images/areas/banner-6.png" class="d-block w-200" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h4 class="textBanner">Crea bases de datos</h4>
            <p class="textBannerParrafo">Aprenderas todo sobre base de datos.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
          <img src="customer/public/images/areas/banner-7.png" class="d-block w-200" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h4 class="textBanner">¿Te gustaría diseñar páginas web?</h4>
            <p class="textBannerParrafo">Explota tu creativida con este curso, ¡Aprovecha!.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="banner">
      <!-- <img src="public/images/banner.jpg" alt=""> -->
      </div>  
    </div>
    <?php if(@$_SESSION["email"] < 1) {?>
        <h2>Inicia sesíon o registrate para acceder a nuestro servicios!</h2>
      <?php } ?>
      <link rel="stylesheet" href="public/css/stylesInfo.css">
      <section>
      <div class="container-fluid Informacion">
        <h2 class="informacion-title">Desarrolla tus habilidades</h2>
        <div class="row">
          <div class="col-6">
            <h3 class="informacion-subtitle">¿Por qué somos la mejor opción?</h3>
            <div class="parrafos-index">
          <p>Somos una empresa de calidad, que ofrece carreras completas online!</p>
          <p>Gracias a su fundadores, la tecnología llega en cualquier parte del mundo!</p>
        </div>

        <?php if(@$_SESSION["email"] < 1) {?>
            <h3 class="informacion-subtitle">¿Cómo comenzar?</h3>
              <div class="parrafos-index">
                <p>Registrate y opten las mejores ofertas de cualquier área tecnológica</p>
                <p>1- Resgistrate en el botón Sign Up</p>
                <p>2- Luego preciosa en el botón de Catálogo</p>
                <p>3- Mira las áreas que quieres aprender!</p>
                <p>4- Preciona en ver y te llevará a los cursos</p>
                <p>5- Selecciona el curso en comprar</p>
                <p>6- Registra tus datos para realizar la compra</p>
                <p>7- Listo!, sientete cómodo aprendiendo desde casa o cualquier lugar...</p>
            </div>
          </div>
        <?php } ?>
       
            
			<div class="col-6">
				<div class="galeria">
						<img src="public/images/img-1.jpg" alt="" class="galeria-fotos foto-1">
						<img src="public/images/img-2.jpg" alt="" class="galeria-fotos foto-2">
						<img src="public/images/img-3.jpg" alt="" class="galeria-fotos foto-3">
					</div>			
				</div>
			</div>
		</div>
	</div>

  <!--
	<div class="container-fluid guia">
		<h2 class="informacion-title">Beneficios</h2>
		<div class="row">
			<div class="col-3">informacion 1</div>
			<div class="col-3">informacion 2</div>
			<div class="col-3">informacion 3</div>
			<div class="col-3">informacion 4</div>
		</div>
	</div> -->
  </section>

    </main>
    </div>
  </div>
  <div class="footer">
                <footer class="footerlogin">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
  

  <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="public/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
