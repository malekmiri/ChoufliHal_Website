<?php
include_once  ('C:\xampp\htdocs\Project\Controller\avisC.php');
$avisC = new AvisC();
$list = $avisC->Listreview();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of reviews</h1>
        <h2>
            <a href="addAvis.php">Add Review</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Avis</th>
            <th>Rating</th>
            <th>Name</th>
            <th>Location</th>
            <th>Title</th>
            <th>Review</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $avis) {
        ?>
            <tr>
                <td><?= $avis['idA']; ?></td>
                <td><?= $avis['rating']; ?></td>
                <td><?= $avis['name']; ?></td>
                <td><?= $avis['location']; ?></td>
                <td><?= $avis['title']; ?></td>
                <td><?= $avis['review']; ?></td>
              
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
