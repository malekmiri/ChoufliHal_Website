<?php
include_once '../../Model/Evennement.php';
include_once '../../Controller/EvennementC.php';
include_once '../../Model/Organisateur.php';
include_once '../../Controller/OrganisateurC.php';

$error = "";
$EventC=new EventC();
$OrganisateurC= new OrganisateurC();
   $listeevent=$EventC->afficherevent();
   $listeOrganisateur=$OrganisateurC->affichernomOrganisateur();
    $Event = null;
    $Organisateur = null;
    $Events = new EventC();
    $Organisateurs= new OrganisateurC();
    if (isset($_POST['interested'])) {
      if (!empty($_POST["id_event"])) 
      $EventC->interested();

    }
    if (
    isset($_POST["id_event"]) &&
    isset($_POST["nom_event"]) &&
    isset($_POST["date_event"]) &&  
    isset($_POST["type_event"]) &&
    isset($_POST["interested"]) &&
    isset($_POST["Id_organisateur"]) &&
        isset($_POST["nom_organisateur"]) &&
        isset($_POST["num_organisateur"]) 
    ) {
        if (
            !empty($_POST["id_event"]) &&
            !empty($_POST["nom_event"]) &&
            !empty($_POST["date_event"]) &&
            !empty($_POST["type_event"]) &&
            !empty($_POST["interested"]) &&
            !empty($_POST["Id_organisateur"]) &&
            !empty($_POST["Nom_organisateur"]) &&
            !empty($_POST["num_organisateur"]) 
        ) {
            $Event = new Event(
                $_POST['id_event'],
                $_POST['nom_event'],
                new DateTime($_POST['date_event']),
                $_POST['type_event'],
                $_POST['interested']
            );
            $OrganisateurC = new OrganisateurC(
              $_POST['Id_organisateur'],
              $_POST['Nom_organisateur'],
              $_POST['num_organisateur']
          );
            $Events->ajouterevent($Event);
            $OrganisateurC->ajouterorganisateur($Organisateur);
            //header('Location:EventC.php');
        }       
            
            else
                $error = "Missing information";}
        
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DentaCare - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
			  <a class="navbar-brand" href="index.html">
				<img src="..\BackP\images\mon-logo.png" alt="logo" width="50" height="50" class="d-inline-block align-middle mr-2">
				<span>Choufli Hal</span>
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			  </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="..\front\index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="..\frontP\product.php" class="nav-link">Products</a></li>
	          <!-- <li class="nav-item"><a href="appointments.html" class="nav-link">Appointments</a></li> -->
	          <li class="nav-item"><a href="..\FrontE\contact.php" class="nav-link">Events</a></li>
	          <li class="nav-item"><a href="..\frontRec\contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item"><a href="..\frontRec\ListeReponse.php" class="nav-link">Complaints</a></li>
	          <li class="nav-item"><a href="..\frontComm\contact.php" class="nav-link">Cart</a></li>
            <li class="nav-item"><a href="..\front\appointments.php" class="nav-link">Book Appointment</a></li>

            <!-- <li class="nav-item cta"><a href="..\front\addRdv.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Book an Appointment</span></a></li> -->
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/freud.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Event</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    
		<section class="ftco-section contact-section ftco-degree-bg">
    <?php foreach($listeevent as $Event ){
         ?>
    <div class="container">
        <div class="row d-flex mb-5 contact-info">  
          <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/<?php echo $Event['type_event']?>);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html"><?php echo $Event['nom_event']?></a></h3>
      					<span class="position"><?php echo $Event['date_event']?></span>               
                
	        		</div>
      			</div>
        	</div>
        </div> 
      </div> 
          <?php
          }
        
          ?>
          <!--print PDF-->
          <form method="POST" action="" align="center">
                            <              <a type="submit" name="PDF" >
                                            <button onclick="window.print()" class="btn btn-primary">PDF print this page</button>
                                            </a>
                                            </form>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> technopole el ghazela,Ariana,Tunisie</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">ninjaturtels@esprit.tn</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">yoursite.com</a></p>
          </div>
        
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
          
          </div>

         
        </div>
      
    </section>


    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
              <input type="text" class="form-control" id="appointment_name" placeholder="Full Name">
            </div>
            <div class="form-group">
              <!-- <label for="appointment_email" class="text-black">Email</label> -->
              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_date" class="text-black">Date</label> -->
                  <input type="text" class="form-control appointment_date" placeholder="Date">
                </div>    
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_time" class="text-black">Time</label> -->
                  <input type="text" class="form-control appointment_time" placeholder="Time">
                </div>
              </div>
            </div>
            

            <div class="form-group">
              <!-- <label for="appointment_message" class="text-black">Message</label> -->
              <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Make an Appointment" class="btn btn-primary">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>