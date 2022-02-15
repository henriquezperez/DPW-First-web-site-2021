<?php 
    require_once("../models/connection.php");
    require_once("../models/cursoModel.php");
    require_once("../models/areaModel.php");
    require_once("../models/instructorModel.php");
    require_once("../models/usuarioModel.php");
    $contextArea = new AreaModel();    
    $resultArea = $contextArea->SelectAll();
    $contextInstructor = new InstructorModel();    
    $resultInstructor= $contextInstructor->SelectAll();
    $info;
    $pass=@$_POST["clave"];
    $pass1=@$_POST["clave2"];
    $hash = hash("md5",$pass1);
    if(isset($_POST["submit"])){
        if($pass == $pass1 && @$_POST["user"]>1 && @$_POST["email"]>1 && @$_POST["clave"]>1){
            $context = new UsuarioModel();
            $nombreusuario = $_POST["user"];
            $email = $_POST["email"];
            $result = $context->InsertAdmin($nombreusuario,$email,$hash);
            header("Location:usuarios.php?id=1");
        }else{
            header('Location:new-admin.php?mensaje=error');
        }
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
        <h2>Nuevo Administrador</h2>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="cursos.php">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
        </ol>
    </nav>                        

       <!-- <form action ="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio $(USD)</label>
                <input type="text" class="form-control" name="precio" placeholder="00.00">                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" placeholder="Escribe...">                
            </div>  
            <div class="mb-3">
                <label for="" class="form-label">Area</label>
                <select class="form-select" aria-label="Default select example" name="areaid">
                    <?php for($i =0; $i < count($resultArea);$i++){?>
                    <option value="<?php echo $resultArea[$i]["areaid"] ?>"><?php echo $resultArea[$i]["nombre"] ?></option>
                    <?php } ?>
                </select>   
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Instructor</label>
                <select class="form-select" aria-label="Default select example" name="instructorid">
                    <?php for($i =0; $i < count($resultInstructor);$i++){?>
                    <option value="<?php echo $resultInstructor[$i]["instructorid"] ?>"><?php echo $resultInstructor[$i]["nombrecompleto"] ?></option>
                    <?php } ?>
                </select>   
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control"   >              
            </div> 
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form> -->

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Administrator</h3></div>
                                    <?php 
                                        if(isset($_GET['mensaje']) && $_GET['mensaje']=='error'){
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Error!!</strong> ¡Verifique sus datos!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="user" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName" class="label">Name user</label>
                                                    </div>
                                                </div>
                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail"  name="email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail" class="label">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="clave" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword" class="label">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="clave2" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm" class="label">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                <input type="submit" value="Crear cuenta" class="btn btn-dark" name="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
            <script src="public/js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="public/js/datatables-simple-demo.js"></script>
    </main>
  </div>
</div>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../public/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
