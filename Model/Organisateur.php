<?php
class Organisateur{
    private  $id_Organisateur ;
    private  $nom_Organisateur ;
    private   $num_Organisateur ;
    public function __construct($id_Organisateur=NULL,$nom_Organisateur,$num_Organisateur){
        $this->id_Organisateur= $id_Organisateur ; 
        $this->nom_Organisateur= $nom_Organisateur ; 
        $this->num_Organisateur= $num_Organisateur ;
    }
    public function getid_Organisateur(){
        return $this->id_Organisateur;
     }
    
    public function getnom_organisateur(){
        return $this->nom_Organisateur ;
     }
    public function setnom_organisateur(){
        return  $this->nom_Organisateur= $nom_Organisateur ;
        
     }
    
    public function getnum_organisateur(){
        return $this->num_Organisateur;   
     }
    public function setnum_organisateur(){
        $this->$num_Organisateur= $num_Organisateur;
        return $this ;
     }
    
}
?>