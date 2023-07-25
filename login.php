<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "projet";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["nom"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                 $query = "SELECT * FROM user where email_user=:nom and password_user=:password";
                $statement = $connect->prepare($query);  
              $statement->execute(  
                     array(  
                          'nom'     =>     $_POST["nom"],  
                          'password'     =>     $_POST["password"]  
                     )  
                ); 
                $cord=$statement->fetch();
                
               
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["email_user"] = $_POST["nom"];
                     $_SESSION["password_user"] = $_POST["password"];
                     $_SESSION["id_user"]=$cord['id_user'];
                     $_SESSION["role_user"]=$cord['role_user'];
                     $_SESSION["first_name_user"]=$cord['first_name_user'];
                   header("location:choixsession.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 
 
 
  
 
 
 
 
 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Login|Choufli hal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h4 align="">Welcome,Please enter your e-mail and password!</h4><br />  
                <form method="post">  
                     <label>e-mail</label>  
                     <input type="text" name="nom" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <a href="http://localhost/Project/View/frontA/fonts/forgot.php" class="auth-link text-black">Forgot password?</a>
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>
 <!-- C:\xampp\htdocs\Project\View\frontA\fonts\forgot.php -->