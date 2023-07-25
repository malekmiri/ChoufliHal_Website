<?php 
include "../config.php";
$pdo = config::getConnexion();

if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $pdo->close();
    exit;
}

$delete = $pdo->query("DELETE FROM reservation WHERE Id_rdv = :id");
if($delete){
    echo "<script> alert('Event has deleted successfully.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$pdo->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$pdo->close();

?>