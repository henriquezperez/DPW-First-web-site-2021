<?php 
    session_start();
    require_once("models/connection.php");
    require_once("models/usuarioModel.php");
    $context = new UsuarioModel();
    $result = $context->Select(@$_POST["email"],md5(@$_POST["clave"]));
    @$_SESSION["usuarioid"] = $result["usuarioid"];
    $info;
    if(isset($_POST["submit"])){
        if($result > 0){
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["tipousuario"] = $result["tipousuario"];
            $_SESSION["Rol"] = $_SESSION["tipousuario"];
            
            $info  =  "<script>alert('Bienvenido');</script>";
            if($_SESSION["tipousuario"] == 1){
                header("Location:index.php");
            }else{
                header("Location:index.php");
            }
        }
        else{
            header("Location:login.php?mensaje=error");
        }
    }
?>