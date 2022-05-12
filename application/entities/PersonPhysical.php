<?php
namespace application\entities;

use application\entities\Client;

class PersonPhysical extends Client
{
    /**
     * número do cnpj
     * @var string
     */
    private $cnpj;
    /**
     * inscrição estadual
     * @var string
     */
    private $stateRegistration;
    /**
     * razão social
     *
     * @var string
     */
    private $corporateName;
    /**
     * nome fantasia
     *
     * @var string
     */
    private $fantasyName;
    
    /**
     * Classe construtora
     *
     * @param  string $cnpj - cnpj
     * @param  string $corporateName - nome da empresa
     * @param  string $fantasyName - nome fantasia
     */
    public function __construct(string $cnpj = "", string $stateRegistration = "", string $corporateName = "", string $fantasyName = "") 
    {
        $this->cnpj = $cnpj;
        $this->stateRegistration = $stateRegistration;
        $this->corporateName = $corporateName;
        $this->fantasyName = $fantasyName;
    }

    /**
     * Get número do cnpj
     *
     * @return  string
     */ 
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set número do cnpj
     *
     * @param  string  $cnpj  número do cnpj
     */ 
    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * Get inscrição estadual
     *
     * @return  string
     */ 
    public function getStateRegistration()
    {
        return $this->stateRegistration;
    }

    /**
     * Set inscrição estadual
     *
     * @param  string  $stateRegistration  inscrição estadual
     */ 
    public function setStateRegistration(string $stateRegistration)
    {
        $this->stateRegistration = $stateRegistration;
    }

    /**
     * Get razão social
     *
     * @return  string
     */ 
    public function getCorporateName()
    {
        return $this->corporateName;
    }

    /**
     * Set razão social
     *
     * @param  string  $corporateName  razão social
     */ 
    public function setCorporateName(string $corporateName)
    {
        $this->corporateName = $corporateName;
    }

    /**
     * Get nome fantasia
     *
     * @return  string
     */ 
    public function getFantasyName()
    {
        return $this->fantasyName;
    }

    /**
     * Set nome fantasia
     *
     * @param  string  $fantasyName  nome fantasia
     */ 
    public function setFantasyName(string $fantasyName)
    {
        $this->fantasyName = $fantasyName;
    }
}
?>
