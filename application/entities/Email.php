<?php
namespace application\entities;

class Email 
{
    /**
     * e-mail
     *
     * @var string
     */
    private $email;
    
    /**
     * Classe construtora
     *
     * @param  string $email - email
     */
    public function __construct(string $email = "") 
    {
        $this->email = $email;
    }

    /**
     * Get e-mail
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set e-mail
     *
     * @param  string  $email  e-mail
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
?>
