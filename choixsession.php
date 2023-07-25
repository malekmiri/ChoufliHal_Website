<?php
session_start();
if($_SESSION['role_user']== 1)
{

    header("location:home0.php"); 

}
else 
if($_SESSION['role_user']== 2)
{


    header("location:userDash.php"); 

}




?>