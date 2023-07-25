<?php

include_once  ('C:\xampp\htdocs\Project\Controller\produitC.php');
$produitC = new produitC();

$produitC->supprimerproduit($_GET["id"]);
header('Location:table.php');