<?php
// require "\Project\Controller\Rdv.php";
include ('C:\xampp\htdocs\Project\Controller\Rdv.php');

$conn = config::getConnexion();

$error = "";

$Rdv = null;
$RdvR = new RdvR();

$Srv = null;
$SrvS = new SrvS();
$Srvs = new SrvS();
// $Srv = $SrvS->listSrv();

if (isset($_POST['submit'])) {

if (
    isset($_POST['dateR']) &&
    isset($_POST['dStart']) &&
    isset($_POST['dEnd']) &&
    isset($_POST['duree']) &&
    isset($_POST['mStatus']) &&
    isset($_POST['rStatus']) 
) {
    if (
        !empty($_POST['dateR']) &&
        !empty($_POST['dStart']) &&
        !empty($_POST['dEnd']) &&
        !empty($_POST['duree']) &&
        !empty($_POST['mStatus']) &&
        !empty($_POST['rStatus']) 
    ) 
   { 
     $Rdv = new Rdv(
      null,
      $_POST['id_srv'],
      new DateTime($_POST['dateR']),
      new DateTime($_POST['dStart']),
      new DateTime($_POST['dEnd']),
      $_POST['duree'],
      $_POST['mStatus'],
      $_POST['rStatus']     
    );
  var_dump($_GET['id']) ;
  $Srvs->recupererSrv($_GET['id']);
  $RdvR->addRdv($Rdv);
  header('Location:sendmail.php');
 // header('Location:addRdv.php');
}  
    // else 
    //     $error = "Missing information";
}
}

?>
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
    <link rel="stylesheet" type="css" href="../View/css/cntrl.css">

    <!-- CSS for full calender -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>
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
            <li class="nav-item cta"><a href="..\front\addRdv.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Book an Appointment</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

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

    <!--  -->
    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <div class="container-fluid pt-4 px-4">
<!--                 
                <td>
        <a href="addSrv.php"><button class="btn btn-primary">Add a new service</button></a>
        </td> -->
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Service's list</h6>
<!-- reservation 's Table Start -->
<!-- <table border="1" align="right"> -->
        <tr>
            <th>Type</th> 
            <th>Mode</th> 
            <th>Frequency</th> 
            <th>Price</th> 
            <th>Description</th> 
        </tr>
        <?php
if (isset($_GET['id'])) {
    $id_srv = $_GET['id'];
    $pdo = config::getConnexion();
    $SrvS = $pdo->query("SELECT * FROM `services` WHERE id_srv=$id_srv")->fetch();
}

if(isset($SrvS)) {
    // Utilisation de $SrvS pour afficher les informations du service correspondant
    ?>
        <tr>
                <p><td><?php echo $SrvS['type']; ?></p></td>
                <p><td><?php echo $SrvS['mode']; ?></p></td>
                <p> <td><?php echo $SrvS['freq']; ?></p></td>
                <p><td><?php echo $SrvS['couts']; ?></p></td>
                <p><td><?php echo $SrvS['description']; ?></p></td>
        <td>    
        <form method="POST" action="appointments.php">
            <a type="submit" name="Change the service" ><button class="btn btn-primary">Change the service</button></a>
            </form>
        </td> 
    </tr>
    <?php
} else {
    // Gestion du cas où aucun service n'a été trouvé
    ?>
    <p>Aucun service correspondant</p>
    <?php
}
?>
<!-- </table> -->
</div>
</div>
</div>
</div>
    <div class="container">
    <h1 class="heading">Book appointment</h1>

            <?php
                            if (isset($_GET['id'])) {
                                $Srv = $Srvs->recupererSrv($_GET['id']);
                            }
                            ?>
<form action="save_schedule.php" method="POST" onsubmit="sendMail(event);">
    <table border="1" align="left">
  <!-- <tr>
      <td>
        <label for="Id_rdv">Appointment's ID:</label>
      </td>
      <td> -->
        <input type="hidden" id="Id_rdv" name="Id_rdv" ><br><br>
        <!-- <span id="id-error"></span> -->
      <!-- </td>
    </tr>
    <tr>
      <td>
        <label for="id_srv">Service's ID:</label>
      </td>
      <td> -->
        <input type="hidden" id="id_srv" name="id_srv" value="<?php echo $Srv['id_srv']; ?>"><br><br>
        <!-- <span id="id-error"></span> -->
      <!-- </td>
    </tr> -->
    <tr>
      <td>
        <label for="dateR">Enter appointment date:</label>
      </td>
      <td>
        <input type="date" id="dateR" name="dateR" ><br><br>
        <!-- <span id="date-error"></span> -->
      </td>
    </tr>

    <tr>
      <td>
        <label for="dStart">Starts at :</label>
      </td>
      <td>
        <input type="time" id="dStart" name="dStart" ><br><br>
        <!-- <span id="date-error"></span> -->
      </td>
    </tr>

    <tr>
      <td>
        <label for="dEnd">Ends at:</label>
      </td>
      <td>
        <input type="time" id="dEnd" name="dEnd" ><br><br>
        <!-- <span id="date-error"></span> -->
      </td>
    </tr>

    <tr>
      <td>
        <label for="duree">Enter appointment duration:</label>
      </td>
      <td>
         <input type="number" id="duree" name="duree"> minutes<br><br>
         <!-- <span id="durationError" ></span> -->
      </td>
    </tr>
    <tr>
      <td>
        <label for="mStatus">Choose your mental health state:</label>
      </td>
      <td> 
        <select id="mStatus" name="mStatus" >
          <option value="">--Choose your mental health state--</option>
          <option value="Emergency">Emergency</option>
          <option value="Normal">Normal</option>
        </select><br><br>
        <!-- <span id="etat-error"></span> -->
      </td>
    </tr>
    <tr>
      <td>
        <label for="rStatus">Appointment status:</label>
      </td>
      <td> 
        <select id="rStatus" name="rStatus" >
          <option value="">--Choose your appointment status--</option>
          <option value="Confirm">Confirm</option>
          <option value="Cancel">Cancel</option>
          <option value="Report">Report</option>
        </select><br><br>
        <!-- <span id="statut-error"></span> -->
      </td>
    </tr>
    <tr align="center">
    <td>
      <input type="submit" value="Book Appointment" name="submit" >
    </td>
    <td>
      <input type="reset" value="Reset">
    </td>
  </tr>
</form>

<script>
document.getElementById("myForm").addEventListener("submit", function(event) {
  // Empêche l'envoi du formulaire pour le moment
  event.preventDefault();

  // Envoie du formulaire
  this.submit();

  // Envoie du mail
  sendMail();
});

function sendMail() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "sendmail.php");
  xhr.send();
  // Vous pouvez également ajouter des données supplémentaires ici avec xhr.send(data)
}
</script>
</div>


<!-- <footer class="ftco-footer ftco-bg-dark ftco-section">
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
  
            </div>
          </div>
        </div>
      </footer> -->


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

    <!-- <script src="../View/js/Check.js"></script> -->

</body>
<!-- 
<script>
function save_event()
{
var event_name=$("Id_rdv").val();
var event_start_date=$("dStart").val();
var event_end_date=$("dEnd").val();
if(event_name=="" || event_start_date=="" || event_end_date=="")
{
alert("Please enter all required details.");
return false;
}
$.ajax({
 url:"save_event.php",
 type:"POST",
 dataType: 'json',
 data: {event_name:Id_rdv,event_start_date:dStart,event_end_date:dEnd},
 success:function(response){
   $('#event_entry_modal').modal('hide');  
   if(response.status == true)
   {
	alert(response.msg);
	location.reload();
   }
   else
   {
	 alert(response.msg);
   }
  },
  error: function (xhr, status) {
  console.log('ajax error = ' + xhr.statusText);
  alert(response.msg);
  }
});    
return false;
}
</script> -->
</html>