<?php
class Event{
    private  $id_Event = null;
    private  $nom_Event ;
    private   $date_Event ;
    private   $type_Event ;
    private $interested;
    public function __construct($id_Event=NULL,$nom_Event,$date_Event,$type_Event){
        $this->id_Event= $id_Event ; 
        $this->nom_Event= $nom_Event ; 
        $this->date_Event= $date_Event ;
        $this->type_Event= $type_Event ;
      //  $this->interested= $interested ;
    }
    public function getid_Event(){
        return $this->id_Event;
     }
    
    public function getnom_Event(){
        return $this->nom_Event ;
     }
    public function setnom_Event($nom_Event){
        $this->nom_Event= $nom_Event ;
        return $this ;
     }
    public function getdate_Event(){
        return $this->date_Event ;
     }
    public function setdate_Event($date_Event){
        $this->date_Event= $date_Event ;
        return $this ;
     }
    public function gettype_Event(){
        return $this->type_Event;   
     }
    public function settype_Event($type_Event){
        $this->type_Event= $type_Event;
        return $this ;
     }
     public function getInterested(){
        return $this->interested;   
    }
    
    public function setInterested($interested){
        $this->interested= $interested;
        return $this ;
    }
    
}
?>