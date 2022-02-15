<?php
      class UsuarioModel{
        public function SelectAll(){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM usuario");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Select($email, $clave){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM usuario WHERE email=? AND clave=? AND estado=1");
            $query->bindValue(1,$email); 
            $query->bindValue(2,$clave);
            $query->execute();
            return $query->fetch();
        }

        public function SelectAllWith(){
            global $pdo;
            $query = $pdo->prepare("SELECT w.usuarioid AS ID, w.nombreusuario AS Usuario, w.email AS Email, y.Nombre AS Estado, t.nombre AS Rol
            FROM usuario AS w, estado AS y, tipousuario AS t 
            WHERE w.estado = y.estadoId
            AND w.tipousuario = t.tipoUsuarioId");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function SelectByRol($Rol){
            global $pdo;
            $query = $pdo->prepare("SELECT w.usuarioid AS ID, w.nombreusuario AS Usuario, w.email AS Email, y.Nombre AS Estado, t.nombre AS Rol
            FROM usuario AS w, estado AS y, tipousuario AS t 
            WHERE w.estado = y.estadoId
            AND t.tipoUsuarioId = ?
            AND w.tipousuario = t.tipoUsuarioId");
            $query->bindValue(1,$Rol); 
            $query->execute();
            return $query->fetchAll();
        }

        public function Delete($id){
            global $pdo;
            $query = $pdo->prepare("DELETE FROM usuario WHERE usuarioid=?");
            $query->bindValue(1,$id);             
            return $query->execute();
        }

        public function Insert($nombreusuario, $email, $clave){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO usuario(nombreusuario,email,clave) VALUES(?,?,?)");
            $query->bindValue(1,$nombreusuario);            
            $query->bindValue(2,$email);
            $query->bindValue(3,$clave);
            return $query->execute();
        }
        public function InsertAdmin($nombreusuario, $email, $clave){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO usuario(nombreusuario,email,clave,tipousuario) VALUES(?,?,?,1)");
            $query->bindValue(1,$nombreusuario);            
            $query->bindValue(2,$email);
            $query->bindValue(3,$clave);
            return $query->execute();
        }

        public function Update($usuarioid,$nombreusuario, $email, $clave){
            global $pdo;
            $query = $pdo->prepare("UPDATE usuario SET nombreusuario =?, email=?, clave=? WHERE usuarioid=?");
            $query->bindValue(1,$nombreusuario);            
            $query->bindValue(2,$email); 
            $query->bindValue(3,$clave);
            $query->bindValue(4,$usuarioid);
            return $query->execute();
        }
    }