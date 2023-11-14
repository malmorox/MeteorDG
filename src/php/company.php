<?php

class Company {
    private $logo;
    private $nif;
    private $name;
    private $type;
    private $country;
    private $legalAddress;
    private $phone;
    private $email;

    //constructor
    public function __construct($logo, $nif, $name, $type, $country, $legalAddress, $phone, $email) {
        $this->logo = $logo;
        $this->nif = $nif;
        $this->name = $name;
        $this->type = $type;
        $this->country = $country;
        $this->legalAddress = $legalAddress;
        $this->phone = $phone;
        $this->email = $email;
    }

    //getters
    public function getLogo() {
        return $this->logo;
    }

    public function getNif() {
        return $this->nif;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getLegalAddress() {
        return $this->legalAddress;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }
}

$ejemplo = new Company('logo.png', '123456789A', 'My Company', 'Public Limited Company', 'United States', '123 Example Street', '123456789', 'info@mycompany.com');



?>