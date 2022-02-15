<?php
   
     if(isset($_GET["miCurso"])){
        $contextCursos = new CursosDeUsuario();
        $usuarioId = $user;
        $miCurso = @$_GET["miCurso"];
         $insertCurso = $contextCursos->Insert($miCurso,$usuarioId);
    }
?>