<?php 
// require_once "../config.php";
require_once('C:\xampp\htdocs\Project\config.php');
$pdo = config::getConnexion();
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $pdo->close();
    exit;
}

$Id_rdv = $_POST['Id_rdv'];
$id_srv = $_POST['id_srv'];
$dateR = $_POST['dateR'];
$dStart = $_POST['dStart'];
$dEnd = $_POST['dEnd'];
$duree = $_POST['duree'];
$mStatus = $_POST['mStatus'];
$rStatus = $_POST['rStatus'];

if(empty($Id_rdv)){
    $sql = "INSERT INTO reservation (Id_rdv, id_srv, dateR, dStart, dEnd, duree, mStatus, rStatus) VALUES (:Id_rdv, :id_srv, :dateR, :dStart, :dEnd, :duree, :mStatus, :rStatus)";
}else{
    $sql = "UPDATE reservation SET id_srv = :id_srv, dateR = :dateR, dStart = :dStart, dEnd = :dEnd, duree = :duree, mStatus = :mStatus, rStatus = :rStatus WHERE Id_rdv = :Id_rdv";
}

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':Id_rdv', $Id_rdv);
$stmt->bindParam(':id_srv', $id_srv);
$stmt->bindParam(':dateR', $dateR);
$stmt->bindParam(':dStart', $dStart);
$stmt->bindParam(':dEnd', $dEnd);
$stmt->bindParam(':duree', $duree);
$stmt->bindParam(':mStatus', $mStatus);
$stmt->bindParam(':rStatus', $rStatus);

$save = $stmt->execute();
if($save){
    echo "<script> alert('Reservation Successfully Saved. You\\'ll be Emailed'); location.replace('./') </script>";
    header('appointments.php');
}else{
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: ".$pdo->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$pdo->close();
?>
