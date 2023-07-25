<?php
class user
{
    private ?int $id_user = null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $phone = null;
    private ?string $email_user = null;
    private ?string $password_user = null;
    private ?int $role_user= null;


    public function __construct($id_user=null, $n, $p, $phone, $email_user,$password_user)
    {
        $this->id_user = $id_user;
        $this->lastName = $n;
        $this->firstName = $p;
        $this->phone = $phone;
        $this->email_user = $email_user;
        $this->password_user = $password_user;

    }

    
    public function getid_user()
    {
        return $this->id_user;
    }

public function getrole_user()
{
    return $this->role_user;
}    
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getphone()
    {
        return $this->phone;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setphone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getemail_user()
    {
        return $this->email_user;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setemail_user($email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }
    public function getpassword_user()
    {
        return $this->password_user;
    }
    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setpassword_user($password_user)
    {
        $this->password_user = $password_user;

        return $this;
    }
   

    
  
}
?>