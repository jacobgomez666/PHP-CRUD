<?php

class GeneroClass
{
    private $idgenero;
    private $genero;

    function __construct()
    {
        $this->idgenero = 0;
        $this->genero = "";
    }

    function getIdgenero(){
        return $this->idgenero;
    }
    function getGenero(){
        return $this->genero;
    }

    function setNombre($id){
        $this->idgenero = $id;
    }

    function setEdad($genero){
        $this->genero = $genero;
    }
}
