<?php 
    require_once("../models/connection.php");
    require_once("../models/areaModel.php");
    $context = new AreaModel();
    $result = $context->SelectAll();
?>

<?php include("../headers/nav-bar.php") ?>
    <link rel="stylesheet" href="public/css/style.css">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>  
        <h5 class="name-user"><span data-feather="user"></span>Usuario: <?php echo $_SESSION["email"]; ?></h5>      
      </div>
    <h2>Catalogo</h2>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Catalogo Areas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista</li>
        </ol>
    </nav>
    <section>
        <div class="row">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php for($i=0; $i<count($result); $i++){?>
                    <div class="col">
                    <div class="card h-100" style="max-width: 20rem">
                        <img class="card-img-top" src="public/images/areas/<?php echo $result[$i]["imagen"]?>" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $result[$i]["nombre"] ?></h5>
                            <h5 class="card-title">Descripción:</h5>
                            <p class="card-text"><?php echo $result[$i]["descripcion"] ?></p>
                            <a href="view-cursos.php?id=<?php echo $result[$i]["areaid"]  ?>?name=<?php echo $result[$i]["nombre"] ?>" class="btn btn-primary" >Ver cursos</a>
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
