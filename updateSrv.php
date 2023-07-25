<?php
// include '../Controller/Rdv.php';
include ('C:\xampp\htdocs\Project\Controller\Rdv.php');
// $SrvS = new SrvS();
// $ListSrv=$SrvS->listSrv();

$error = "";
// create srv
$Srv = null;
// create an instance of the controller
$Srvs = new SrvS();

if (isset($_POST['submit'])) {
    if (
        // isset($_POST['id_srv']) &&
        isset($_POST['type']) &&
        isset($_POST['mode']) &&
        isset($_POST['freq']) &&
        isset($_POST['couts']) &&
        isset($_POST['description'])
    )
        {
    if (
        // !empty($_POST['type']) &&
        !empty($_POST['type']) &&
        !empty($_POST['mode']) &&
        !empty($_POST['freq']) &&
        !empty($_POST['couts']) &&
        !empty($_POST['description'])     
    ) {
        $Srv = new Srv(
            null,
            $_POST['type'],
            $_POST['mode'],
            $_POST['freq'],
            $_POST['couts'],
            $_POST['description']
 
        );
        var_dump($_POST) ;
        $Srvs->updateSrv($Srv, $_GET['id']);
        header('Location:ListSrv.php');
    } else {
        $error = "Missing information";
    }
}
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
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
                        <img class="rounded-circle" src="img/userrania.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Rania Gasmi</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                   
                  
                    <a href="ListRdvtable.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Tables des reservations</a>
                    <a href="ListSrv.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Tables des services</a>
                   
                   
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
                
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
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

    

    <button><a href="ListSrv.php">Back to list</a></button>
    <hr>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <div class="container">
            <?php
                            if (isset($_GET['id'])){
                                $Srv = $Srvs->recupererSrv($_GET['id']);
                            }
                            ?>
        <form action="" method="POST":>
            
        <div>
            <label for="type">Service's type</label><br>
            <select id="type" name="type">
                <option value="">--Choose type--</option>
                <option value="Basic" <?php echo $Srv['type'] === 'Basic' ? 'selected' : ''; ?>>Basic</option>
                <option value="Standard" <?php echo $Srv['type'] === 'Standard' ? 'selected' : ''; ?>>Standard</option>
                <option value="Premium" <?php echo $Srv['type'] === 'Premium' ? 'selected' : ''; ?>>Premium</option>
                <option value="Platinum" <?php echo $Srv['type'] === 'Platinum' ? 'selected' : ''; ?>>Platinum</option>

            </select><br><br>
            </div>

            <div>
            <label for="mode">Service's mode</label><br>
            <select id="mode" name="mode">
                <option value="">--Choose mode--</option>
                <option value="Virtual" <?php echo $Srv['mode'] === 'Virtual' ? 'selected' : ''; ?>>Virtual</option>
                <option value="Physical" <?php echo $Srv['mode'] === 'Physical' ? 'selected' : ''; ?>>Physical</option>
            
            </select><br><br>
            </div>


            <div>
            <label for="freq">Frequence</label><br>
            <input type="int" id="freq" name="freq" placeholder="frequence" value="<?php echo $Srv['freq']; ?>"><br><br>
            </div>
 
            <div>
            <label for="couts">Service price</label><br>
            <input type="float" id="couts" name="couts" placeholder="couts" value="<?php echo $Srv['couts']; ?>">TND<br><br>
            </div>

            <div>
            <label for="description">Give a description</label><br>
            <input type="text" id="description" name="description" placeholder="description" value="<?php echo $Srv['description']; ?>"><br><br>
            </div>

    <input type="submit" value="Update Service" name="submit" class="link-btn"><br><br>
    <input type="reset" value="Reset">
</form>
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
    <script src="js/main.js"></script>

<!-- <script src="../View/js/CheckS.js"></script> -->
</body>
</html>