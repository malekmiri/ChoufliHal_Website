<?php
//include '../config.php';
//include '../Model/commandeM.php';
include_once ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\commandeM.php');

class CommandeC
{
    public function listCommande()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE IdCommande = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCommande($commandeM)
    {
        $sql = "INSERT INTO commande (IdCommande,IdUser,DateCommande)
        VALUES (:idC, :idU,:dc)";
        $db = config::getConnexion();
        try {
            print_r($commandeM->getDco()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'idC' => $commandeM->getIdCommande(),
                'idU' => $commandeM->getIdUser(),
                'dc' => $commandeM->getDco()->format('Y/m/d'),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCommande($commandeM, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    IdUser= :IdUser, 
                    DateCommande = :DateCommande
                WHERE IdCommande= :IdCommande'
            );
            var_dump($query);
            $query->execute([
                'IdCommande' => $id,
                'IdUser' => $commandeM->getIdUser(),
                'DateCommande' => $commandeM->getDco()->format('Y/m/d'),
              
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }

    function showCommande($id)
    {
        $sql = "SELECT * from commande where IdCommande = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commandeM = $query->fetch();
            return $commandeM;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function affichertri()
    {
        $db = config::getConnexion();
        try {
            $query = $db->query("SELECT * FROM commande ORDER BY DateCommande ASC");
            $list = $query->fetchAll();
            return $list;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    //tri et rech
    
    
    function countEvent(){
    
        $sql="SELECT count(IdCommande) FROM commande " ;
        $db = config::getConnexion();
        try{
            $query = $db->query($sql);
            $query->execute();
               $prog_number =$query->fetchColumn();
            return $prog_number;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
  
}
