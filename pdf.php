<?php

//include_once '../Model/fonction.php';
//include_once '../Model/user.php';
//include_once '../Controller/fonctionC.php';
// include_once '../Controller/userC.php';
include ('C:\xampp\htdocs\Project\Controller\userC.php');




$userC = new userC();
$listuser=$userC->listusers();

$error = "";

//$user = null;

$userCs = new userC();

if (
    isset($_POST['firstName']) &&
    isset($_POST['lastName']) &&
    isset($_POST['phone']) &&
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST['lastName']) &&
        !empty($_POST['phone']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ) {
        $user = new user(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['password']
        );

        $userCs->adduser($user);
        header('Location:userDash.php');
    }
    else
        $error = "Missing information";

}
else {
$error = "Missing information";
}
require_once('fpdf/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=projet_web','root','');


   class PDF extends FPDF{

    function header(){
        $this->SetFont('Arial','B',24);
        $this->Cell(0,10,'Liste des client',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',20);
        $this->Cell(0,10,'Les Coordoneé',0,0,'C');
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(40,10,'firstName',1,0,'C');
        $this->Cell(30,10,'lastName',1,0,'C');
        $this->Cell(30,10,'phone',1,0,'C');
        $this->Cell(20,10,'email',1,0,'C');
        $this->Cell(60,10,'password',1,0,'C');
        $this->Ln();
    }

    function viewTable($db){
        $this->SetFont('Times','',10);
        $listusers = $db->query('SELECT * FROM user ');
        while($data = $listusers->fetch(PDO::FETCH_OBJ)){
            $this->Cell(40,10,$data->firstName,1,0,'C');
            $this->Cell(30,10,$data->lastName,1,0,'C');
            $this->Cell(30,10,$data->phone,1,0,'C');
            $this->Cell(20,10,$data->email,1,0,'C');
            $this->Cell(60,10,$data->password,1,0,'C');
            $this->Ln();
        }
    }

   }

 
   // Instantiation of FPDF class
   $pdf = new PDF();
 
   $pdf->AliasNbPages();
   $pdf->AddPage();
   //$pdf->headerTable();
   //$pdf->viewTable($db);
   $pdf->Output("ListeCOORDONNE.pdf","D");

?>