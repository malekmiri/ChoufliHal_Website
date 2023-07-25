<?php
//include '../Controller/Livraison.php';
include ('C:\xampp\htdocs\Project\Controller\Livraison.php');
$LivraisonC = new LivraisonC();
$list = $LivraisonC->listLivraison();


/*if(isset($_POST["type"]))
{
if($_POST["type"] == "tri"){
    $list = $CommandeC->affichertri();
}

}*/
$error = "";

// create livraison
$LivraisonM = null;

// create an instance of the controller
$LivraisonC = new LivraisonC();
if (
    isset($_POST["IdCommande"]) &&
    isset($_POST["IdLivreur"]) &&
    isset($_POST["Destinataire"]) &&
    isset($_POST["DateLivraison"]) &&
    isset($_POST["Adresse"])
) {
    if (
        !empty($_POST["IdCommande"]) &&
        !empty($_POST["IdLivreur"]) &&
        !empty($_POST["Destinataire"]) &&
        !empty($_POST["DateLivraison"]) &&
        !empty($_POST["Adresse"])
    ) {
        $LivraisonM = new LivraisonM(
            $_POST['IdCommande'],
            $_POST['IdLivreur'],
            $_POST['Destinataire'],
            new DateTime($_POST['DateLivraison']),
            $_POST['Adresse']
        );
        $LivraisonC->addLivraison($LivraisonM);
        header('Location:index.php');
    } else
        $error = "Missing information";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CHOUFLIHAL - Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com"> 
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
     <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> 

    <!-- Libraries Stylesheet -->
     <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> 
     <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> 

    <!-- Customized Bootstrap Stylesheet -->
     <link href="css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Template Stylesheet -->
     <link href="css/style.css" rel="stylesheet"> 
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>CHOUFLIHAL</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Syrine Majdoub</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">

                <a href="..\backA\userDash.php" class="nav-item nav-link "><i class="fa-light fa-users"></i>user management</a>

<div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Complaints</a>
    <div class="dropdown-menu bg-transparent border-0">
        <a href="../backRec/ListeReclamation.php" class="dropdown-item">Table Reclamations</a>
        <a href="../backRec/ListeReponse.php" class="dropdown-item">Table Reponses</a>
        
    </div>
</div>
<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Product</a>
    <div class="dropdown-menu bg-transparent border-0">
        <a href="../backP/AjouterProduit.php" class="dropdown-item">ADD Product</a>
        <a href="../backP/table.php" class="dropdown-item">Table Product</a>
        </div>
</div>

<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Events</a>
    <div class="dropdown-menu bg-transparent border-0">
        <a href="../BackE/Events.php" class="dropdown-item">Table Events</a>
        <a href="../BackE/table.php" class="dropdown-item">Table Organisator</a>
        </div>
</div>
<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Cart</a>
    <div class="dropdown-menu bg-transparent border-0">
        <a href="../back/index.php" class="dropdown-item">Table Livraison</a>
        <a href="../back/table.php" class="dropdown-item">Table Commandes</a>
        </div>
</div>
<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Resevation</a>
    <div class="dropdown-menu bg-transparent border-0">
        <a href="../back/ListRdvtable.php" class="dropdown-item">Table Reservations</a>
        <a href="../back/ListSrv.php" class="dropdown-item">Table Services</a>
        </div>
</div>

    </div>
</div>
</div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>

                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <form class="d-none d-md-flex ms-4" method="POST" action="testsortSrv.php">
      <input type="text" Name="search_box" placeholder="Search" class="form-control border-0">
      <button type="submit" Name="search_btn" class="fas fa-search"></button>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css"> -->
   </form>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/userrania.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Rania Gasmi</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- tableau -->
            <table class="table" border="3" align="left" style="width: 960.6px;margin-left: -20;margin-right: 50px;margin-left: -25;"  >
        <tr>
            <th>Id Commande</th>
            <th>Id Livreur</th>
            <th>Nom</th>
            <th>Date du livraison</th>
            <th>Adresse</th>
       
        </tr>
        <?php
        foreach ($list as $Liv) {
        ?>
            <tr>
                <td><?= $Liv['IdCommande']; ?></td>
                <td><?= $Liv['IdLivreur']; ?></td>
                <td><?= $Liv['Destinataire']; ?></td>
                <td><?= $Liv['DateLivraison']; ?></td>
                <td><?= $Liv['Adresse']; ?></td>
                <td align="center">
                    <form method="POST" action="updateBackLiv.php">
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $Liv['IdCommande']; ?> name="IdCommande">
                    </form>
                </td>
                <td>
                    <a class="btn btn-primary" href="DeleteBackLiv.php?IdCommande=<?php echo $Liv['IdCommande']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <h2  style="font-weight: bold; color: skyblue;">Ajouter une livraison</h2>
    <form action="" method="POST" onsubmit="return validateForm()" style= "padding-bottom: 50px">

    <table class="table" border="3" align="center" >
    <tr>
            <td>
                <label for="IdCommande" style="font-weight: bold;">ID Commande:
                </label>
            </td>
            <td><input type="text" name="IdCommande" id="IdCommande" maxlength="20" style="border: 2px solid #ccc;padding: 8px;font-size: 8px;border-radius: 12px;"></td>
        </tr>
        <tr>
            <td>
                <label for="Id Livreur"style="font-weight: bold;">ID Livraison:
                </label>
            </td>
            <td><input type="text" name="IdLivreur" id="IdLivreur" maxlength="20"style="border: 2px solid #ccc;padding: 8px;font-size: 8px;border-radius: 12px;"></td>
        </tr>
        <tr>
            <td>
                <label for="Destinataire"style="font-weight: bold;">Nom Destinataire:
                </label>
            </td>
            <td><input type="text" name="Destinataire" id="Destinataire" maxlength="20"style="border: 2px solid #ccc;padding: 8px;font-size: 8px;border-radius: 12px;"></td>
        </tr>

        <tr>
            <td>
                <label for="DateLivraison"style="font-weight: bold;">Date:
                </label>
            </td>
            <td>
                <input type="date" name="DateLivraison" id="DateLivraison"style="border: 2px solid #ccc;padding: 10px;font-size: 16px;border-radius: 12px;">
            </td>
        </tr>
        <tr>
            <td>
                <label for="Adresse"style="font-weight: bold;">Adresse:
                </label>
            </td>
            <td><input type="text" name="Adresse" id="Adresse" maxlength="20"style="border: 2px solid #ccc;padding: 8px;font-size: 8px;border-radius: 12px;"></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input class="btn btn-primary" type="submit" value="Save">
                <input class="btn btn-primary" type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>

<div id="errorMessages"></div>
</div>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">ChoufliHal</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                          
                        </br>
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Table de l'affichage avec des metiers -->
      <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste des reclamations</h6>
                         <!-- <a href="">Plus</a> -->
                         </div>
            <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                            <!--------LES METIERS--------->
                            <!--print PDF-->
                            <form method="POST" action="" align="center">
                                         <a type="submit" name="PDF" >
                                            <button onclick="window.print()" class="btn btn-primary">PDF print this page</button>
                                            </a>
                                            </form> 
                             <!--Generer PDF-->
                            <!-- <form method="POST" action="pdf.php" align="center"> 
                            <              <a type="submit" name="PDF" >
                                            <button onclick="window.print()" class="btn btn-primary">PDF print this page</button>
                                            </a>
                                            </form>-->
                             <!--excel--> 
                            <form method="POST" action="export.php" align="center">
                                            <a type="submit" name="Export" >
                                            &nbsp;&nbsp;<button class="btn btn-primary">Excel</button>
                                            </a>
                                        </form>   

                             <!--Trie-->
                                
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" align="center">
                              &nbsp;<button type="submit" class="btn btn-primary" for="Trie">Trier par : </button>&nbsp;
                               <select type="range" name="Trie" id="Trie">
                                     <option selected disabled>choisir...</option>
                                     <option>Nom </option>
                                     <option>Date</option>
                                </select>
        </thead>
        </div>
                </div>
            </div>
        </div>

                             </form>  

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>