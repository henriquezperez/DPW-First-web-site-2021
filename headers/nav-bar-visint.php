<?php 
    session_start(); 
    $activo;
    $user;
    @$_SESSION["Rol"];
    if(@$_SESSION['email'] > 0){
        $activo = "si";
    }
    else{
      $activo = "no";
    }
    $user = @$_SESSION["usuarioid"];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Aprender</title>
    <link rel="stylesheet" href="public/css/all.min.css">
      <link rel="icon" href="customer/public/images/icon/codificacion.png">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
<link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link href="public/css/dashboard.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    
  </head>
  <body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="https://github.com/miguelhenriquez503"><img src="public/images/Stark_Industries.png" height="30" width="70"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <?php if($activo == "no"){?>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="login.php">Sign in</a>
          </div>
        </div>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
              <a class="nav-link px-3" href="sign-up.php">Sign up</a>
          </div>
        </div>
       <?php } else if($activo=="si"){ ?>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="sign-out.php">Sign out</a>
          </div>
        </div>
       <?php } ?>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item opcion">
            <a class="nav-link active" aria-current="page" href="index.php">
            <i class="fas fa-home"></i>
              Home
            </a>
          </li>
          <li class="nav-item opcion">
            <a class="nav-link" href="customer/catalogo.php">
            <i class="fas fa-shopping-cart"></i>
              Catalogo
            </a>
          </li>
          <?php if($activo == "si" && @$_SESSION["tipousuario"]==2) { ?>
          
          <li class="nav-item opcion">
            <a class="nav-link" href="customer/miscursos.php">
            <i class="fas fa-chalkboard"></i>
              Mis cursos
            </a>
          </li>
          <?php } else if($activo == "si" &&  @$_SESSION["tipousuario"] == 1) { ?>
            <li class="nav-item opcion">
            <a class="nav-link" href="customer/miscursos.php">
            <i class="fas fa-chalkboard"></i>
              Mis cursos (Test)
            </a>
          </li>  
            <li class="nav-item opcion">
                <a class="nav-link" href="admin/areas.php">
                <i class="fas fa-industry"></i>
                  Areas
                </a>
              </li>
              <li class="nav-item opcion">
                <a class="nav-link" href="admin/instructor.php">
                <i class="fas fa-chalkboard-teacher"></i>
                  Instructores
                </a>
              </li>
              <li class="nav-item opcion">
                <a class="nav-link" href="admin/cursos.php">
                <i class="fas fa-chalkboard"></i>
                  Cursos
                </a>
              </li>
              <li class="nav-item opcion">
                <a class="nav-link" href="admin/usuarios.php?id=1">
                <i class="fas fa-user-cog"></i>
                  Usuarios Admin
                </a>
              </li>
              <li class="nav-item opcion">
                <a class="nav-link" href="admin/clientes.php?id=2">
                <i class="fas fa-user-graduate"></i>
                  Usuarios Clientes
                </a>
              </li>  
           <?php } ?>
        </ul>        
      </div>
    </nav>
