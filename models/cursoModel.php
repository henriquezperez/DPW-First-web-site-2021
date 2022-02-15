
<?php
    class CursoModel{
        public function SelectAll(){
            global $pdo;
            $query = $pdo->prepare("SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, i.nombrecompleto as instructor
            FROM cursos as c, area as a, instructor as i
            WHERE c.estadoId=1
            AND c.areaid = a.areaid 
            AND c.instructorid = i.instructorid
            AND c.costo = c.costo
            AND c.descripcion = c.descripcion
            AND c.imagen = c.imagen");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function SelectById($id){
            global $pdo;
            $query = $pdo->prepare("SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.areaid, c.imagen, a.nombre as area, i.nombrecompleto as instructor, i.instructorid as instructorid
            FROM cursos as c, area as a, instructor as i
            WHERE c.estadoId=1
            AND c.areaid = ?
            AND c.areaid = a.areaid 
            AND c.instructorid = i.instructorid
            AND c.costo = c.costo
            AND c.descripcion = c.descripcion
            AND c.imagen = c.imagen");
            $query->bindValue(1,$id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function SelectAllWith(){
            global $pdo;
            $query = $pdo->prepare("SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, e.Nombre AS Estado , i.nombrecompleto as instructor
            FROM cursos as c, area as a, instructor AS i, estado AS e
            WHERE  c.areaid = a.areaid 
            AND c.instructorid = i.instructorid
            AND c.costo = c.costo
            AND c.descripcion = c.descripcion
            AND c.estadoId = e.estadoId
            AND c.imagen = c.imagen");
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

        public function Insert($nombre,$areaid,$intructorid,$precio,$des,$imagen){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO cursos(nombre,areaid,instructorid,costo,descripcion,imagen) VALUES(?,?,?,?,?,?)");
            $query->bindValue(1,$nombre);            
            $query->bindValue(2,$areaid); 
            $query->bindValue(3,$intructorid);
            $query->bindValue(4,$precio);
            $query->bindValue(5,$des);
            $query->bindValue(6,$imagen);  
            return $query->execute();
        }

        public function Update($nombre,$estadoid, $areaid, $instructorid,$precio,$cursoid){
            global $pdo;
            $query = $pdo->prepare("UPDATE cursos SET nombre=?, estadoId=?, areaid=?, instructorid=?, costo=? WHERE cursoid=?");
            $query->bindValue(1,$nombre);
            $query->bindValue(2,$estadoid);          
            $query->bindValue(3,$areaid);            
            $query->bindValue(4,$instructorid);
            $query->bindValue(5,$precio);
            $query->bindValue(6,$cursoid); 
            return $query->execute();
        }

        public function SelectByIdBuy($id){
            global $pdo;
            $query = $pdo->prepare("SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, c.areaid as area, i.nombrecompleto as instructor, c.instructorid as instructorid
            FROM cursos as c, area as a, instructor as i
            WHERE c.estadoId=1
            AND c.cursoid = ?
            AND c.areaid = c.areaid
            AND c.areaid = a.areaid 
            AND c.instructorid = i.instructorid
            AND c.costo = c.costo
            AND c.descripcion = c.descripcion
            AND c.imagen = c.imagen");
            $query->bindValue(1,$id);
            //$query->bindValue(2,$areaid);
            $query->execute();
            return $query->fetchAll();
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