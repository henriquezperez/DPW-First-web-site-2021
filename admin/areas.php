<?php 
    //@session_start();
    require_once("../models/connection.php");
    require_once("../models/areaModel.php");
    require_once("../models/usuarioModel.php");
    $contextUser = new UsuarioModel();
   // $res = $contextUser->Select(@$_POST["email"],@$_POST["clave"]);
    
    $context = new AreaModel();
    $result = $context->SelectAllWith(); 
    if(isset($_GET["id"])){
        $context = new AreaModel();
        $id = $_GET["id"];
        $result = $context->Delete($id);        
        header("Location:areas.php");
    }
?>

<?php include("../headers/nav-bar.php") ?>
<?php    if(@$_SESSION["tipousuario"] != 1){
      header("Location:../Info.php");
    } ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
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
    <h2>Área</h2>
    <h4>Total: <?php echo count($result); ?></h4>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="areas.php">Areas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista</li>
        </ol>
    </nav>    
      <div class="btn-of-new">
        <a href="area-nuevo.php" class="btn btn-primary">Nuevo</a>
      </div>
      
      <div class="table-responsive">
      <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <!-- <th>Imagen</th> -->
                    <th>Estado</th>
                    <th>Opcion</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i =0; $i< count($result);$i++) {?>
                <tr>
                    <td><?php echo $result[$i]["ID"] ?></td>
                    <td><?php echo $result[$i]["Nombre"] ?></td>
                    <td><?php echo $result[$i]["Estado"] ?></td>
                    <!-- <td><img width="50px" src="../public/images/areas/<?php echo $result[$i]["imagen"]?>" alt="Card image cap"></td> -->
                    <td>
                        <a class="badge bg-warning" href="area-editar.php?id=<?php echo $result[$i]["ID"] ?>">Editar</a>
                        <a class="badge bg-danger" href="areas.php?id=<?php echo $result[$i]["ID"] ?>">Eliminar</a>                        
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>    
      </div>
    </main>
  </div>
</div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../public/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
