<?php 
    require_once("../models/connection.php");
    require_once("../models/instructorModel.php");

    if(isset($_POST["nombrecompleto"])){
        $context = new InstructorModel();
        $nombrecompleto = $_POST["nombrecompleto"];
        $especialidad = $_POST["especialidad"];
        
        $nombreimagen = $_FILES["imagen"]["name"];
        $valor = explode(".",$nombreimagen);
        $imagen = array_pop($valor);
        $tempimagen = $_FILES["imagen"]["tmp_name"];
        $hash = substr(md5(time()),0,8) . "." . $imagen;
        $rutaimagen = "../customer/public/images/instructor/". $hash;
        move_uploaded_file($tempimagen,$rutaimagen);
      
        $result = $context->Insert($nombrecompleto,$especialidad, $hash);
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
        <h2>Nuevo Instructor</h2>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="instructor.php">Instructor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
        </ol>
    </nav>                        

        <form action ="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombrecompleto" require="requiere">                
            </div>      
            <div class="mb-3">
                <label for="" class="form-label">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" require="requiere">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control"   >              
            </div> 
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
