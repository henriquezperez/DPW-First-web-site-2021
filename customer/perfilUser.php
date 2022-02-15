<?php 
    require_once("../models/connection.php");
    require_once("../models/usuarioModel.php");
   
    $context = new InstructorModel();
    //$context = new CursoModel();
    //$result = $context->SelectAll();
    //$result = $context->SelectAll();
    $result;
    $total;
    //$cursoNombre = $_GET["nombre"];
   if(isset($_GET["id"])){
        $context = new InstructorModel();
        $id = $_GET["id"];
        $result = $context->SelectById($id);
        //$idinstructor = $context->Select(@$_GET["id"]);
       // $total = mysqli_num_rows($result);
    }
    //var_dump($result);
?>

<?php include("../headers/nav-bar.php") ?>
    <link rel="stylesheet" href="public/css/style.css">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <h5 class="name-user"><span data-feather="user"></span>Usuario: <?php echo $_SESSION["email"]; ?></h5>       
      </div>
    <h2>Instructor: <?php echo $result[0]["instructor"]  ?></h2>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Instructor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de cursos</li>
        </ol>
    </nav>
       <section>
       
        <div class="row">
            <div class="row row-cols- row-cols-md-4 g-3">
                <div class="col">
                <div class="card h-100 border-primary"  style="max-width: 16rem">
                <img class="card-img-top" src="public/images/instructor/<?php echo $result[0]["foto"]?>" alt="Card image cap">
                    <div class="card-body">                    
                    <h5 class="card-title">Especialidad: <?php echo $result[0]["especialidad"] ?> </h5>
                    </div>
                </div>
                </div>
                <div>
                    <h4 class="card-text">Cursos:</h4>
                    <div class="btn-group-vertical">
                      <?php for($i=0; $i<count($result); $i++){?>
                        <label class="btn btn-outline-primary" for="btncheck1"><?php echo $result[$i]["nombre"] ?></label>
                        <h5 class="card-title"></h5>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<div class="espace">
       
    </div>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../public/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>