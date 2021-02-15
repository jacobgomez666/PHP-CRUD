<?php

class TallaClass
{
    private $idtalla;
    private $talla;

    function __construct()
    {
        $this->idtalla = 0;
        $this->talla = "";
    }

    function getIdTalla(){
        return $this->idtalla;
    }
    function getTalla(){
        return $this->talla;
    }

    function setIdtalla($idtalla){
        $this->idtalla = $idtalla;
    }

    function setTalla($talla){
        $this->talla = $talla;
    }
}