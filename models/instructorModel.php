
<?php
    class InstructorModel{
        public function SelectAll(){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM instructor");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function SelectAllWith(){
            global $pdo;
            $query = $pdo->prepare("SELECT i.instructorid AS ID, i.nombrecompleto AS Instructor, i.especialidad AS Especialidad, i.foto AS Foto,
            e.Nombre AS Estado
            FROM instructor AS i, estado AS e
            WHERE i.estadoId = e.estadoId");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Select($id){
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM instructor WHERE instructorid=?");
            $query->bindValue(1,$id); 
            $query->execute();
            return $query->fetch();
        }
        
        public function SelectById($id){
            global $pdo;
            $query = $pdo->prepare(" SELECT c.cursoid, c.nombre, i.foto, i.especialidad, i.nombrecompleto as instructor, i.instructorid as instructorid
            FROM instructor AS i , cursos AS c
            WHERE i.instructorid = ?
            AND c.instructorid = i.instructorid
	        AND c.estadoId=1");
            $query->bindValue(1,$id); 
            $query->execute();
            return $query->fetchAll();
        }

        public function Delete($id){
            global $pdo;
            $query = $pdo->prepare("DELETE FROM instructor WHERE instructorid=?");
            $query->bindValue(1,$id);             
            return $query->execute();
        }

        public function Insert($nombrecompleto,$especialidad, $hash){
            global $pdo;
            $query = $pdo->prepare("INSERT INTO instructor(nombrecompleto,especialidad,foto) VALUES(?,?,?)");
            $query->bindValue(1,$nombrecompleto);            
            $query->bindValue(2,$especialidad);
            $query->bindValue(3,$hash);
            return $query->execute();
        }

        public function Update($nombrecompleto, $especialidad, $estado, $instructorid){
            global $pdo;
            $query = $pdo->prepare("UPDATE instructor SET nombrecompleto =?, especialidad=?, estadoId=? WHERE instructorid=?");
            $query->bindValue(1,$nombrecompleto);
            $query->bindValue(2,$especialidad);
            $query->bindValue(3,$estado);          
            $query->bindValue(4,$instructorid);            
            return $query->execute();
        }
    }