

<?php
include_once '../../Model/Evennement.php';
include_once '../../Controller/EvennementC.php';
include_once '../../Model/Organisateur.php';
include_once '../../Controller/OrganisateurC.php';
$error = "";
$EventC=new EventC();
$OrganisateurC= new OrganisateurC();
   $listeevent=$EventC->afficherevent();
  // $listeOrganisateur=$OrganisateurC->afficherOrganisateur();
    $Event = null;
    $Organisateur = null;

    $Events = new EventC();
    $Organisateurs= new OrganisateurC();
   


 



   if (isset($_REQUEST['envoyer'])) {
        if (
        isset($_POST["id_event"]) &&
        isset($_POST["nom_event"]) &&
        isset($_POST["date_event"]) &&  
       
        isset($_POST["type_event"]) 
        
        ) {
            if (
                !empty($_POST["id_event"]) &&
                !empty($_POST["nom_event"]) &&
                !empty($_POST["date_event"]) &&
               
                !empty($_POST["type_event"]) 
            )
             {
            $Event = new Event(
                $_POST["id_event"],
                $_POST["nom_event"],
                 $_POST["date_event"],
                $_POST["type_event"],
                $_POST["id_organisateur"]
                
            );
            $EventC->ajouterevent($Event);

        
           // header('Location:Events.php');
        }
        else 
            $error = "Missing information";   
        
       
           
          }}
          else if(isset($_REQUEST['Modifier'])) {
            if (
            isset($_POST["id_event"]) &&
            isset($_POST["nom_event"]) &&
            isset($_POST["date_event"]) &&  
           
            isset($_POST["type_event"]) 
            ) {
                if (
                    !empty($_POST["id_event"]) &&
                    !empty($_POST["nom_event"]) &&
                    !empty($_POST["date_event"]) &&
                    !empty($_POST["type_event"]) 
                )
                 {
                $Event = new Event(
                    $_POST["id_event"],
                    $_POST["nom_event"],
                     $_POST["date_event"],
                    $_POST["type_event"],
         
                );
                $EventC->modifierevent($Event,$_POST["id_event"]);
    
            
               // header('Location:Events.php');
            }
            else 
                $error = "Missing information";   
            
           
               
              }}
              else if(isset($_REQUEST['Supprimer'])) {
                $EventC = new EventC();
                $EventC->supprimerEvent($_POST['id_event']);
              }
             
            else if(isset($_REQUEST['Trie']))
            { { 
                $Trier = filter_input(INPUT_POST, 'Trie', FILTER_SANITIZE_STRING);
                if ($Trier == "croissant")
                {
                    $listeevent= $EventC->TrieEventASC();
                }
                else
                {
                    $listeevent= $EventC->TrieEventDESC();
                }
            }
            }
           else  if(isset($_POST['RechercheNom']))
    {
        $listeevent = $EventC->Rechercher($_POST['RechercheNom']);
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

                <a href="../backA/userDash.php" class="nav-item nav-link "><i class="fa-light fa-users"></i>user management</a>

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
                <a href="Event.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" align="center">
                              &nbsp;<button type="submit" class="btn btn-primary" for="Trie">Trier par : </button>&nbsp;
                               <select type="range" name="Trie" id="Trie">
                                     <option selected disabled>choisir...</option>
                                     <option>croissant</option>
                                     <option>décroissant</option>
                                </select>
                                
                             </form> 
                             <form class="d-none d-md-flex ms-4" method="POST">
                    <input class="form-control border-0" type="search" name="RechercheNom" placeholder="Search">
                    <button class="btn" type="submit">
                                                <i class="icon-search"></i>
                                            </button>
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
                            <span class="d-none d-lg-inline-flex">Amin Dridi</span>
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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    
                    
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <form method="POST" action ="" onsubmit="return Verif()">
                    <div class="table-responsive">
                    <table border="1" align="center">
                    <tr>
                    <td>
                        <label for="id_event">id Event:
                        </label>
                    </td>
                   <td> <input type="number" name="id_event" id="id_event" > </td>
                   <p id="errorC" class="error"></p>
                </tr>
				<tr>
                    <td>
                        <label for="nom_event">Nom Event:
                        </label>
                    </td>
                   <td> <input type="text" name="nom_event" id="nom_event" > </td>
                   <div id="errorN"></div>
                   <p id="errorC" class="error"></p>
                </tr>
                <tr>
                    <td>
                        <label for="date_event">Date:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_event" id="date_event"  >
                    </td>
                </tr> 
                
                <tr>
                    <td>
                        <label for="date_event">ID Organisateur:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="id_organisateur" id="id_organisateur"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="type">Image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="type_event" id="type_event">
                        <p id="errorT" class="error"></p>

                    </td>
                </tr>   
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit"  value="envoyer" name="envoyer" Onclick=  > 
                    </td>
                    <td>
                    <input type="submit" name="Modifier" value="Modifier">
                    
                </td>
                    <td> 

                    <input type="submit" name="Supprimer" value="Supprimer">
                    </td>
                </tr>
            </table>
            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#ID_Event</th>
                                        <th scope="col">#ID_Organisateur</th>
                                        <th scope="col">Nom_Event</th>
                                        <th scope="col">Date_event</th>
                                        <th scope="col">Image URL</th>
                                    </tr>
                                </thead>
                                <?php foreach($listeevent as $Event ) {
         ?>  
    
      				
      					<h3><a href="teacher-single.html"></a></h3>
      					<span class="position"></span>               
                
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $Event['id_event']?></th>
                                        <td><?php echo $Event['Id_organisateur']?></td>
                                        <td><?php echo $Event['nom_event']?></td>
                                        <td><?php echo $Event['date_event']?></td>
                                        <td><?php echo $Event['type_event']?></td>
                                    </tr>
                                    
                                </tbody>
                                <?php
                                }
                                ?>
                            </table>    
                    </div>
                </div>
            </div>
                        
                        
                        
                        
                  
                        </form>
                        <script>
                        function Verif() {
  var nom_event = document.getElementById("nom_event");


  if (nom_event.value.length == 0) {
  console.log("Input field is empty");
  alert("Enter Nom ");

}
var id_event = document.getElementById("id_event");


  if (id_event.value.length == 0) {
  console.log("Input field is empty");
  alert("Enter ID"); 
}
                        }
</script>
            <!-- Recent Sales End -->



            <!-- Widgets Start 
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            Widgets End -->


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
