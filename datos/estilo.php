<?php
class EstiloClass
{
    private $idestilo;
    private $estilo;

    function __construct()
    {
        $this->idestilo = 0;
        $this->estilo = "";
    }

    function getIdestilo(){
        return $this->idestilo;
    }
    function setIdestilo($idestilo){
        $this->idestilo = $idestilo;
    }

    function getEstilo(){
        return $this->estilo;
    }
    function setEstilo($estilo){
        $this->estilo = $estilo;
    }
}
