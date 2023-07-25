<?php
//include '../config.php';
//include '../Model/LivraisonM.php';
include_once ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\LivraisonM.php');

class LivraisonC
{
    public function listLivraison()
    {
        $sql = "SELECT * FROM livraison";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteLivraison($id)
    {
        $sql = "DELETE FROM livraison WHERE IdCommande = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addLivraison($livraisonM)
    {
        $sql = "INSERT INTO livraison (IdCommande,IdLivreur, Destinataire, DateLivraison,Adresse)
        VALUES (:idC, :idL,:ds,:dl,:ad)";
        $db = config::getConnexion();
        try {
            print_r($livraisonM->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'idC' => $livraisonM->getIdCommande(),
                'idL' => $livraisonM->getIdLivreur(),
                'ds' => $livraisonM->getDestinataire(),
                'dl' => $livraisonM->getDob()->format('Y/m/d'),
                'ad' => $livraisonM->getAdresse(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateLivraison($livraisonM, $id)
    {
        
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Livraison SET 
                    IdLivreur= :IdLivreur, 
                    Destinataire = :Destinataire, 
                    DateLivraison = :DateLivraison,
                    Adresse= :Adresse
                WHERE IdCommande= :IdCommande'
            );
           
            $query->execute([
                'IdCommande' => $id,
                'IdLivreur' => $livraisonM->getIdLivreur(),
                'Destinataire' => $livraisonM->getDestinataire(),
                'DateLivraison' => $livraisonM->getDob()->format('Y/m/d'),
                'Adresse' => $livraisonM->getAdresse()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }

    function showLivraison($id)
    {
        $sql = "SELECT * from livraison where IdCommande = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $livraisonM = $query->fetch();
            return $livraisonM;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
