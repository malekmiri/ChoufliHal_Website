<?php
// include '../controller/userC.php';
include ('C:\xampp\htdocs\Project\Controller\userC.php');

$userc= new userC();
$userc->deleteuser($_GET["id_user"]);
header('location:userDash.php');
