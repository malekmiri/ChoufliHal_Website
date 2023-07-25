<?php

// include '../controller/fonctionC.php';
include ('C:\xampp\htdocs\Project\Controller\fonctionC.php');
$error = "";

$fonction = null;

$fonctionC = new fonctionC();

if (
    isset($_POST["nom_fonction"])) 
{ 
    if (!empty($_POST["nom_fonction"]))
     {
   
      
        $fonction = new fonction(
            null,
            $_POST["nom_fonction"]);
        $fonctionC->addfonction($fonction);
       header('Location:userDash.php');
    } 
    else
      
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <title>User Display</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

    <body>
    <a href="listfonctions.php">Back to list </a>
    <hr>

    <div id="error13">
        <?php echo $error; ?>
    </div>

    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form action="" method="POST" id="myform">
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="nom_fonction" name="nom_fonction" class="form-control form-control-lg"  />
                    <label class="form-label" for="nom_fonction">Name of function</label>
                    <span id= "error">
                    <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>
              </form>