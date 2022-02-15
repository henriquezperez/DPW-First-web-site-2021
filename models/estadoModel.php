
<?php
    class EstadoModel{
        public function SelectAll(){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM estado");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function SelectById($id){
            global $pdo;
            $query = $pdo->prepare("");
            $query->bindValue(1,$id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Select($id){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM cursos WHERE cursoid=?");
            $query->bindValue(1,$id); 
            $query->execute();
            return $query->fetch();
        }

        public function Delete($id){
            global $pdo;
            $query = $pdo->prepare("DELETE FROM cursos WHERE cursoid=?");
            $query->bindValue(1,$id);             
            return $query->execute();
        }

        public function Insert($nombre,$areaid,$intructorid){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO cursos(nombre,areaid,instructorid) VALUES(?,?,?);");
            $query->bindValue(1,$nombre);            
            $query->bindValue(2,$areaid); 
            $query->bindValue(3,$intructorid); 
            return $query->execute();
        }

        public function Update($cursoid, $nombre, $areaid, $instructorid){
            global $pdo;
            $query = $pdo->prepare("UPDATE cursos SET nombre =?, areaid=?, instructorid=? WHERE cursoid=?");
            $query->bindValue(1,$nombre);            
            $query->bindValue(2,$areaid);            
            $query->bindValue(3,$instructorid); 
            $query->bindValue(4,$cursoid); 
            return $query->execute();
        }
    }

    /* Registro de usuarios
    Login de usuarios   
    Cursos(costo, descripcion)
    Vista usuario
        - Areas
            Al dar clic al area, mostrar los cursos de esa area
        - Instructor
        Al dar clic al area, mostrar los cursos del instructor
        - Todos los curso */
?>