<?php 
    //session_start();
    require_once("models/connection.php");
    require_once("models/usuarioModel.php");
   
    session_start();
    $info;
    $pass=@$_POST["clave"];
    $pass1=@$_POST["clave2"];
    $hash = hash("md5",$pass1);
    if(isset($_POST["submit"])){
        if($pass == $pass1 && @$_POST["user"]>1 && @$_POST["email"]>1 && @$_POST["clave"]>1){
            $context = new UsuarioModel();
            $nombreusuario = $_POST["user"];
            $email = $_POST["email"];
            //$clave = $_POST["clave"];
            $result = $context->Insert($nombreusuario,$email,$hash);
            $result = $context->Select(@$_POST["email"],md5(@$_POST["clave"]));
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["tipousuario"] =$result["tipousuario"];
            $_SESSION["usuarioid"] = $result["usuarioid"];
            $info  =  "<script>alert('Bienvenido');</script>";
            if($_SESSION["tipousuario"] == 1){
                header("Location:index.php");
            }else{
                header("Location:index.php");
            }

        }else{
            header('Location:sign-up.php?mensaje=error');
        }
        //header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up: Aprender.com</title>
    <link rel="icon" href="costumer/public/images/icon/codificacion.png">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <!--
    <div class="log-pos position-absolute">
        <h2>Sign up</h2>
        <form action ="" method="POST">
            <div class="pass">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user" required="requiere">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="requiered">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="clave" required="requiered">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    -->

    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
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

</body>
</html>