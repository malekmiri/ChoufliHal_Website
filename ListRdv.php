<?php
include '../Controller/Rdv.php';

$RdvR = new RdvR();
$Rdv = $RdvR->ListRdv();
$SrvS = new SrvS();
$Srv = $SrvS->listSrv();

?>
<html>
<head></head>

<body>

    <center>
        <h1>List of Reservations</h1>
        <h2>
            <a href="addRdv.php">Add Reservation</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>IdR</th>
            <th>IdS</th>
            <th>Reservation date</th>
            <th>Reservations duration</th> 
            <th>Mental Health Status</th> 
            <th>Reservation Status</th> 
            <th>Type</th> 
            <th>Mode</th> 
            <th>Frequency</th> 
            <th>Price</th> 
            <th>Description</th> 

            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
foreach ($Rdv as $RdvR) {
    // Récupération des informations du service correspondant
    $id_srv = $RdvR['id_srv'];
    $pdo = config::getConnexion();
    $SrvS = $pdo->query("SELECT * FROM services WHERE id_srv = $id_srv")->fetch();

?>
    <tr>
        <td><?php echo $RdvR['Id_rdv']; ?></td>
        <td><?php echo $RdvR['id_srv']; ?></td>
        <td><?php echo $RdvR['dateR']; ?></td>
        <td><?php echo $RdvR['duree']; ?></td>
        <td><?php echo $RdvR['mStatus']; ?></td>
        <td><?php echo $RdvR['rStatus']; ?></td>
                <td><?php echo $SrvS['type']; ?></td>
                <td><?php echo $SrvS['mode']; ?></td>
                <td><?php echo $SrvS['freq']; ?></td>
                <td><?php echo $SrvS['couts']; ?></td>
                <td><?php echo $SrvS['description']; ?></td>
        <!-- <td> 
            <a href="deleteRdv.php?Id_rdv=<?php /*echo $RdvR['Id_rdv']; */?>"><button class="btn btn-primary">Supprimer</button></a>  
        </td>-->
        <td>    
        <form method="POST" action="updateRdv.php">
            <a type="submit" name="Modifier" ><button class="btn btn-primary">Modifier</button></a>
            <input type="hidden" value=<?php echo $RdvR['Id_rdv']; ?> name="Id_rdv">
            </form>
        </td> 
    </tr>
<?php
}
?>

    </table>
</body>
</html>

