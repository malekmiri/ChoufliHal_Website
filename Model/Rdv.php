<?php
class Rdv

{
    private ?int $Id_rdv;
    private ?int $id_srv; 
    private DateTime $dateR;
    private DateTime $dStart;
    private DateTime $dEnd;
    private int $duree;
    private string $mStatus;
    private string $rStatus;

    private const M_STATUS_VALUES = ['Emergency', 'Normal'];

    private const R_STATUS_VALUES = ['Confirm', 'Cancel', 'Report'];

    public function __construct(?int $Id_rdv,?int $id_srv ,DateTime $dateR,DateTime $dStart,DateTime $dEnd, int $duree, string $mStatus, string $rStatus)
    {
        $this->Id_rdv = $Id_rdv;
        $this->id_srv = $id_srv;
        $this->dateR = $dateR;
        $this->dStart = $dStart;
        $this->dEnd = $dEnd;

        $this->duree = $duree;
         // Vérifier si la valeur de mStatus est autorisée
         if (!in_array($mStatus, self::M_STATUS_VALUES)) {
            throw new InvalidArgumentException("Invalid mStatus value: $mStatus");
        }
        $this->mStatus = $mStatus;

        // Vérifier si la valeur de rStatus est autorisée
        if (!in_array($rStatus, self::R_STATUS_VALUES)) {
            throw new InvalidArgumentException("Invalid rStatus value: $rStatus");
        }
        $this->rStatus = $rStatus;

          // $this->mStatus = $mStatus;
        // $this->rStatus = $rStatus;
    }
    
    /****************

    

    public function setIdSrv($id_srv)
    {
        $this->id_srv = $id_srv;
    }*/

    /**
     * Set the value of id_srv
     *
     * @return  self
     */
    public function getIdSrv()
    {
        return $this->id_srv;
    }

      /**
     * Set the value of id_srv
     *
     * @return  self
     */
    public function setIdSrv($id_srv)
    {
        $this->id_srv = $id_srv;

        return $this;
    }

    /**
     * Get the value of Id_rdv
     */
    public function getId_rdv()
    {
        return $this->Id_rdv;
    }

    /**
     * Get the value of dateR
     */
    public function getDateR()
    {
        return $this->dateR;
    }

    /**
     * Set the value of dateR
     *
     * @return  self
     */
    public function setDate($dateR)
    {
        $this->dateR = $dateR;

        return $this;
    }

     /**
     * Get the value of 
     */
    public function getDStart()
    {
        return $this->dStart;
    }

    /**
     * Set the value of 
     *
     * @return  self
     */
    public function setDStart($dStart)
    {
        $this->dStart = $dStart;

        return $this;
    }

     /**
     * Get the value of dateR
     */
    public function getDEnd()
    {
        return $this->dEnd;
    }

    /**
     * Set the value of dateR
     *
     * @return  self
     */
    public function setDEnd($dEnd)
    {
        $this->dEnd = $dEnd;

        return $this;
    }

    /**
     * Get the value of duree
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of mStatus
     */
    public function getMStatus()
    {
        return $this->mStatus;
    }

    /**
     * Set the value of mStatus
     *
     * @return  self
     */
    public function setMStatus($mStatus)
    {
        $this->mStatus = $mStatus;

        return $this;
    }

    /**
     * Get the value of rStatus
     */
    public function getRStatus()
    {
        return $this->rStatus;
    }

    /**
     * Set the value of rStatus
     *
     * @return  self
     */
    public function setRStatus($rStatus)
    {
        $this->rStatus = $rStatus;

        return $this;
    }
}


