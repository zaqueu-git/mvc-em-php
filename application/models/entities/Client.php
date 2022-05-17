<?php
namespace application\models\entities;

use application\models\dao\ExampleClientDAO;

class Client
{
    /**
     * código
     *
     * @var int
     */
    private $code;
    /**
     * nome
     *
     * @var string
     */
    private $name;
    /**
     * e-mail
     *
     * @var object
     */
    private $email;
    /**
     * endereço
     *
     * @var object
     */
    private $address;
    /**
     * telefone
     *
     * @var object
     */
    private $phone;
    /**
     * celular
     *
     * @var object
     */
    private $cell;
    
    /**
     * Classe construtora
     *
     * @param  int $code - código
     * @param  string $name - nome
     * @param  object $email - email
     * @param  object $address - endereço
     * @param  object $phone - telefone
     * @param  object $cell - celular
     */
    public function __construct(int $code = 0, string $name = "", object $email = null, object $address = null, object $phone = null, object $cell = null) 
    {
        $this->code = $code;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->cell = $cell;
    }
    /**
     * Get código
     *
     * @return  string
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set código
     *
     * @param  string  $code  código
     */ 
    public function setCode(string $code)
    {
        $this->code = $code;
    }
    
    /**
     * Get nome
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nome
     *
     * @param  string  $name  nome
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get e-mail
     *
     * @return  object
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set e-mail
     *
     * @param  object  $email  e-mail
     */ 
    public function setEmail(object $email)
    {
        $this->email = $email;
    }

    /**
     * Get endereço
     *
     * @return  object
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set endereço
     *
     * @param  object  $address  endereço
     */ 
    public function setAddress(object $address)
    {
        $this->address = $address;
    }

    /**
     * Get telefone
     *
     * @return  object
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set telefone
     *
     * @param  object  $phone  telefone
     */ 
    public function setPhone(object $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get celular
     *
     * @return  object
     */ 
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set celular
     *
     * @param  object  $cell  celular
     */ 
    public function setCell(object $cell)
    {
        $this->cell = $cell;
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $ExampleClientDAO = new ExampleClientDAO();
        $ExampleClientDAO->create($this);
    }  
}
?>
