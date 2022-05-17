<?php
namespace application\controllers;

use application\core\Controller;
use application\models\helpers\Request;
use application\models\entities\PersonLegal;
use application\models\entities\Email;
use application\models\entities\Address;
use application\models\entities\Phone;

class ExampleClientController extends Controller
{
    public function create()
    {
        /*
        $Request = new Request();
        $Request->add("name", "string");
        $Request->add("cpf", "string");
        $Request->add("rg", "string");
        $Request->add("sex", "string");
        $Request->add("birthDate", "string");
        $Request->add("email", "string");
        $Request->add("zipCode", "string");
        $Request->add("road", "string");
        $Request->add("number", "string");
        $Request->add("complement", "string");
        $Request->add("district", "string");
        $Request->add("city", "string");
        $Request->add("state", "string");
        $Request->add("latitude", "string");
        $Request->add("longitude", "string");
        $Request->add("phone_ddd", "string");
        $Request->add("phone_number", "string");
        $Request->add("cell_ddd", "string");
        $Request->add("cell_number", "string");
        $RequestResult = $Request->valid();

        if (!empty($RequestResult)) {
            $this->viewRequest($RequestResult);
        }

        $Email = new Email($_POST['email']);
        $Address = new Address($_POST['zipCode'], $_POST['road'], $_POST['number'], $_POST['complement'], $_POST['district'], $_POST['city'], $_POST['state'], $_POST['latitude'], $_POST['longitude']);        
        $Phone = new Phone($_POST['phone_ddd'], $_POST['phone_number']);        
        $Cell = new Phone($_POST['cell_ddd'], $_POST['cell_number']);

        $Client = new PersonLegal($_POST['cpf'], $_POST['rg'], $_POST['sex'], $_POST['birthDate']);
        $Client->setName($_POST['name']);
        $Client->setEmail($Email);
        $Client->setAddress($Address);
        $Client->setPhone($Phone);
        $Client->setCell($Cell);
        */

        $Email = new Email();
        $Email->setEmail("alexandre_lucas_figueiredo@homail.com");

        $Address = new Address();
        $Address->setZipCode("79073-144");
        $Address->setRoad("Rua Curvelos");
        $Address->setNumber("974");
        $Address->setComplement("Sem complemento");
        $Address->setDistrict("Jardim Centro Oeste");
        $Address->setCity("Campo Grande");
        $Address->setState("MS");
        $Address->setLatitude("888888");
        $Address->setLongitude("999999");        
        
        $Phone = new Phone();
        $Phone->setDdd("67");
        $Phone->setNumber("3821-5122");

        $Cell = new Phone();
        $Cell->setDdd("67");
        $Cell->setNumber("98791-8283");

        $Client = new PersonLegal();
        $Client->setName("Alexandre Lucas Gustavo Figueiredo");
        $Client->setCpf("688.698.765-86");
        $Client->setRg("22.234.033-2");
        $Client->setSex("Masculino");
        $Client->setBirthDate("02/04/1959");
        $Client->setEmail($Email);
        $Client->setAddress($Address);
        $Client->setPhone($Phone);
        $Client->setCell($Cell);

        $Client->create();
    }
}