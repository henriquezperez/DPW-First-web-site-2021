<?php
    class CursosDeUsuario{
        public function SelectAll(){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM cursosdeusuario");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function SelectAllWith(){
            global $pdo;
            $query = $pdo->prepare("SELECT c.areaid AS ID, c.nombre AS Nombre, c.imagen AS Imagen, c.descripcion AS Descripcion, e.Nombre AS Estado
            FROM area AS c, estado AS e
            WHERE c.estadoId = e.estadoId");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Select($id){
            global $pdo;
            $query = $pdo->prepare(" SELECT c.compraId, c.cursoId, c.usuarioId, b.nombre, b.imagen, b.costo
            FROM cursosdeusuario AS c, cursos AS b, usuario AS u
            WHERE c.usuarioId = ?
            AND b.estadoid = 1
            AND c.cursoId = b.cursoid
            AND c.usuarioId = u.usuarioid");
            $query->bindValue(1,$id); 
            $query->execute();
            return $query->fetchAll();
        }

        public function Delete($id){
            global $pdo;
            $query = $pdo->prepare("DELETE FROM cursosdeusuario WHERE usuarioId=?");
            $query->bindValue(1,$id);             
            return $query->execute();
        }

        public function Insert($cursoId,$usuarioId){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO cursosdeusuario(cursoId,usuarioId) VALUES(?,?)");
            $query->bindValue(1,$cursoId);           
            $query->bindValue(2,$usuarioId); 
            return $query->execute();
        }
    }