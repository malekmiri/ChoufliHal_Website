<?php
require_once ('C:\xampp\htdocs\Project\Controller\Rdv.php');

if (isset($_GET["id"])) {
    $SrvS = new SrvS();
    $SrvS->deleteSrv($_GET["id"]);
    header('Location:ListSrv.php');
}
?>