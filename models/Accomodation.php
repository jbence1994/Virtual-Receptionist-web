<?php

/**
 * Szálláshely egyed
 */
class Accomodation {

    private $id;
    private $accomodation_name;
    private $company_name;
    private $contact;
    private $vat_number;
    private $headquarters;
    private $site;
    private $phone_number;
    private $email_address;

    public function __construct($id, $accomodation_name, $company_name, $contact, $vat_number, $headquarters, $site, $phone_number, $email_address) {
        $this->id = $id;
        $this->accomodation_name = $accomodation_name;
        $this->company_name = $company_name;
        $this->contact = $contact;
        $this->vat_number = $vat_number;
        $this->headquarters = $headquarters;
        $this->site = $site;
        $this->phone_number = $phone_number;
        $this->email_address = $email_address;
    }

    public function getId() {
        return $this->id;
    }

    public function getAccomodation_name() {
        return $this->accomodation_name;
    }

    public function getCompany_name() {
        return $this->company_name;
    }

    public function getContact() {
        return $this->contact;
    }

    public function getVat_number() {
        return $this->vat_number;
    }

    public function getHeadquarters() {
        return $this->headquarters;
    }

    public function getSite() {
        return $this->site;
    }

    public function getPhone_number() {
        return $this->phone_number;
    }

    public function getEmail_address() {
        return $this->email_address;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAccomodation_name($accomodation_name) {
        $this->accomodation_name = $accomodation_name;
    }

    public function setCompany_name($company_name) {
        $this->company_name = $company_name;
    }

    public function setContact($contact) {
        $this->contact = $contact;
    }

    public function setVat_number($vat_number) {
        $this->vat_number = $vat_number;
    }

    public function setHeadquarters($headquarters) {
        $this->headquarters = $headquarters;
    }

    public function setSite($site) {
        $this->site = $site;
    }

    public function setPhone_number($phone_number) {
        $this->phone_number = $phone_number;
    }

    public function setEmail_address($email_address) {
        $this->email_address = $email_address;
    }

}
