<?php
include_once ('C:\xampp\htdocs\Project\Controller\avisC.php');

$avisC = new avisC();

$avisC->deleteAvis($_GET["idA"]);
header('Location:table.php');