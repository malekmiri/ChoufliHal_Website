<?php
// include '../Controller/ReclamationsC.php';
// include '../Controller/ReponsesC.php';
include ('C:\xampp\htdocs\Project\Controller\ReclamationsC.php');
include ('C:\xampp\htdocs\Project\Controller\ReponsesC.php');

    
$reclamationC=new reclamationC();
$liste=$reclamationC->afficherReclamation()->fetchAll(); ;
$count = count($liste);
$reponseC=new reponseC();
$listeR=$reponseC->afficherReponse()->fetchAll() ;
$countR = count($listeR);
//echo "Total number of answers: " . $countR;


// traited claims
$traited=new reclamationC();
$countT = $traited->countClaims('traité');


//Non traited claims
$Ntraited=new reclamationC();
$countNT = $Ntraited->countClaims('en attente');


//rechercher
$liste=$reclamationC-> afficherReclamation() ;
if (isset($_GET['key'])) {
    $liste = $reclamationC->rechercheReclamation($_GET['key']);
} else 
$liste=$reclamationC->afficherReclamation() ;

 //trie
 if(isset($_POST['Trie']))
 {  
     $Trier = filter_input(INPUT_POST, 'Trie', FILTER_SANITIZE_STRING);
     if ($Trier == "Nom")
     {
         $listeRtri = $reponseC->TrieNom();
     }
     else
     {
         $listeRtri = $reponseC->TrieDate();
     }
 }
 else{
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
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <!-- <span>Admin</span> -->
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
                <a href="indexRec.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input name="key" class="form-control border-0" type="search" placeholder="Search">
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
                            <span class="d-none d-lg-inline-flex">Notification</span>
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
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Chahed Loumi</span>
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
            <!-- Claims & Answers Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total claims</p>
                                <h6 class="mb-0"><?php echo $count?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Treated claims</p>
                                <h6 class="mb-0"><?php echo $countT?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Non treated claims</p>
                                <h6 class="mb-0"><?php echo $countNT?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Answers</p>
                                <h6 class="mb-0"><?php echo $countR?></h6>
                            </div>
                        </div>
                    </div>
            </div>
             <!-- Claims & Answers Start -->
            <!-- tableau -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Dernieres Reclamations</h6>
                         <!-- <a href="">Plus</a> -->
                    </div>
            <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">#ID_Reclamation</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th> 
                                    <th scope="col">Objet</th>
                                    <th scope="col">Description</th> 
                                    <th scope="col">Status</th>
                                </tr>
                               <!-- chercheeeeeeerrrrrrr -->
                        <form method="get" action="indexRec.php">
                    <!-- <input class="d-none d-md-flex ms-4" type="text" name="key" placeholder="chercher..." /> -->
                    <!-- <input class="d-none d-md-flex ms-4" type="submit" value="chercher" placeholder="chercher..." class="btn btn-default btn-primary" /> -->
                    <form class="d-none d-md-flex ms-4">
                    <input name="keyR" class="form-control border-0" type="search" placeholder="Search">
                    </form>
                        <?php
                        
            foreach ($liste as  $reclamation){
        ?>
        <tr>
        <td><input class="form-check-input" type="checkbox"></td>
        <td><?php echo $reclamation['dateReclamation'];?></td>
        <td><?php echo $reclamation['idReclamation'];?></td>
        <td><?php echo $reclamation['nom'];?></td>
        <td><?php echo $reclamation['email'];?></td> 
        <td><?php echo $reclamation['objet'];?></td>
        <td><?php echo $reclamation['description'];?></td> 
        <?php if($reclamation['status']=="en attente"){?>
            <td style="color: red;"><?php echo $reclamation['status'];?></td>
        <?php }else if($reclamation['status']=="traité"){?>
             <td style="color: green;"><?php echo $reclamation['status'];?></td><?php }?>    
                
                <td><a href="updateReclamation.php?idReclamation=<?php echo $reclamation['idReclamation']; ?>" class="btn btn-sm btn-primary">modifier</a></td>
                <td><a href="deleteReclamation.php?idReclamation=<?php echo $reclamation['idReclamation']; ?>" class="btn btn-sm btn-primary">supprimer</a></td>
                 <td><a href="detailReclamation.php?idReclamation=<?php echo $reclamation['idReclamation']; ?>" class="btn btn-sm btn-primary">detailler</a></td>      
                <?php if($reclamation['status']=="en attente"){?>
                    <td><a href="AjouterReponse.php?idReclamation=<?php echo $reclamation['idReclamation']; ?>&objet=<?php echo urlencode($reclamation['objet']); ?>&description=<?php echo urlencode($reclamation['description']); ?>" class="btn btn-sm btn-primary">Repondre</a></td>
                <? }else if($reclamation['status']=="traité"){?> <td></td><?php }?>
               
    
                    
            </form>
            </tr>
            <?php
            }
        ?>     </thead>
                            <tbody>
                        </table>
                        </div>
                </div>
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