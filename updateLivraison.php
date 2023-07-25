<?php

//include '../Controller/Livraison.php';
include ('C:\xampp\htdocs\Project\Controller\Livraison.php');


$error = "";

// create client
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
            $_POST["IdCommande"],
            $_POST["IdLivreur"],
            $_POST["Destinataire"],
            new DateTime($_POST["DateLivraison"]),
            $_POST["Adresse"]
        );
        $LivraisonC->updateLivraison($LivraisonM, $_POST["IdCommande"]);
      header('Location:ListLivraison.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">
<html>

<head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choufli Hal</title>
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
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="images/chouflihal.png"></head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
			  <a class="navbar-brand" href="index.html">
				<img src="images/mon-logo.png" alt="logo" width="50" height="50" class="d-inline-block align-middle mr-2">
				<span>Choufli Hal</span>
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			  </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="..\index.html" class="nav-link">Home</a></li>
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
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2">
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Modifier votre Livraison</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdCommande'])) {
        
        $LivraisonM = $LivraisonC->showLivraison($_POST['IdCommande']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdCommande">Id Commande:
                        </label>
                    </td>
                    <td><input type="text" name="IdCommande" id="IdCommande"  maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="IdLivreur">ID Livreur:
                        </label>
                    </td>
                    <td><input type="text" name="IdLivreur" id="IdLivreur"  > </td>
                </tr>
                <tr>
                    <td>
                        <label for="Destinataire"> Name:
                        </label>
                    </td>
                    <td><input type="text" name="Destinataire" id="Destinataire" maxlength="20"></td>
                </tr>
              
                <tr>
                    <td>
                        <label for="Date Livraison">Date Livraison:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="DateLivraison" id="DateLivraison"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Adresse"> Adresse:
                        </label>
                    </td>
                    <td><input type="text" name="Adresse" id="Destinataire" maxlength="20"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </td>
                    <td>
                        <input class="btn btn-primary" type="reset" value="Reset">
                    </td>
                </tr>
                </table>
        </form>
    <?php
    }
    ?>
        <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Choufli Hal</h2>
              <p>We provide you the help that you need</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Features</a></li>
                <li><a href="#" class="py-2 d-block">Projects</a></li>
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">ESPRIT , Tunis Tunisia</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">77 906 189</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">choufliHal@esprit.tn</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

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