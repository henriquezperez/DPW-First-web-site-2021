<?php 
    include("../headers/nav-bar.php");
    require_once("../models/connection.php");
    require_once("../models/cursoModel.php");
    require_once("../models/cursosDeUsuarioModel.php");
    $context = new CursoModel();
    $result;
    $info;
    $info2;
    $miCurso = $_GET["idCurso"];
   if(isset($_GET["idCurso"])){
        $idCurso = $_GET["idCurso"];
        $result =$context->SelectByIdBuy($idCurso);
    }
   if(isset($_GET["idCurso"])){
        $contextCursos = new CursosDeUsuario();
        $usuarioId = $user;
        $miCurso = $_GET["idCurso"];
        if(@$_SESSION["email"]<1){
            $info = "Registrate o si ya tienes una cuenta entra para poder comprar!";
        }else{
            $insertCurso = $contextCursos->Insert($miCurso,$usuarioId);
        }
    } 
    if($user == 1){
        $info2 = "Zona de prueba";
    }
?>

    <link rel="stylesheet" href="public/css/style.css">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
     <h4><i class="fas fa-shopping-cart"></i> Comprar curso: <?php echo $result[0]["nombre"] ?></h4>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="catalogo.php">Catalogo Areas</a></li>
            <li class="breadcrumb-item"><a href="#">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista</li>
        </ol>
    </nav>
    <section>
        <div class="card mb-3" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img class="img-fluid rounded-start card" src="public/images/cursos/<?php echo $result[0]["imagen"]?>" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
            <h3 class="card-title"><?php echo $result[0]["nombre"] ?></h5>
                <h5 class="card-title">Descripción:</h5>
                <p class="card-text"><?php echo $result[0]["descripcion"] ?></p>
                <h6 class="card-text">$<?php echo $result[0]["costo"] ?></h6>
                <h6 class="card-text"><a class="pass-ins card-text" href="view-instructor.php?id=<?php echo $result[0]["instructorid"] ?>?areaview=<?php echo $result[0]["area"] ?>">Instructor: <?php echo $result[0]["instructor"] ?></a></h6>
                <?php if(@$_SESSION["email"] > 1) {?>
                   <!--  <a href="miscursos.php?miCurso=<?php echo $result[0]["cursoid"] ?>" class="btn btn-primary"><span data-feather="shopping-cart" submit="submit"></span> Realizar Compra</a> -->
                <a href="miscursos.php" class="btn btn-success"><i class="far fa-check-circle"></i> Compra Realizada: Ver</a>
                <?php } else{ ?>
                <h5 class="name-user">
                    <span data-feather="warning">
                    </span><?php echo $info; ?>
                </h5>
                <?php } ?> 
            </div>
            </div>
        </div>
        </div>
    </section>
    </main>
  </div>
</div>
<div class="espace">
       <h6>Miguel Henríquez Pérez</h6>
    </div>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../public/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
