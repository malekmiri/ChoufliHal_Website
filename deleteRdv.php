<?php
require_once '../Controller/Rdv.php';

if (isset($_GET["id"])) {
    $RdvR = new RdvR();
    $RdvR->deleteRdv($_GET["id"]);
    header('Location: ListRdv.php');
}
?>
