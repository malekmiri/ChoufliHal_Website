<?php
// include_once '../config.php';
include_once ('C:\xampp\htdocs\Project\config.php');
include ('C:\xampp\htdocs\Project\Model\user.php');
// include '../model/user.php';

class userC
{
    public function listusers()
    {
        $sql = "SELECT * FROM  user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($id)
    {
        $sql = "DELETE FROM user WHERE id_user = :id_user";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_user', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function adduser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :fn,:ln, :ph,:em, :pw, 1)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $user->getLastName(),
                'ln' => $user->getFirstName(),
                'ph' => $user->getphone(),
                'em' => $user->getemail_user(),
                'pw' => $user->getpassword_user(),

               
                 
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function addadmin($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :fn,:ln, :ph,:em, :pw, 2)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $user->getLastName(),
                'ln' => $user->getFirstName(),
                'ph' => $user->getphone(),
                'em' => $user->getemail_user(),
                'pw' => $user->getpassword_user(),

               
                 
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateuser($user, $id_user)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    last_name_user = :last_name_user, 
                    first_name_user = :first_name_user, 
                    phone_user = :phone_user, 
                    email_user = :email_user,
                    password_user = :password_user
                WHERE id_user= :id_user'
            );
            $query->execute([
                'id_user' => $id_user,
                'last_name_user' => $user->getLastName(),
                'first_name_user' => $user->getFirstName(),
                'phone_user' => $user->getphone(),
                'email_user' => $user->getemail_user(),
                'password_user' => $user->getpassword_user()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
     function updateuserback($user, $id_user)
    {
        try {
            $db = config::getConnexion();
            $id=$id_user;
            $ls=$user->getLastName();
            $fn=$user->getFirstName();
            $ph=$user->getphone();
            $em=$user->getemail_user();
            $pw=$user->getpassword_user();
            $sql="UPDATE `user` SET `last_name_user`='$ls',`first_name_user`='$fn',`phone_user`='$ph',`email_user`='$em',`password_user`='$pw' WHERE id_user=$id";
            $query = $db->prepare(
               $sql
            );
            $query->execute(
                

            );
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function updateuserrole($role, $id_user)
    {
        try {
            $db = config::getConnexion();
        
            $sql="UPDATE `user` SET `role_user`='$role' WHERE id_user=$id_user";
            $query = $db->prepare(
               $sql
            );
            $query->execute(
                

            );
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showuser($id_user)
    {
        $sql = "SELECT * from user where id_user = $id_user";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
   /* function showfonction($id_user)
    {
        $sql = "SELECT name_role from role_user where id_role = $id_user";
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
*/
function afficherRecherche($rech){
                    
    $sql="SELECT * FROM user where last_name_user like '%$rech%'";
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
			
    $sql="SELECT * FROM user ORDER BY first_name_user";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }	
}
function TrieASC()
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

        function TrienameASC()
        {
            $db=config::getConnexion();
            try {
                $query = $db->query("SELECT * FROM user  ORDER BY first_name_user ASC");
                $liste=$query->fetchALL();
                return $liste;
               
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
                function TrienameDESC()
                {
                    $db=config::getConnexion();
                    try {
                        $query = $db->query("SELECT * from adm ORDER BY first_name_user DESC");
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
				$query = $db->query("SELECT * FROM user WHERE last_name_user LIKE '%$Nom_Prod%' ");
				$query->execute();
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
}?>