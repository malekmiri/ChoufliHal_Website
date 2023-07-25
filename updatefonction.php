<?php

// include '../controller/fonctionC.php';
include ('C:\xampp\htdocs\Project\Controller\fonctionC.php');


$error = "";

$fonction = null;

$fonctionC = new fonctionC();

if (
    isset($_POST["nom_fonction"])
    
) { 
    
    if (
        !empty($_POST["nom_fonction"]) )
        {
            
           
        
        $fonctionC->updatefonction($_POST["nom_fonction"], $_POST["id_role"]);
        header('Location:userDash.php');
    } else
    
        $error = "Missing information";
}
?>




<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fonction Display</title>
</head>

<body>
    <button><a href="userDash.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    
    <?php
    if (isset($_GET['id_role'])) {
       $fonction = $fonctionC->showfonction($_GET['id_role']);
        
    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_role">Id function:
                        </label>
                    </td>
                    <td><input type="text" name="id_role" id="id_role" value="<?php echo $_GET['id_role']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_fonction">function name:
                        </label>
                    </td>
                    <td><input type="text" name="nom_fonction" id="nom_fonction" value="<?php echo $fonction; ?>" maxlength="20"></td>
                </tr>
                <tr>
                
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