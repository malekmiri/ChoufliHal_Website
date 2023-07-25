<?php
class reclamation {

      public $idReclamation=NULL; 
	  public $nom=NULL;
      public $email=NULL;
      //public $dateReclamation=NULL;
      public $objet=NULL;
      public $description=NULL;
      public $status=NULL;

      
	
		function __construct($idReclamation,$nom,$email,/*$dateReclamation,*/$objet,$description,$status){
			      $idReclamation=NULL;
			      $this->idReclamation=$idReclamation; 
			      $this->nom=$nom;
				  $this->email=$email; //deja initalisé dans le bd
				  $dateReclamation = date('Y-m-d ');
			      $this->dateReclamation = $dateReclamation;
                  /*$this->dateReclamation = new DateTime();
                  $this->dateReclamation = $this->dateReclamation->format('Y-m-d H:i:s');
                 */ 
				  $this->objet=$objet;
                  $this->description=$description;
                  $this->status=$status;

			      
		}


            function getIdReclamtion(){
			return $this->idReclamation;
		}
		
		function getDate(){
			//return $this->dateReclamation->format('Y-m-d');
			new DateTime($this->dateReclamation);

		}
		function getStatus(){
			return $this->status;
		}
            function getobjet(){
			return $this->objet;
		}
		function getDescription(){
			return $this->description;
		}


            function getIdClient(){
			return $this->idClient;
		}
		function getNom(){
			return $this->nom;
		}


        function setDate(){
                  $this->dateReclamation = new DateTime();
                  $this->dateReclamation = $this->dateReclamation->format('Y-m-d H:i:s');
		}
		
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setObjet(string $objet){
			$this->objet=$objet;
		}
		
		function setDescription(string $description){
			$this->description=$description;
		}
		function setStatus(string $status){
			$this->status=$status;
		}
            





            function getEmail(){
			return $this->email;
		}
            function setEmail(string $email){
			$this->email=$email;
		}
	}
?>