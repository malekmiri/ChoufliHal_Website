<?php

class produit
{
    private $id;
    private $nom;
    private $prix;
    private $image;
    private $description;




    public function getid()
    {
        return $this->id;
    }

    public function getnom()
    {
        return $this->nom;
    }
    public function getprix()
    {
        return $this->prix;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function getUrlImage()
    {
        return $this->urlImage;
    }
    public function getNotifCreateur()
    {
        return $this->notifCreateur;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;
    }
    public function setprix($prix)
    {
        $this->prix = $prix;
    }
    public function setimage($image)
    {
        $this->image = $image;
    }
    public function setdescription($description)
    {
        $this->description = $description;
    }


    public function __construct($id,$nom, $prix, $image, $description)
    { $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->image = $image;
        $this->description = $description;

    }
}
