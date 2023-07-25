<?php
class Srv
{
    private ?int $id_srv = null;
    // private ?int $idRdv = null;
    private ?string $type;
    private ?string $mode;
    private ?int $freq = null;
    private ?float $couts = null;
    private ?string $description = null;


    private const TYPE_VALUES = ['Basic', 'Standard', 'Premium', 'Platinum'];

    private const MODE_VALUES = ['Virtual', 'Physical'];


    public function __construct(?int $id_srv = null, string $type, string $mode, int $freq, float $couts, string $description)
    {
        $this->id_srv = $id_srv;
        // $this->idRdv = $idRdv;
        // $this->dateR = $dateR;
        // $this->duree = $duree;

         // Vérifier si la valeur de type est autorisée
         if (!in_array($type, self::TYPE_VALUES)) {
            throw new InvalidArgumentException("Invalid type value: $type");
        }
        $this->type = $type;

        // Vérifier si la valeur de mode est autorisée
        if (!in_array($mode, self::MODE_VALUES)) {
            throw new InvalidArgumentException("Invalid mode value: $mode");
        }
        $this->mode = $mode;

          // $this->mStatus = $mStatus;
        // $this->rStatus = $rStatus;

                 $this->freq = $freq;
                 $this->couts = $couts;
                 $this->description = $description;

    }
    

    /**
     * Get the value of id_srv
     */
    public function getIdSrv()
    {
        return $this->id_srv;
    }

    /**
     * Get the value of idRdv
     */
    // public function getidRdv()
    // {
        // return $this->idRdv;
    // }

    /**
     * Set the value of idRdv
     *
     * @return  self
     */
    // public function setidRdv($idRdv)
    // {
    //   $this->idRdv = $idRdv;

        // return $this;
    // }
    
    /**
     * Get the value of type
     */
    public function gettype()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     * @return self
     * ('Basic', 'Standard', 'Premium', 'Platinum')
     */
    public function settype($type) {
        if ($type === 'Basic' || $type === 'Standard' || $type === 'Premium' || $type === 'Platinum') {
            $this->type = $type;
        } else {
            throw new InvalidArgumentException('Invalid mode value: ' . $type);
        }
        return $this;
    }

    /**
     * Get the value of mode
     */
    public function getmode()
    {
        return $this->mode;
    }

    
    /**
     * Set the value of mode
     * @return self
     */
    public function setmode($mode) {
        if ($mode === 'Virtual' || $mode === 'Physical') {
            $this->mode = $mode;
        } else {
            throw new InvalidArgumentException('Invalid mode value: ' . $mode);
        }
        return $this;
    }


    /**
     * Get the value of freq
     */
    public function getfreq()
    {
        return $this->freq;
    }
   
    /**
     * Set the value of freq
     * @return self
     */
    public function setfreq($freq)
    {
        $this->freq = $freq;
        return $this;
    }

    /**
     * Get the value of couts
     */
    public function getcouts()
    {
        return $this->couts;
    }

     /**
     * set the value of couts
     * @return self
     */
    public function setcouts($couts)
    {
        $this->couts = $couts;
        return $this;
    }


    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }


    /**
     * set the value of description
     * @return self
     */

     public function setdescription($description)
     {
         $this->description = $description;
         return $this;
     }

}


