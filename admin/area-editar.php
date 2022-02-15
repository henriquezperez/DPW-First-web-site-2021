<?php 
    require_once("../models/connection.php");
    require_once("../models/areaModel.php");
    require_once("../models/estadoModel.php");

    $contexEstado = new EstadoModel();
    $resultEstado = $contexEstado->SelectAll();

    //Es para regresar el registro del id
    if(isset($_GET["id"])){
        $context = new AreaModel();
        $id = $_GET["id"];
        $result = $context->Select($id);        
    }    

    //Para guardar la modificacion
    if(isset($_POST["nombre"])){
        $context = new AreaModel();
        $id = $_POST["areaid"];
        $nombre = $_POST["nombre"];
        $estado = $_POST["estadoId"];
        $desc = $_POST["descripcion"];
        $result = $context->Update($id,$nombre,$desc,$estado);  
        header("Location:areas.php");
    }
?>

<?php include("../headers/nav-bar.php") ?>
    <?php   
        if(@$_SESSION["tipousuario"] != 1){
            header("Location:../Info.php");
        } 
    ?>
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
    <h2>Editar área</h2>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="areas.php">Areas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="row">
        <div class="row row-cols- row-cols-md-5 g-3">
        <div class="col">
        <div class="card h-200 border-primary"  style="max-width: 15rem">
            <img class="card-img-top" src="../customer/public/images/areas/<?php echo $result["imagen"] ?>" alt="Card image cap"  width="110" height="150">
                <div class="card-body">                    
                <h5 class="card-title">Imagen</h5>
                </div>
            </div>
        </div>
        </div>
    </div>                                     
        <form action ="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $result["nombre"] ?>">                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $result["descripcion"] ?>">               
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control" value="<?php echo $result["imagen"] ?>">              
            </div> 
            <div class="mb-3">
                <label for="" class="form-label">Estado</label>
                <select class="form-select" aria-label="Default select example" name="estadoId">
                    <?php for($i =0; $i < count($resultEstado);$i++){?>
                    <option value="<?php echo $resultEstado[$i]["estadoId"] ?>"
                    <?php echo $resultEstado[$i]["estadoId"] == $result["estadoId"] ? "Selected":"" ?>>
                        <?php echo $resultEstado[$i]["Nombre"] ?>
                    </option>
                    <?php } ?>
                </select>   
            </div> 
            <input type="hidden" value="<?php echo $result["areaid"] ?>" name="areaid">       
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </main>
  </div>
</div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../public/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
