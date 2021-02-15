<?php

class UserClass
{
    private $id;
    private $nameUser;
    private $passwoord;
    private $rol;

    function __construct()
    {
        $this->id = 0;
        $this->nameUser  = "";
        $this->passwoord = "";
    }

    function getId(){
        return $this->id;
    }

    function getNameUser(){
        return $this->nameUser;
    }

    function getPasswoord(){
        return $this->passwoord;
    }

    function getRol(){
        return $this->rol;
    }


    function setId($id){
        $this->id = $id;
    }

    function setNameUser($nameUser){
        $this->nameUser = $nameUser;
    }

    function setPasswoord($passwoord){
        $this->passwoord = $passwoord;
    }

    function setRol($rol){
        $this->rol = $rol;
    }
}
