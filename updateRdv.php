<?php
// include '../Controller/Rdv.php';
include ('C:\xampp\htdocs\Project\Controller\Rdv.php');
$RdvR = new RdvR();
// $ListRdv=$RdvR->listRdv();
$error = "";
// create Rdv
$Rdv = null;
// create an instance of the controller
$RdvR = new RdvR();

if (isset($_POST['submit'])) {
    if (
        isset($_POST['dateR']) &&
        isset($_POST['dStart']) &&
        isset($_POST['dEnd']) &&
        isset($_POST['duree']) &&
        isset($_POST['mStatus']) &&
        isset($_POST['rStatus']) 
        )
        {
    if (
        !empty($_POST['dateR']) &&
        !empty($_POST['dStart']) &&
        !empty($_POST['dEnd']) &&
        !empty($_POST['duree']) &&
        !empty($_POST['mStatus']) &&
        !empty($_POST['rStatus'])
    ) {
        $Rdv = new Rdv(
            null,
            null,
            new DateTime($_POST['dateR']),
            new DateTime($_POST['dStart']),
            new DateTime($_POST['dEnd']),
            $_POST['duree'],
            $_POST['mStatus'],
            $_POST['rStatus']
        );
        $RdvR->updateRdv($Rdv,$_POST['Id_rdv']);
        header('Location:ListRdv.php');
    } else {
        $error = "Missing information";
    }
}
} 



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLEAU</title>
</head>

<body>

    <button><a href="ListRdv.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <div class="container">
            <?php
                            if (isset($_POST['Id_rdv'])){
                                $Rdv = $RdvR->recupererRdv($_POST['Id_rdv']);
                            }
                            ?>
        <form action="" method="POST":>
           
            <div>
            <label for="id_srv">Service:</label><br>
            <input type="int" id="id_srv" name="id_srv" placeholder="service" value="<?php echo ($Rdv['id_srv']); ?>"><br><br>
            </div>

            <div>
            <label for="dateR">Appointment date:</label><br>
            <input type="date" id="dateR" name="dateR" placeholder="dateR" value="<?php echo ($Rdv['dateR']); ?>"><br><br>
            </div>
 
            <div>
            <label for="dStart">Appointment starts:</label><br>
            <input type="date" id="dStart" name="dStart" placeholder="dStart" value="<?php echo ($Rdv['dStart']); ?>"><br><br>
            </div>

            <div>
            <label for="dEnd">Appointment ends:</label><br>
            <input type="date" id="dEnd" name="dEnd" placeholder="dEnd" value="<?php echo ($Rdv['dEnd']); ?>"><br><br>
            </div>

            <div>
            <label for="duree">Appointment duration:</label><br>
            <input type="number" id="duree" name="duree" placeholder="duree" value="<?php echo $Rdv['duree']; ?>"> minutes<br><br>
            </div>

            <div>
            <label for="mStatus">Mental status:</label><br>
            <select id="mStatus" name="mStatus">
                <option value="">--Choose mental status--</option>
                <option value="Emergency" <?php echo $Rdv['mStatus'] === 'Emergency' ? 'selected' : ''; ?>>Emergency</option>
                <option value="Normal" <?php echo $Rdv['mStatus'] === 'Normal' ? 'selected' : ''; ?>>Normal</option>
            </select><br><br>
            </div>

            <div>
            <label for="rStatus">Appointment status:</label><br>
<select id="rStatus" name="rStatus">
<option value="">--Choose appointment status--</option>
<option value="Confirm" <?php echo isset($Rdv) && $Rdv['rStatus'] === 'Confirm' ? 'selected' : '' ?>>Confirm</option>
<option value="Cancel" <?php echo isset($Rdv) && $Rdv['rStatus'] === 'Cancel' ? 'selected' : '' ?>>Cancel</option>
<option value="Report" <?php echo isset($Rdv) && $Rdv['rStatus'] === 'Report' ? 'selected' : '' ?>>Report</option>
</select><br><br>
</div>
</div>

    <input type="submit" value="Update Appointment" name="submit" class="link-btn"><br><br>
    <input type="reset" value="Reset">
</form>
</div>

<!-- <script src="../View/js/Check.js"></script> -->
</body>
</html>