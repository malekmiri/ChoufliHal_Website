<?php
class fonction
{
    private ?int $id = null;
    private ?string $nom_fonction = null;



    public function __construct($id=null,$nom_fonction)
    {
        $this->id = $id;
      
        $this->nom_fonction = $nom_fonction;

    }

    
    public function getIdfonction()
    {
        return $this->id;
    }

    
    public function getnom_fonction()
    {
        return $this->nom_fonction;
    }

    public function setnom_fonction($nom_fonction)
    {
        $this->nom_fonction = $nom_fonction;

        return $this;
    }
}