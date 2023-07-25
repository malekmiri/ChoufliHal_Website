<?php

include_once '../../Model/Organisateur.php';
include_once '../../config.php';
class organisateurC
{
    function Rechercherorganisateur($Nom_Prod)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM organisateur WHERE num_organisateur  LIKE '%$Nom_Prod%' ");
				$query->execute();
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	function TrieOrganisateurASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM organisateur ORDER BY Id_organisateur ASC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		//trie decroissant selon prix 

		function TrieOrganisateurDESC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM organisateur ORDER BY Id_organisateur DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
        }
    function affichertri(){
			
        $sql="SELECT * FROM organisateur  ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }  	
	function getorganisateurbyID($Id_organisateur)
        {
            $requete = "select * from organisateur where id_organisateur=:id_organisateur";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'Id_organisateur'=>$Id_organisateur
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }	
	
    function afficherOrganisateur()
    {
        $sql = "SELECT * FROM organisateur";
        $db = config::getConnexion();
        try {
			$result = $db->query($sql);
            
			return $result;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function affichernomOrganisateur()
    {
        $sql = "SELECT nom_organisateur FROM organisateur";
        $db = config::getConnexion();
        try {
			$liste = $db->query($sql);
			return $liste;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function supprimerorganisateur($id_organisateur)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM organisateur WHERE id_organisateur =:id_organisateur
                ');
                $querry->execute([
                    'id_organisateur'=>$id_organisateur
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    function ajouterorganisateur($organisateur)
	{
		$sql = "INSERT INTO organisateur (id_organisateur, nom_organisateur,num_organisateur) 
			VALUES (:id_organisateur, :nom_organisateur, :num_organisateur )";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute([
                'id_organisateur' => $organisateur->getid_Organisateur() ,
                'nom_organisateur' => $organisateur->getnom_Organisateur(),
				'num_organisateur' => $organisateur->getnum_Organisateur()
			
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
    



 function modifierorganisateur($organisateur, $Id_organisateur)
 {
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE organisateur SET 
                    nom_organisateur=:nom_organisateur, 
                    num_organisateur=:num_organisateur, 
                   
                    
                WHERE Id_organisateur= :id_organisateur '
        );
        $query->execute([
            
				'nom_organisateur' => $organisateur->getnom_organisateur(),
				'num_organisateur' => $organisateur->getnum_organisateur()
				
            
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    
    }


 }
}
function afficherRechercheOrganisateur($rech){
                    
    $sql="SELECT * FROM organisateur where ID_organisateur like '%$rech%'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }	
}
function affichertri(){
			
    $sql="SELECT * FROM organisateur ORDER BY num_organisateur ";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }	
}
?>
