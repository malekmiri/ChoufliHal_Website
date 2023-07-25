<?php

// include_once '../../Model/Evennement.php';
include_once ('C:\xampp\htdocs\Project\Model\Evennement.php');
include ('C:\xampp\htdocs\Project\Model\Organisateur.php');
include('C:\xampp\htdocs\Project\config.php');
// include_once '../../Model/Organisateur.php';
// include_once '../../config.php';
class EventC
{
    function TrieEventASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM event ORDER BY id_event ASC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		//trie decroissant selon prix 

		function TrieEventDESC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM event ORDER BY id_event DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
        }
        function Rechercher($Nom_Prod)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM event WHERE nom_event LIKE '%$Nom_Prod%' ");
				$query->execute();
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		
	
	function afficherRechercheEvennement($rech){
                    
        $sql="SELECT * FROM event where nom_event like '%$rech%'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    	
	function geteventbyID($id_event)
        {
            $requete = "select * from event where id_event=:id_event";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id_event'=>$id_event
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }	
	
    function afficherevent()
    {
        $sql = "SELECT * FROM event";
        $db = config::getConnexion();
        try {
			$liste = $db->query($sql);
			return $liste;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function supprimerevent($id_event)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM event WHERE id_event =:id_event
                ');
                $querry->execute([
                    ':id_event'=>$id_event
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    function ajouterevent($event)
	{
		$sql = "INSERT INTO event (id_event, nom_event,date_event,type_event) 
			VALUES ( :id_event,  :nom_event, :date_event, :type_event)";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute([
                'id_event' => $event->getid_event(),
				'nom_event' => $event->getnom_event(),
				'date_event' => $event->getdate_event(),
				'type_event' => $event->gettype_event()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
    



 function modifierevent($event, $id_event)
 {
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE event SET 
                    nom_event=:nom_event, 
                    date_event=:date_event, 
                    type_event=:type_event
                    
                WHERE id_event= :id_event '
        );
        $query->execute([
            'id_event' => $event->getid_event(),
				'nom_event' => $event->getnom_event(),
				'date_event' => $event->getdate_event(),
				'type_event' => $event->getType_event()
            
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    
    }


 }

 function interested()
	{
		$sql = "INSERT INTO event (interested) 
			VALUES ('1')";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute();
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
}

function countEvent(){

    $sql="SELECT count(id_event) FROM event " ;
    $db = config::getConnexion();
    {
        $query = $db->query($sql);
        $query->execute();
           $prog_number =$query->fetchColumn();
        return $prog_number;
    }
    
}


    
?>