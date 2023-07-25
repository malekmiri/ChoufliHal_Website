<?php

include_once ('C:\xampp\htdocs\Project\Controller\avisC.php');

$error = "";

// create avis
$avis = null;

// create an instance of the controller
$avisC = new avisC();
if (
    isset($_POST["idA"]) &&
    isset($_POST["rating"]) &&
    isset($_POST["name"]) &&
    isset($_POST["location"]) &&
    isset($_POST["title"]) &&
    isset($_POST["review"])
) {
    if (
        !empty($_POST["idA"]) &&
        !empty($_POST["rating"]) &&
        !empty($_POST['name']) &&
        !empty($_POST["location"]) &&
        !empty($_POST["title"]) &&
        !empty($_POST["review"])
    ) {
        $avis = new avis(
            $_POST['idA'],
            $_POST['rating'],
            $_POST['name'],
            $_POST['location'],
            $_POST['title'],
            $_POST['review']
        );
        $avisC->updateAvis($avis, $_POST["idA"]);
        header('Location:table.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="table.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idA'])) {
        $avis = $avisC->showAvis($_POST['idA']);
    ?>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="idA">Id Avis:</label>
                </td>
                <td>
                    <input type="text" name="idA" id="idA" value="<?php echo $avis['idA']; ?>" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rating">Rating:</label>
                </td>
                <td>
                    <input type="number" name="rating" id="rating" value="<?php echo $avis['rating']; ?>" maxlength="2">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Name:</label>
                </td>
                <td>
                    <input type="text" name="name" id="name" value="<?php echo $avis['name']; ?>" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="location">Location:</label>
                </td>
                <td>
                    <input type="text" name="location" value="<?php echo $avis['location']; ?>" id="location">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="title">Title:</label>
                </td>
                <td>
                    <input type="text" name="title" id="title" value="<?php echo $avis['title']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="review">Review:</label>
                </td>
                <td>
                    <textarea name="review" id="review" cols="30" rows="10"><?php echo $avis['review']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Update">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>

    <?php
    }
    ?>
</body>

</html>
