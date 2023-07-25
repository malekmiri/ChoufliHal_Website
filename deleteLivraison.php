<?php
//include '../Controller/Livraison.php';
include ('C:\xampp\htdocs\Project\Controller\Livraison.php');
$LivraisonC = new LivraisonC();
$LivraisonC->deleteLivraison($_GET["IdCommande"]);
header('Location:ListLivraison.php');
