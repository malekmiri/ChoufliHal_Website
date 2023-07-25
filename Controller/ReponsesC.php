*
      <?php 
// include_once '../config.php';
// include '../Model/Reponses.php';
include_once ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\Reponses.php');
     class reponseC{
		function addReponse($reponse)
        {
            $sql = "INSERT INTO reponses (`idReponse`,`idReclamation`, `descriptionR`)
            VALUES (NULL, :idReclamation,:descriptionR)";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'idReclamation' => $reponse->getIdReclamation(),
                    'descriptionR' => $reponse->getDescriptionR()
                    
                ]);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
                }
            }
    function afficherReponse()
	{
		$sql = "SELECT * FROM reponses join reclamations ON reponses.idReclamation=reclamations.idReclamation";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
    function deleteReponse($id)
    {
        $sql = "DELETE FROM reponses WHERE idReponse = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function updateReponse($reponse, $idReponse)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponses SET
                    idReclamation= :idReclamation, 
                    descriptionR = :descriptionR
                WHERE idReponse= :idReponse'
            );
            $query->execute([
                'idReponse' => $idReponse,
                'idReclamation' => $reponse->getIdReclamation(),
                'descriptionR' => $reponse->getDescriptionR()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupereReponse($idReponse)
	{
		$sql="SELECT * from  reponses where idReponse LIKE '%$idReponse%'";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
	}
    function rechercheRepRec($key)
    {
       $sql = "SELECT * FROM reponses WHERE idReclamation LIKE '%$key%'";
       $db = config::getConnexion() ;
       try {
       $liste = $db->query($sql);
       return $liste;
     } catch (Exception $e) {
       die('Erreur: ' . $e->getMessage());
     }
   }

     //trie croissant selon prix
		function TrieNom()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM reponses INNER JOIN reclamations ON reclamations.idReclamation=reponses.idReclamation ORDER BY reclamations.idReclamation ");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		//trie decroissant selon prix 

		function TrieDate()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM reponses INNER JOIN reclamations ON reclamations.idReclamation=reponses.idReclamation ORDER BY dateReponse");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

    }
  ?>