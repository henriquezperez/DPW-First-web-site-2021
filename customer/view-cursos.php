<?php 
    include("../headers/nav-bar.php");
    require_once("../models/connection.php");
    require_once("../models/cursoModel.php");
    require_once("../models/cursosDeUsuarioModel.php");
    $contextCursos = new CursosDeUsuario();
    $resultCursos = $contextCursos->SelectAll();
    $context = new CursoModel();
    $result;
    $info;
   if(isset($_GET["id"])){
        $context = new CursoModel();
        $id = $_GET["id"];
        $result =$context->SelectById($id);
    }
   /* if($result["cursoid"] == $resultCursos["cursoid"]){
        $info = "Ya haz comprado este curso!";
    }*/
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
      <?php if(@count($result) > 0){ ?>
        <h2><i class="fas fa-book"></i> Cursos de <?php echo @$result[0]["area"] ?></h2>
        <h4 class="totalCursos">Cursos disponibles: <?php echo count($result); ?></h4>
        <?php } else {?>
            <h2>No hay cursos disponibles en esta área!</h2>
            <?php } ?>
    
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="catalogo.php">Catalogo Areas</a></li>
            <li class="breadcrumb-item"><a href="#">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista</li>
        </ol>
    </nav>
    <section>
        <div class="row">
            <div class="row row-cols- row-cols-md-4 g-3">
            <?php for($i=0; $i<count($result); $i++){?>
                <div class="col">
                <div class="card h-100 border-primary"  style="max-width: 16rem">
                    <img class="card-img-top" src="public/images/cursos/<?php echo $result[$i]["imagen"]?>" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $result[$i]["nombre"] ?></h5>
                        <h5 class="card-title">Descripción:</h5>
                        <p class="card-text"><?php echo $result[$i]["descripcion"] ?></p>
                        <h6 class="card-text">$<?php echo $result[$i]["costo"] ?></h6>
                        <h6 class="card-text"><a class="pass-ins card-text" href="view-instructor.php?id=<?php echo $result[$i]["instructorid"] ?>?areaview=<?php echo $result[$i]["area"] ?>">Instructor: <?php echo $result[$i]["instructor"] ?></a></h6>
                        <a href="comprar.php?idCurso=<?php echo $result[$i]["cursoid"] ?>?idArea=<?php echo $result[$i]["areaid"]?>" class="btn btn-primary"><span data-feather="shopping-cart"></span>  Comprar</a>
                    </div>
                </div>
                </div>
            <?php } ?>
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
