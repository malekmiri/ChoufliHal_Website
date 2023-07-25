<?php
// include '../Controller/Rdv.php';
include ('C:\xampp\htdocs\Project\Controller\Rdv.php');

$SrvS = new SrvS();
$Srv = $SrvS->listSrv();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
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

    <link rel="icon" href="images/mon-logo.png">
    <link rel="stylesheet" type="text/css" href="cntrl.css">


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
      <div class="slider-item bread-item" style="background-image: url('images/bg.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.html">Home</a></span> <span>Services</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">You're In Good Hands With Our Well Experienced Doctors</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
		
    <h6>Choose a language</h6>
    <div id="google_translate_element" ></div>
            <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <script>
              function googleTranslateElementInit(){
                new google.translate.TranslateElement(
                  {pageLanguage: 'en'},
                  'google_translate_element'
                );
              }
            </script>
    <section class="ftco-section">
    
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">Our Best Pricing</h2>
            <p>"Sometimes the people around you won't understand your journey. </p>
			<p> They don't need to, it's not for them." </p>
			<p>- Joubert Botha</p>
          </div>
        </div>

    		<div class="row">
        	<div class="col-md-3 ftco-animate">
          <?php
      foreach ($Srv as $SrvS) {
        ?>
        		<div class="pricing-entry pb-5 text-center">
            
        			<div>
	        			<!-- <h3 class="mb-4">Basic</h3> -->
                <td><h3 class="mb-4"> </h3></td>
                <td><?php echo $SrvS['type']; ?></td>
                <td><p><?php echo $SrvS['freq']; ?> Sessions /Month</p></td>
                <td><p><span class="price"><?php echo $SrvS['couts']; ?> TND</span><span class="per"> /Month</span></p></td>
                <ul>
                   <td><td><?php echo $SrvS['description']; ?></td> 
      </ul>
               
               <!-- <p><span class="price">150DT</span><span class="per">/ session</span></p> -->
	        		</div>
             
        			<!-- <ul>
        				<li>Diagnostic Services</li>
								<li>One-hour diagnostic session with a licensed psychotherapist</li>
								<li>Detailed report of the diagnostic and treatment recommendations</li>
								<li>Mental health monitoring and follow-up per month</li>
        			</ul> -->
              <p class="button text-center"><a type="submit" href="addRdv.php?id=<?php echo $SrvS['id_srv']; ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Book now</a></p>



        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
          <?php
        }
        ?>
        		<!-- <div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Standard</h3>
	        			<p><span class="price">300DT</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Diagnostic Services</li>
								<li>Two one-hour diagnostic sessions with a licensed psychotherapist</li>
								<li>Detailed report of the diagnosis and treatment recommendations</li>
								<li>Weekly telephonic follow-up for a month after diagnosis </li>
        			</ul>
        			<p class="button text-center"><a href="addRdv.php" class="btn btn-primary btn-outline-primary px-4 py-3">Book now</a></p>
        		</div>
        	</div> -->
        	<!-- <div class="col-md-3 ftco-animate">
        		<div class="pricing-entry active pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Premium</h3>
	        			<p><span class="price">450DT</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Diagnostic Services</li>
								<li>Three one-hour diagnostic sessions with a licensed psychotherapist</li>
                <li>Detailed report of the diagnosis and treatment recommendations</li>
                <li>One hour of individual psychotherapy session with the same psychotherapist</li>
								<li>Personalized self-development exercises to be done at home</li>
        			</ul>
        			<p class="button text-center"><a href="addRdv.php" class="btn btn-primary btn-outline-primary px-4 py-3">Book now</a></p>
        		</div>
        	</div> -->
        	<!-- <div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Platinum</h3>
	        			<p><span class="price">600DT</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
                <li>Diagnostic Services</li>
        				<li>Four one-hour diagnostic sessions with a licensed psychotherapist</li>
								<li>Detailed report of the diagnosis and treatment recommendations</li>
								<li>Weekly telephonic follow-up for six months after diagnosis </li>
								<li>Two hours of individual psychotherapy sessions with the same psychotherapist</li>
								<li>Personalized self-development exercises to be done at home</li>
        			</ul>
        			<p class="button text-center"><a href="addRdv.php" class="btn btn-primary btn-outline-primary px-4 py-3">Book now</a></p>
        		</div>
        	</div> -->
        </div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">ChoufliHal.</h2>
              <p>Wherever you are , we are there for you .</p>
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

          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
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
          <h5 class="modal-title" id="modalRequestLabel">Book an Appointment</h5>
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
              <input type="submit" value="Book now" class="btn btn-primary">
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
