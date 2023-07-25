<?php

// include '../controller/userC.php';
// include '../mail.php';
include ('C:\xampp\htdocs\Project\Controller\userC.php');
include ('C:\xampp\htdocs\Project\mail.php');

$error = "";

$user = null;

$userC = new userC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["email"])&&
    isset($_POST["password"])

) { 
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["phone"]) &&
        !empty($_POST["email"])&&
        !empty($_POST["password"])
    ) {    
        $user = new user(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['password']

        );
        $firstname=$_POST['firstName'];
        $email=$_POST['email'];
        $pdo = config::getConnexion();

        $query = $pdo->prepare("SELECT * FROM user WHERE email_user='$email'");
        $query->execute();
        $result = $query->rowCount();
      
        if($result>0)
        {   
            $error="<span class='text-danger'>email already exists choose another one</span> ";
        }
        
        
        else
        
        {    
            $pdo = config::getConnexion();

        $query = $pdo->prepare("SELECT * FROM user WHERE first_name_user='$firstname'");
        $query->execute();
        $result = $query->rowCount();
        if($result>0)
        {    echo"username already exists";
            $error="<span class='text-danger'>username already exists choose another one</span> ";
        }
        else{
          var_dump($_POST);
            $userC->adduser($user);
            $mail->setFrom("salim.mahdi@esprit.tn","CHOUFLI HAL");
            $mail->addAddress($_POST['email']);//dist 
            $mail->Subject="account created";
            $name=$_POST['firstName'];
            $mail->Body="Welcome Mr $name";
            $mail->send();

            header('Location:login.php'); 
        }

        }





      
    } 
    else
        $error = "Missing information";
}


?>

<html>
  <head>
    <meta charset="utf-8">
    <title>add user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
  <hr>

<div id="error13">
    <?php echo $error; ?>
</div>

    <!-- Body of Form starts -->
    <div class="container">
      <form method="post" autocomplete="on" onsubmit="validate()">
        <!--First name-->
        <div class="box">
          <label for="firstName" class="fl fontLabel" > First Name: </label>
          <div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="fr">
              <input type="text" required name="firstName" placeholder="First Name"
              class="textBox" autofocus="on" name="firstName" id="firstName">
          </div>
          <div class="clr"></div>
        </div>
        <!--First name-->


        <!--Second name-->
        <div class="box">
          <label for="secondName" class="fl fontLabel"> last Name: </label>
          <div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
          <div class="fr">
              <input type="text" required  name="lastName"id="lastName"
              placeholder="Last Name" class="textBox">
          </div>
          <div class="clr"></div>
        </div>
        <!--Second name-->


        <!---phone No.------>
        <div class="box">
          <label for="email" class="fl fontLabel"> Email ID: </label>
          <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          <div class="fr">
              <input type="email" required  name="email" placeholder="Email Id" class="textBox" id="email">
          </div>
          <div class="clr"></div>
        </div>
        <!---email No.---->
            <div class="box">
          <label for="phone" class="fl fontLabel"> Phone No.: </label>
          <div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
          <div class="fr">
              <input type="text" required name="phone" maxlength="10" placeholder="Phone No." class="textBox">
          </div>
          <div class="clr"></div>
        </div>

        <!---Email ID---->
        
        <!--Email ID----->


        <!---Password------>
        <div class="box">
          <label for="password" class="fl fontLabel"> Password </label>
          <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
          <div class="fr">
              <input type="Password" required name="password" placeholder="Password" class="textBox">
          </div>
          <div class="clr"></div>
        </div>
        <!---confirm Password---->
            <div class="box">
          <label for="password" class="fl fontLabel"> Confirm Password </label>
          <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
          <div class="fr">
              <input type="Password" required name="cpassword" placeholder="Password" class="textBox">
          </div>
          <div class="clr"></div>
        </div>
        <!---Gender----->
        
      




        <div class="box" style="background: #2d3e3f">
            <input type="Submit" name="Submit" class="submit" value="SUBMIT">
        </div>
            <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php"
                                        class="fw-bold text-body"><u>Login here</u></a></p>
      </form>
      

  
  </div>
<style>
*{
  padding: 0;
  margin: 0;
}
body{
  background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
  background-size: cover;
}

.container{
  background: #2d3e3f;
  width: 480px;
  height: 550px;
  padding-bottom: 20px;
  position: absolute;
  top:50%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin: auto;
  padding: 70px 50px 20px 50px;
}


.fl{
  float: left;
  width: 110px;
  line-height: 35px;
}

.fontLabel{
  color: white;
}

.fr{
  float: right;
}

.clr{
  clear: both;
}

.box{
  width: 360px;
  height: 35px;
  margin-top: 10px;
  font-family: verdana;
  font-size: 12px;
}

.textBox{
  height: 35px;
  width: 190px;
  border: none;
  padding-left: 20px;
}

.new{
  float: left;
}

.iconBox{
  height: 35px;
  width: 40px;
  line-height: 38px;
  text-align: center;
  background: #ff6600;
}

.radio{
  color: white;
  background: #2d3e3f;
  line-height: 38px;
}

.terms{
  line-height: 35px;
  text-align: center;
  background: #2d3e3f;
  color: white;
}

.submit{
  float: right;
  border: none;
  color: white;
  width: 110px;
  height: 35px;
  background: #ff6600;
  text-transform: uppercase;
  cursor: pointer;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */

}




</style>
<script src="../view/java.js"></script>
</body>
</html>
