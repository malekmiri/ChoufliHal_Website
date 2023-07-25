<?php

// include '../controller/userC.php';
include ('C:\xampp\htdocs\Project\Controller\userC.php');

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
        $userC->addadmin($user);
        header('Location:login.php');
    } else
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
    
    <hr>

    <div id="error13">
        <?php echo $error; ?>
    </div>

    <!-- <form action="" method="POST" id="myform">
        <table border="1" align="center">

            <tr>
                <td>
               
                    <label for="firstName">First Name:
                    </label>
                </td>
                
                  
                <td><input type="text" name="firstName" id="firstName" maxlength="20"></td>
                </td>
                <td id= "error">

                </td>
                <td id= "error1">

                </td>
            </tr>
            <tr>
                <td>
                    <label for="lastName">Last Name:
                    </label>
                </td>
                <td><input type="text" name="lastName" id="lastName" maxlength="20"></td>
                </td>
                <td id= "error2">

                </td>
                <td id= "error3">

                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">phone:
                    </label>
                </td>
                <td>
                    <input type="tel" name="phone" id="phone">
                </td>
                </td>
                <td id= "error4">

                </td>
                <td id= "error5">
                <td id= "error6">

</td>

                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">email:
                    </label>
                </td>
                <td>
                    <input type="email" name="email" id="email">
                </td>
                </td>
                <td id= "error7">

                </td>
                <td id= "error8">

                </td>
            </tr>
            
            
            
            
            
            <tr>
                <td>
                    <label for="password">password:
                    </label>
                </td>

                <td>
                    <input type="password" name="password" id="password">
                </td>

                </td>
                <td id= "error9">

                </td>
            </tr>






            <tr>
            <td>
                    <label for="cpassword">confirm password:
                    </label>
                </td>
                <td>
                    <input type="password" name="cpassword" id="cpassword">
                </td>
                     
                <td id= "error10">

                 </td>
                 <td id= "error11">

                 </td>
            </tr>






            
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
               
            </tr>
        </table>
        
    </form> -->
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
                    <input type="text" id="firstName" name="firstName" class="form-control form-control-lg"  />
                    <label class="form-label" for="firstName">First Name</label>
                    <span id= "error">

</span>
<span id= "error1">

</span>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Last Name</label>
                    
<span id= "error2">

</span>

<span id= "error3">

</span>
                  </div>

                </div>
              </div>

             
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                    <span id= "error4">

</span>
<span id= "error5">

</span>
</div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" id="phone" name="phone" class="form-control form-control-lg" />
                    <label class="form-label" for="phone">Phone Number</label>
                    <span id= "error6">

</span>
<span id= "error7">

</span>
<span id= "error8">

</span>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">password</label>
                    <span id= "error9">

</span>
</div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg" />
                    <label class="form-label" for="cpassword">confirm password</label>
                    <span id= "error10">

</span>
<span id= "error11">

</span>

                  </div>

                </div>
              </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>
                    </form>
</section>
    <script>
let myform = document.getElementById('myform');
myform.addEventListener('submit',function(e){

    let myInput= document.getElementById('firstName');
    let myInput2= document.getElementById('lastName');
    let myInput3= document.getElementById('phone');
    let myInput4= document.getElementById('email');
    let myInput5= document.getElementById('cpassword');
    let password=document.getElementById('password');

    let myregex = /^[a-zA-Z-\s]+$/;
    let myregex2 = /^[0-9]+$/;
    let myregex3 = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;




    if(myInput.value.trim()==""){
        let myError= document.getElementById('error');
        myError.innerHTML="le champs first name est requis";
        myError.style.color='red';
e.preventDefault();

    }
    else if(myregex.test(myInput.value)==false) {
        
        let myError1= document.getElementById('error1');
        myError1.innerHTML="FirstName doit comprter des lettres, des tirets uniquements";
        myError1.style.color='red';
e.preventDefault();



    }
        






    

    if(myInput2.value.trim()==""){
        let myError2= document.getElementById('error2');
        myError2.innerHTML="le champs last name est requis";
        myError2.style.color='red';
e.preventDefault();

    }
    else if(myregex.test(myInput2.value)==false) {

        let myError3= document.getElementById('error3');
        myError3.innerHTML="LastName doit comprter des lettres, des tirets uniquements";
        myError3.style.color='red';
e.preventDefault();



    }










if(myInput3.value.trim()==""){
    let myError4= document.getElementById('error4');
    myError4.innerHTML="le champs phone est requis";
    myError4.style.color='red';
e.preventDefault();

}
else if(myregex2.test(myInput3.value)==false) {

    let myError5= document.getElementById('error5');
    myError5.innerHTML="phone doit contenir des chiffres seulement";
    myError5.style.color='red';
e.preventDefault();
}
else if(myInput3.value.length != 8) {

let myError6= document.getElementById('error6');
myError6.innerHTML="le num tel doit contenir 8 chiffres";
myError6.style.color='red';
e.preventDefault();
}








if(myInput4.value.trim()==""){
    let myError7= document.getElementById('error7');
    myError7.innerHTML="le champs email est requis";
    myError7.style.color='red';
e.preventDefault();

}
else if(myregex3.test(myInput4.value)==false) {

    let myError8= document.getElementById('error8');
    myError8.innerHTML="email invalid";
    myError8.style.color='red';
e.preventDefault();
}











if(password.value.trim()==""){
    let myError9= document.getElementById('error9');
    myError9.innerHTML="le champs password est requis";
    myError9.style.color='red';
e.preventDefault();

}

if(myInput5.value.trim()==""){
    let myError9= document.getElementById('error10');
    myError10.innerHTML="le champs confirm password est requis";
    myError10.style.color='red';
e.preventDefault();

}
else if(password.value!=myInput5.value) {

let myError11= document.getElementById('error11');
myError11.innerHTML="passwords dont match";
myError11.style.color='red';
e.preventDefault();
}





});




    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .gradient-custom {
/* fallback for old browsers */
background: #f093fb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
    </style>
</body>

</html>