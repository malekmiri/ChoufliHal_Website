<?php
// include_once '../config.php';
include_once ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\fonction.php');
// include '../model/fonction.php';

class fonctionC
{
    public function listfonctions()
    {
        $sql = "SELECT * FROM role_user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletefonction($id)
    {
        $sql = "DELETE FROM role_user WHERE id_role = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addfonction($fonction)
    {
        $sql = "INSERT INTO role_user  
        VALUES (NULL, :fn)";
        $db = config::getConnexion();
        try {
           print_r($fonction);
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $fonction->getnom_fonction()
              
               
                 
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatefonction($fonction, $id)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE role_user SET name_role = :fonction WHERE id_role = :id";
            $query = $db->prepare($sql);
            $query->bindParam(":fonction", $fonction);
            $query->bindParam(":id", $id);
            $query->execute();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    function showfonction($id)
    {
        $sql = "SELECT name_role from role_user where id_role = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user["name_role"];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}