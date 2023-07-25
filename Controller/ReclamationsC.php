<?php 
 /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<p>Form submitted!</p>';
    var_dump($_POST);
} else {
    echo '<p>Form not submitted.</p>';
}*/
// include '../config.php';
include_once ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\Reclamations.php');
     class reclamationC{
		function addReclamation($reclamation)
        {
            $sql = "INSERT INTO reclamations(`idReclamation`, `nom`, `email`/*, `dateReclamation`*/, `objet`, `description`, `status`)
            VALUES (NULL, :nom,:email,/*:dateReclamation,*/:objet,:description,:status)";
            $db = config::getConnexion();
            try {
                //print_r($reclamation->getDate()->format('Y-m-d'));
                $query = $db->prepare($sql);
                $query->execute([
                    'nom' => $reclamation->getNom(),
                    'email' => $reclamation->getEmail(),
                    //'dateReclamation' => $reclamation->getDate(),
                    'objet' => $reclamation->getObjet(),
                    'description' => $reclamation->getDescription(),
                    'status' => $reclamation->getStatus(),
                ]);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
                }
            }
            function afficherReclamation()
            {
                $sql = "SELECT * FROM reclamations";
                $db = config::getConnexion();
                try {
                    $liste = $db->query($sql);
                    return $liste;
                } catch (Exception $e) {
                    die('Erreur:' . $e->getMeesAage());
                }
            }
            function deleteReclamation($id)
            {
                $sql = "DELETE FROM reclamations WHERE idReclamation = :id";
                $db = config::getConnexion();
                $req = $db->prepare($sql);
                $req->bindValue(':id', $id);
        
                try {
                    $req->execute();
                } catch (Exception $e) {
                    die('Error:' . $e->getMessage());
                }
            }
            
            
            public function detail($idReclamation)//k niclicki aa detail nchuf les info d'un adherent(recuperer un enrgst)
            {
                $sql="SELECT *FROM reclamations WHERE idReclamation=idReclamation'";
                $db=config::getConnexion();
                try{
                $query=$db->prepare($sql);
                $query->execute();
                $adherent=$query->fetch();//mech lezm fetchall hachty juste fetch ta3 1 seule adherent
                return $adherent;
                }
                catch(PDOExeception $e)
                {
                $e->getMessage();
                }
            }
            function recupereReclamation($idReclamation)
            {
                $sql="SELECT * from  reclamations where idReclamation LIKE '%$idReclamation%'";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
            }
            function updateReclamation($reclamation, $idReclamation)
            {
                try {
                    $db = config::getConnexion();
                    $query = $db->prepare(
                        'UPDATE reclamations SET 
                            nom = :nom, 
                            email = :email, 
                            objet = :objet, 
                            description = :description, 
                            status = :status
                        WHERE idReclamation= :idReclamation'
                    );
                    $query->execute([
                        'idReclamation' => $idReclamation,
                        'nom' => $reclamation->getNom(),
                        'email' => $reclamation->getEmail(),
                        'objet' => $reclamation->getObjet(),
                        'description' => $reclamation->getDescription(),
                        'status' => $reclamation->getStatus()
                    ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }
        
        function rechercheReclamation($key)
             {
                $sql = "SELECT * FROM reclamations WHERE idReclamation LIKE '%$key%' OR nom LIKE '%$key%' OR email LIKE '%$key%'";
                $db = config::getConnexion() ;
                try {
                $liste = $db->query($sql);
                return $liste;
              } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
              }
            }
            function updateStatus($status, $idReclamation)
            {
                try {
                    $db = config::getConnexion();
                    $query = $db->prepare(
                        "UPDATE reclamations SET 
                            status = :status
                        WHERE idReclamation LIKE :idReclamation"
                    );
                    $query->execute([
                        'status' => $status,
                        'idReclamation' => "%$idReclamation%",
                    ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            function countClaims($status)
            {
                try {
                    $db = config::getConnexion();
                    $query = $db->prepare(
                        "SELECT * FROM reclamations
                        WHERE status LIKE :status"
                    );
                    $query->execute([
                        'status' => $status,
                    ]);
                     
                    $claims=$query->rowCount();
                    return $claims;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        function trierReclamationNom($nom)
          {
            $sql = "SELECT * FROM reclamations order by nom";
            $db = config::getConnexion() ;
            try {
            $liste = $db->query($sql);
            return $liste;
             } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
         } 
         function trierReclamationId($id)
          {
            $sql = "SELECT * FROM reclamations order by idReclamation";
            $db = config::getConnexion() ;
            try {
            $liste = $db->query($sql);
            return $liste;
             } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
         } 
         function trierReclamationDate($date)
          {
            $sql = "SELECT * FROM reclamations order by date";
            $db = config::getConnexion() ;
            try {
            $liste = $db->query($sql);
            return $liste;
             } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
         }
         
             public function getResolutionTime($idReclamation, $idReponse) {
                 $sql = "SELECT TIMESTAMPDIFF(DAY, r.dateReclamation, rp.dateReponse) AS resolution_time
                         FROM reclamations r
                         INNER JOIN reponses rp ON r.idReclamation = rp.idReclamation
                         WHERE r.idReclamation = :idReclamation AND rp.idReponse = :idReponse;";
                 $db = config::getConnexion();
                 try {       
                     $avg = $db->prepare($sql);
                     $avg->bindValue(':idReclamation', $idReclamation, PDO::PARAM_INT);
                     $avg->bindValue(':idReponse', $idReponse, PDO::PARAM_INT);
                     $avg->execute();
                     $row = $avg->fetch(PDO::FETCH_ASSOC);
                     return $row['resolution_time'];
                 } catch (PDOException $e) {
                     // Handle the exception as appropriate for your application
                 }
             }
            public function getAverageResolutionTime() {
                $sql = "SELECT AVG(TIMESTAMPDIFF(SECOND, r.dateReclamation, rp.dateReponse)) AS avg_resolution_time
                        FROM reclamations r
                        INNER JOIN reponse rp ON r.idReclamation = rp.idReclamation
                        WHERE r.status = 'traité' AND rp.dateReponse IS NOT NULL
                        ORDER BY r.dateReclamation DESC
                        LIMIT 10;";
                $db = config::getConnexion();
                try {       
                    $avg = $db->prepare($sql);
                    $avg->execute();
                    $row = $avg->fetch(PDO::FETCH_ASSOC);
                    return $row['avg_resolution_time'];
                } catch (PDOException $e) {
                    // Handle the exception as appropriate for your application
                }
            }
        }
        
        ?>
        