<?php
   
    require_once("../models/connection.php");
    require_once("../models/instructorModel.php");
    require_once("../models/estadoModel.php");

    $contexEstado = new EstadoModel();
    $resultEstado = $contexEstado->SelectAll();

    //Es para regresar el registro del id
    if(isset($_GET["id"])){
        $context = new InstructorModel();
        $id = $_GET["id"];
        $result = $context->Select($id);        
    }    

    //Para guardar la modificacion
    if(isset($_POST["nombrecompleto"])){
        $contextUpdate = new InstructorModel();
        $id = $_POST["instructorid"];
        $nombrecompleto = $_POST["nombrecompleto"];
        $especialidad = $_POST["especialidad"];
        $estado = $_POST["estadoId"];
        $result = $contextUpdate->Update($nombrecompleto,$especialidad,$estado,$id);
        header("Location:instructor.php");
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
    <h2>Editar instructor</h2>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="instructor.php">Instructor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>                      

        <form action ="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombrecompleto" value="<?php echo $result["nombrecompleto"] ?>">                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" value="<?php echo $result["especialidad"] ?>">                
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

            <input type="hidden" value="<?php echo $result["instructorid"] ?>" name="instructorid">       
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
