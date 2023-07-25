<?php
class commandeM
{
    private ?int $IdCommande = null;
    private ?int $IdUser = null;
    private ?DateTime $DateCommande = null;


    public function __construct($id = null, $iu = null, $dc = null)
    {
        $this->IdCommande = $id;
        $this->IdUser = $iu;
        $this->DateCommande = $dc;
    }

    /**
     * Get the value of idCommande
     */
    public function getIdCommande()
    {
        return $this->IdCommande;
    }

    /**
     * Get the value of idlivreur
     */
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of idlivreur
     *
     * @return  self
     */
    public function setIdUser($IdUser)
    {
        $this->IdUser = $IdUser;

        return $this;
    }


  
    /**
     * Get the value of dl
     */
    public function getDco()
    {
        return $this->DateCommande;
    }

    /**
     * Set the value of dl
     *
     * @return  self
     */
    public function setDco($DateCommande)
    {
        $this->dc = $DateCommande;

        return $this;
    }

    

}
