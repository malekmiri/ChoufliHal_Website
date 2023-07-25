<?php
class LivraisonM
{
    private ?int $IdCommande = null;
    private ?int $IdLivreur = null;
    private ?string $Destinaire = null;
    private ?DateTime $DateLivraison = null;
    private ?string $Adresse = null;

    public function __construct($id = null, $il = null, $ds = null, $dl = null,$ad=null)
    {
        $this->IdCommande = $id;
        $this->IdLivreur = $il;
        $this->Destinataire = $ds;
        $this->DateLivraison = $dl;
        $this->Adresse = $ad;
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
    public function getIdLivreur()
    {
        return $this->IdLivreur;
    }

    /**
     * Set the value of idlivreur
     *
     * @return  self
     */
    public function setIdLivreur($IdLivreur)
    {
        $this->IdLivreur = $IdLivreur;

        return $this;
    }


    /**
     * Get the value of NomLivreur
     */
    public function getDestinataire()
    {
        return $this->Destinataire;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setDestinataire($Destinaire)
    {
        $this->Destinataire= $Destinaire;

        return $this;
    }

  
    /**
     * Get the value of dl
     */
    public function getDob()
    {
        return $this->DateLivraison;
    }

    /**
     * Set the value of dl
     *
     * @return  self
     */
    public function setDob($DateLivraison)
    {
        $this->dl = $DateLivraison;

        return $this;
    }

    
    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setAdresse($Adresse)
    {
        $this->Adresse= $Adresse;

        return $this;
    }

}
