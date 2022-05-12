<?php
namespace application\entities;

class Address 
{
    /**
     * cep
     *
     * @var string
     */
    private $zipCode;
    /**
     * rua
     *
     * @var string
     */
    private $road;    
    /**
     * número
     *
     * @var string
     */
    private $number;    
    /**
     * complemento
     *
     * @var string
     */
    private $complement;    
    /**
     * bairro
     *
     * @var string
     */
    private $district;    
    /**
     * cidade
     *
     * @var string
     */
    private $city;    
    /**
     * estado
     *
     * @var string
     */
    private $state;
    /**
     * latitude
     *
     * @var string
     */
    private $latitude;
    /**
     * longitude
     *
     * @var string
     */
    private $longitude;
    
    /**
     * Classe construtora
     *
     * @param  string $zipCode - cep
     * @param  string $road - rua
     * @param  string $number - número
     * @param  string $complement - complemento
     * @param  string $district - bairro
     * @param  string $city - cidade
     * @param  string $state - estado
     * @param  string $latitude - latitude
     * @param  string $longitude - longitude
     */
    public function __construct(string $zipCode = "", string $road = "", string $number = "", string $complement = "", string $district = "", string $city = "", string $state = "", string $latitude = "", string $longitude = "") 
    {
        $this->zipCode = $zipCode;
        $this->road = $road;
        $this->number = $number;
        $this->complement = $complement;
        $this->district = $district;
        $this->city = $city;
        $this->state = $state;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Get cep
     *
     * @return  string
     */ 
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set cep
     *
     * @param  string  $zipCode  cep
     */ 
    public function setZipCode(string $zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * Get rua
     *
     * @return  string
     */ 
    public function getRoad()
    {
        return $this->road;
    }

    /**
     * Set rua
     *
     * @param  string  $road  rua
     */ 
    public function setRoad(string $road)
    {
        $this->road = $road;
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

    /**
     * Get complemento
     *
     * @return  string
     */ 
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set complemento
     *
     * @param  string  $complement  complemento
     */ 
    public function setComplement(string $complement)
    {
        $this->complement = $complement;
    }

    /**
     * Get bairro
     *
     * @return  string
     */ 
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set bairro
     *
     * @param  string  $district  bairro
     */ 
    public function setDistrict(string $district)
    {
        $this->district = $district;
    }

    /**
     * Get cidade
     *
     * @return  string
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set cidade
     *
     * @param  string  $city  cidade
     */ 
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * Get estado
     *
     * @return  string
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set estado
     *
     * @param  string  $state  estado
     */ 
    public function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * Get latitude
     *
     * @return  string
     */ 
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     *
     * @param  string  $latitude  latitude
     */ 
    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get longitude
     *
     * @return  string
     */ 
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set longitude
     *
     * @param  string  $longitude  longitude
     */ 
    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;
    }
}
?>