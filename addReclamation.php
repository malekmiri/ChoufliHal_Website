<?php 


// include '../Controller/ReclamationsC.php';
include ('C:\xampp\htdocs\Project\Controller\ReclamationsC.php');
 
$error = "";
$test = false;
$keys = array_keys($_POST);
//var_dump($_POST);
for ($i = 0; $i < count($keys); $i++) {
    if ($_POST[$keys[$i]] === '') {
        $test = true;
        break;
    }
}
   
 if($test) { echo '<h1>Champs manquants</h1>';} 
else { ?>
<table border="1">
    <tr>
        <td>Nom</td>
        <td>Email</td>
        <td>Subject</td>
        <td>Message</td>
    </tr>
    <tr>
        <td>
            <?php {echo $_POST['name'];} ?>
        </td>
        <td>
            <?php {echo $_POST['email'];} ?>
        </td>
        <td>
            <?php if(isset($_POST['subject'])){echo $_POST['subject'];} ?>
        </td>
        <td>
            <?php if(isset($_POST['description'])){echo $_POST['description'];} ?>
        </td>
    </tr>
</table>
<?php } ?>
<?php
// create reclamation
 $reclamation = null;

 // create an instance of the controller
 $reclamationC = new reclamationC();
 if (
     isset($_POST['name']) &&
     isset($_POST['email']) &&		
     isset($_POST['subject']) && 
     isset($_POST['description'])
    
 ) {  var_dump($_POST);
     if (
         !empty($_POST['name']) && 
         !empty($_POST['email']) &&
         !empty($_POST['subject']) && 
         !empty($_POST['description']) 
        
     ) {
        $idReclamation=NULL; 
        //$dateReclamation = date('Y-m-d');
        //$date = new DateTime($dateReclamation);
        $status="en attente";
        $reclamation = new reclamation($idReclamation,$_POST['name'],$_POST['email'],$_POST['subject'],$_POST['description']/*,"en attente"*/);
         //var_dump($_POST);
         
         $reclamationC->addReclamation($reclamation);
         print_r($_POST);
         var_dump($reclamation);
         //header('Location:ListeReclamation.php');
     }
     else{
        //var_dump($_POST);
     echo 'Error: ' . $e->getMessage() . '<br>';
     echo 'Query: ' . $sql . '<br>';
     echo 'Params: ' . print_r($params, true) . '<br>';}
 }
    
?>