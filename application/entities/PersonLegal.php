<?php
namespace application\entities;

use application\entities\Client;

class PersonLegal extends Client
{
    /**
     * número do cpf
     *
     * @var string
     */
    private $cpf;
    /**
     * rg
     *
     * @var string
     */
    private $rg;
    /**
     * sexo
     *
     * @var string
     */
    private $sex;    
    /**
     * data de nascimento
     *
     * @var string
     */
    private $birthDate;

    /**
     * Classe construtora
     *
     * @param  string $cpf - cpf
     * @param  string $rg - rg
     * @param  string $sex - sexo
     * @param  string $birthDate - data de nascimento
     */
    public function __construct(string $cpf = "", string $rg = "", string $sex = "", string $birthDate = "") 
    {
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->sex = $sex;
        $this->birthDate = $birthDate;
    }

    /**
     * Get número do cpf
     *
     * @return  string
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set número do cpf
     *
     * @param  string  $cpf  número do cpf
     */ 
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * Get rg
     *
     * @return  string
     */ 
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set rg
     *
     * @param  string  $rg  rg
     */ 
    public function setRg(string $rg)
    {
        $this->rg = $rg;
    }

    /**
     * Get sexo
     *
     * @return  string
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set sexo
     *
     * @param  string  $sex  sexo
     */ 
    public function setSex(string $sex)
    {
        $this->sex = $sex;
    }

    /**
     * Get data de nascimento
     *
     * @return  string
     */ 
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set data de nascimento
     *
     * @param  string  $birthDate  data de nascimento
     */ 
    public function setBirthDate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }
}
?>
