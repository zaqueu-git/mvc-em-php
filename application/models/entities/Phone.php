<?php
namespace application\models\entities;

class Phone 
{
    /**
     * discagem direta à distância
     *
     * @var string
     */
    private $ddd;
    /**
     * número
     *
     * @var string
     */
    private $number;
    
    /**
     * Classe construtora
     *
     * @param  string $number - número
     */
    public function __construct(string $ddd = "", string $number = "")
    {
        $this->ddd = $ddd;
        $this->number = $number;
    }

    /**
     * Get discagem direta à distância
     *
     * @return  string
     */ 
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * Set discagem direta à distância
     *
     * @param  string  $ddd  discagem direta à distância
     */ 
    public function setDdd(string $ddd)
    {
        $this->ddd = $ddd;
    }

    /**
     * Get número
     *
     * @return  string
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set número
     *
     * @param  string  $number  número
     */ 
    public function setNumber(string $number)
    {
        $this->number = $number;
    }
}
?>
