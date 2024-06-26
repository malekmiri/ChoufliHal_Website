<?php
/* * iTech Empires:  Export Data from MySQL to CSV Script * Version: 1.0.0 * Page: Export */

// Database Connection
require("functions.php");

// get paiement

$query = "SELECT * FROM commande";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$event = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $event[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=commandes.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('IdCommande', 'IdUser', 'DateCommande'));

if (count($event) > 0) {
    foreach ($event as $row) {
        fputcsv($output, $row);
    }
}

?>