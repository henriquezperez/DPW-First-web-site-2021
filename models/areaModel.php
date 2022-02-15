<?php
    class AreaModel{
        public function SelectAll(){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM area WHERE estadoId=1");
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
            $query = $pdo->prepare("SELECT * FROM area WHERE areaid=?");
            $query->bindValue(1,$id); 
            $query->execute();
            return $query->fetch();
        }

        public function Delete($id){
            global $pdo;
            $query = $pdo->prepare("DELETE FROM area WHERE areaid=?");
            $query->bindValue(1,$id);             
            return $query->execute();
        }

        public function Insert($nombre,$rutaimagen,$desc){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO area(nombre,imagen,descripcion) VALUES(?,?,?);");
            $query->bindValue(1,$nombre);
            $query->bindValue(2,$rutaimagen);           
            $query->bindValue(3,$desc); 
            return $query->execute();
        }

        public function Update($id, $nombre, $desc, $estado){
            global $pdo;
            $query = $pdo->prepare("UPDATE area SET nombre =?, descripcion=?, estadoId=? WHERE areaid=?");
            $query->bindValue(1,$nombre);
            $query->bindValue(2,$desc);
            $query->bindValue(3,$estado);          ;
            $query->bindValue(4,$id);      
            return $query->execute();
        }
    }