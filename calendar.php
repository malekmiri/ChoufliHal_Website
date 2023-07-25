<?php 
// include "../config.php";
include('C:\xampp\htdocs\Project\config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap1.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container"></div>
    </nav>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                               
                                <div class="form-group mb-2">
                                    <label for="Id_rdv" class="control-label">ID</label>
                                    <input type="int" class="form-control form-control-sm rounded-0" name="Id_rdv" id="Id_rdv" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="id_srv" class="control-label">IDS</label>
                                    <input type="int" class="form-control form-control-sm rounded-0" name="id_srv" id="id_srv" required>
                                </div>
                                
                                <div class="form-group mb-2">
                                    <label for="dateR" class="control-label">Reservation Date</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="dateR" id="dateR" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="dStart" class="control-label">Start</label>
                                    <input type="time" class="form-control form-control-sm rounded-0" name="dStart" id="dStart" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="dEnd" class="control-label">End</label>
                                    <input type="time" class="form-control form-control-sm rounded-0" name="dEnd" id="dEnd" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="duree" class="control-label">Duration</label>
                                    <input type="int" class="form-control form-control-sm rounded-0" name="duree" id="duree" required>
    </div>

                                <div class="form-group mb-2">

                                <tr>
      <td>
        <label for="mStatus">Choose your mental health state:</label>
      </td>
      <td> 
        <select id="mStatus" name="mStatus" >
          <option value="">--Choose your mental health state--</option>
          <option value="Emergency">Emergency</option>
          <option value="Normal">Normal</option>
        </select><br><br>
        <!-- <span id="etat-error"></span> -->
      </td>
    </tr>
    </div>

    <div class="form-group mb-2">
    <tr>
      <td>
        <label for="rStatus">Appointment status:</label>
      </td>
      <td> 
        <select id="rStatus" name="rStatus" >
          <option value="">--Choose your appointment status--</option>
          <option value="Confirm">Confirm</option>
          <option value="Cancel">Cancel</option>
          <option value="Report">Report</option>
        </select><br><br>
        <!-- <span id="statut-error"></span> -->
      </td>
    </tr>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Id</dt>
                            <dd id="id_srv" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Reservation Date</dt>
                            <dd id="dateR" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="dStart" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="dEnd" class=""></dd>
                            <dt class="text-muted">duration</dt>
                            <dd id="duree" class=""></dd>                 
                            <dt class="text-muted">mental Status</dt>
                            <dd id="mStatus" class=""></dd>
                            <dt class="text-muted">reservation Status</dt>
                            <dd id="rStatus" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php
$schedules = []; // Initialiser le tableau pour contenir les résultats de la requête
$db = config::getConnexion(); // Connexion à la base de données

try {
    $query = $db->query("SELECT * FROM reservation"); // Requête SQL pour récupérer les données de la table "reservation"
    while ($row = $query->fetch()) {
        $sched_res = array(
            "id" => $row['Id_rdv'],
            "start_datetime" => $row['dateR'] . ' ' . $row['dStart'], // Fusionner les valeurs de dateR et dStart pour obtenir la date de début
            "end_datetime" => $row['dateR'] . ' ' . $row['dEnd'], // Fusionner les valeurs de dateR et dEnd pour obtenir la date de fin
        );
        $sched_res['dStarts'] = date("F d, Y h:i A", strtotime($sched_res['start_datetime'])); // Formater la date de début
        $sched_res['edate'] = date("F d, Y h:i A", strtotime($sched_res['end_datetime'])); // Formater la date de fin
        $schedules[$row['Id_rdv']] = $sched_res; // Ajouter les résultats à notre tableau
    }
} catch (PDOException $e) {
    echo "Une erreur s'est produite : " . $e->getMessage(); // Afficher l'erreur s'il y en a une
}

// if(isset($db)) $db = null; // Fermer la connexion à la base de données si elle est définie

?>

</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>
