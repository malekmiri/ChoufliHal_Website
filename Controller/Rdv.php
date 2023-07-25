<?php
// include '../config.php';
// include '../Model/Rdv.php';
// include '../Model/Srv.php';
// require '../View/vendor/autoload.php';
include ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\Rdv.php');
include('C:\xampp\htdocs\Project\Model\Srv.php');
require ('C:\xampp\htdocs\Project\View\back\vendor\autoload.php');


class RdvR
{
    public function listRdv()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $Rdv = $db->query($sql);
            return $Rdv;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteRdv($id)
    {
        $sql = "DELETE FROM reservation WHERE Id_rdv = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
    
        try {
            $req->execute();
            $count = $req->rowCount();
            echo $count . " records UPDATED successfully <br>";
            if ($count > 0) {
                $sid = "ACcd4ff1c9cfa58bf3526dc66edd6a4e6c"; // Votre identifiant de compte Twilio
                $token = "33645e7909249631e8b885ac82f0e05d"; // Votre jeton d'authentification Twilio
                $client = new Twilio\Rest\Client($sid, $token);
                $message = $client->messages->create(
                    '+21654331435', // Le numéro de téléphone du destinataire (à remplacer par votre numéro de téléphone)
                    [
                        'from' => '+13203177918', // Le numéro de téléphone Twilio utilisé pour envoyer le SMS (à remplacer par votre numéro de téléphone Twilio)
                        'body' => 'Your appointments is deleted successfully !' // Le message SMS à envoyer
                    ]
                );
                echo "SMS envoyé avec succès à " . $message->to . "<br>";
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function addRdv($Rdv)
    {
        $sql = "INSERT INTO reservation (Id_rdv, id_srv, dateR, dStart, dEnd, duree, mStatus, rStatus) VALUES (:Id_rdv, :id_srv, :date, :dStart, :dEnd, :duree, :mStatus, :rStatus)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Id_rdv'=> $Rdv->getId_rdv(),
                'id_srv'=> $Rdv->getIdSrv(),
                'date' => $Rdv->getDateR()->format('Y-m-d H:i:s'),
                'dStart' => $Rdv->getDStart()->format('Y-m-d H:i:s'),
                'dEnd' => $Rdv->getDEnd()->format('Y-m-d H:i:s'),
                'duree' => $Rdv->getDuree(),
                'mStatus' => $Rdv->getMStatus(),
                'rStatus' => $Rdv->getRStatus()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateRdv($Rdv, $Id_rdv)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                    dateR = :dateR,
                    dStart = :dStart,
                    dStart = :dStart,
                    duree = :duree,
                    mStatus = :mStatus,
                    rStatus = :rStatus            
                WHERE Id_rdv= :Id_rdv'
            );
            $query->bindParam(':Id_rdv', $Id_rdv);
            $query->bindParam(':dateR', $Rdv->getDateR()->format('Y-m-d H:i:s'));
            $query->bindParam(':dStart', $Rdv->getDStart()->format('H:i:s'));
            $query->bindParam(':dEnd', $Rdv->getDEnd()->format('H:i:s'));
            $query->bindParam(':duree', $Rdv->getDuree());
            $query->bindParam(':mStatus', $Rdv->getMStatus());
            $query->bindParam(':rStatus', $Rdv->getRStatus());
            $query->execute();
            $count = $query->rowCount();
            echo $count . " records UPDATED successfully <br>";
            if ($count > 0) {
                $sid = "ACcd4ff1c9cfa58bf3526dc66edd6a4e6c"; // Votre identifiant de compte Twilio
                $token = "33645e7909249631e8b885ac82f0e05d"; // Votre jeton d'authentification Twilio
                $client = new Twilio\Rest\Client($sid, $token);
                $messageBody = '';
                switch ($Rdv->getRStatus()) {
                    case 'Confirm':
                        $messageBody = 'Your appointment is confirmed!';
                        break;
                    case 'Cancel':
                        $messageBody = 'Your appointment is cancelled.';
                        break;
                    case 'Report':
                        $messageBody = 'Your appointment is reported.';
                        break;
                }
                $message = $client->messages->create(
                    '+21654331435', // Le numéro de téléphone du destinataire (à remplacer par votre numéro de téléphone)
                    [
                        'from' => '+13203177918', // Le numéro de téléphone Twilio utilisé pour envoyer le SMS (à remplacer par votre numéro de téléphone Twilio)
                        'body' => $messageBody // Le message SMS à envoyer
                    ]
                );
                echo "SMS envoyé avec succès à " . $message->to . "<br>";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }   

function showRdv($Id_rdv)
{
    $sql = "SELECT * FROM reservation WHERE Id_rdv = $Id_rdv";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        // (['id' => $Id_rdv]);
        $Rdv = $query->fetch();
        return $Rdv;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function recupererRdv($Id_rdv)
{
    $sql="SELECT * from reservation where Id_rdv=$Id_rdv";
    $db=config::getConnexion();
    try
    {
        $query=$db->prepare($sql);
        $query->execute();

        $rendez=$query->fetch();
        return $rendez;
    }
    catch (Exception $e)
    {
        die('Erreur: '.$e->getMessage());
    }
}


        
function afficherDateRecente()
{
    $db = config::getConnexion();
    try {
        $query = $db->query("SELECT r.*, s.type AS nom_service FROM reservation r JOIN services s ON r.id_srv = s.id_srv ORDER BY `r`.`dateR`
        ");
        $reservations = $query->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function affichertriDureeAsc()
{
    $db = config::getConnexion();
    try {
        $query = $db->query("SELECT r.*, s.type as type FROM reservation r JOIN services s ON r.id_srv = s.id_srv ORDER BY `r`.`duree`ASC
        ");
        $Rdv = $query->fetchAll();
        return $Rdv;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

        function countEvent(){

            $sql="SELECT count(Id_rdv) FROM reservation " ;
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

class SrvS
{

    public function listSrv()
    {
        $sql = "SELECT * FROM services";
        $db = config::getConnexion();
        try {
            $Srv = $db->query($sql);
            return $Srv;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

static function addSrv($Srv)
    {
        $sql="INSERT INTO services (id_srv, type, mode, freq, couts, description) VALUES (NULL, :type, :mode, :freq, :couts, :description)";

         $db=config::getConnexion();

         //appel a la BD
        try{
           var_dump($db);
           $query = $db->prepare($sql);
           $query->execute([
            // "idRdv" =>$Srv->getidRdv(),
               "type"=>$Srv->gettype(),
               "mode"=>$Srv->getmode(),
               "freq"=>$Srv->getfreq(),
               "couts" =>$Srv->getcouts(),
               "description" =>$Srv->getdescription(),
            //    "image" =>$dish->getimage(),
            //    "Likes" =>"0"
            ]);
            

        }catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
 
    function updateSrv($Srv, $id_srv)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE services SET 
                    type = :type, 
                    mode = :mode, 
                    freq=:freq,
                    couts=:couts,
                    description=:description
                         
                WHERE id_srv= :id_srv'
            );
            $query->execute([
                "id_srv"=> $id_srv,
                "type"=>$Srv->gettype(),
                "mode"=>$Srv->getmode(),
                "freq" =>$Srv->getfreq(),
                "couts" =>$Srv->getcouts(),
                "description" =>$Srv->getdescription(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showSrv($id_srv)
    {
        $sql = "SELECT * from services where id_srv= $id_srv";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Srv = $query->fetch();
            return $Srv;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteSrv($id_srv)
    {
        $sql = "DELETE FROM services WHERE id_srv = :id_srv";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_srv', $id_srv);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
            }
            
            
        }

function recupererSrv($id_srv)
{
    $sql="SELECT * from services where id_srv=$id_srv";
    $db=config::getConnexion();
    try
    {
        $query=$db->prepare($sql);
        $query->execute();

        $serv=$query->fetch();
        return $serv;
    }
    catch (Exception $e)
    {
        die('Erreur: '.$e->getMessage());
    }
}
        
    } 