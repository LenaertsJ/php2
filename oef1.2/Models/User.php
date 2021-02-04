<?php


class User
{
    //Properties
    private $usr_id;
    private $usr_voornaam;
    private $usr_naam;
    private $usr_email;
    private $usr_telefoon;

    //Methods : getters and setters
    public function getUsrId()
    {
        return $this->usr_id;
    }

    public function setUsrId($usr_id)
    {
        $this->usr_id = $usr_id;
    }

    public function getUsrVoornaam()
    {
        return $this->usr_voornaam;
    }

    public function setUsrVoornaam($usr_voornaam)
    {
        $this->usr_voornaam = $usr_voornaam;
    }

    public function getUsrNaam()
    {
        return $this->usr_naam;
    }

    public function setUsrNaam($usr_naam)
    {
        $this->usr_naam = $usr_naam;
    }

    public function getUsrEmail()
    {
        return $this->usr_email;
    }

    public function setUsrEmail($usr_email)
    {
        $this->usr_email = $usr_email;
    }

    public function getUsrTelefoon()
    {
        return $this->usr_telefoon;
    }

    public function setUsrTelefoon($usr_telefoon)
    {
        $this->usr_telefoon = $usr_telefoon;
    }


}