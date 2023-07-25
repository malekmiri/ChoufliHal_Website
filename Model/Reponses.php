<?php
class reponse {
      public $dateReponse;
      public $idReponse; 
      public $idReclamation;
      public $descriptionR;

            
      function __construct($idReponse,$idReclamation,$description){
            $this->idReponse=$idReponse; //deja initalisé dans le bd
            $this->idReclamation=$idReclamation; 
            $this->descriptionR=$description;
      }


      function getIdReclamation(){
            return $this->idReclamation;
      }
      function getIdReponse(){
            return $this->idReponse;
      }
      
      function getDateR(){
            return $this->dateReponse->format('Y-m-d');
      }
      function getDescriptionR(){
            return $this->descriptionR;
      }

      function setDateReponse(){
            $this->dateReponse = new DateTime();
            $this->dateReponse = $this->dateReponse->format('Y-m-d H:i:s');
      }

      function setDescriptionR(string $description){
            $this->descriptionR=$description;
      }
}
?>