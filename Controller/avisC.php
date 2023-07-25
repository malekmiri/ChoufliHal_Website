<?php
include_once  ('C:\xampp\htdocs\Project\config.php');
include_once  ('C:\xampp\htdocs\Project\Model\avis.php');
class avisC {
    public function listreview()
    {
        $sql = "SELECT * FROM avis";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addAvis($avis)
    {
        $sql = "INSERT INTO (idA, rating, name, location, title, review, id) avis VALUES (null, :rating, :name, :location, :title, :review,:id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
                'rating' => $avis->getRating(),
                'name' => $avis->getName(),
                'location' => $avis->getLocation(),
                'title' => $avis->getTitle(),
                'review' => $avis->getReview(),
                'id' => $avis->getid()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteAvis($idAv)
    {
        $sql = "DELETE FROM avis WHERE idA = :idAv";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idAv', $idAv);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updateAvis($avis, $idA)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE avis SET 
                    rating = :rating, 
                    name = :name, 
                    location = :location, 
                    title = :title,
                    review = :review
                WHERE idA= :idA'
            );
            $query->execute([
                'idA' => $idA,
                'rating' => $avis->getRating(),
                'name' => $avis->getName(),
                'location' => $avis->getLocation(),
                'title' => $avis->getTitle(),
                'review' => $avis->getReview()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showAvis($idA)
    {
        $sql = "SELECT * from avis where idA = :idA";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idA' => $idA]);

            $avis = $query->fetch();
            return $avis;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
$test = false;
$keys = array_keys($_POST);
//var_dump($_POST);
for ($i = 0; $i < count($keys); $i++) {
    if ($_POST[$keys[$i]] === '') {
        $test = true;
        break;
    }
}
 ?>