<?php
// include '../Controller/ReponsesC.php';
include ('C:\xampp\htdocs\Project\Controller\ReponsesC.php');
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["idReponse"]);
header('Location:indexRec.php');
?>