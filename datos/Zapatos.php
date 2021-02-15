<?php

class ZapatoClass
{
    private $idzapato;
    private $foto;
    private $precio;
    private $color;
    private $cantidad;
    private $id_usuario;

    //foreaneas de tablas relacionadas
    private $idestilo;
    private $idtalla;
    private $idgenero;
    

    public function __construct()
    {
        $this->idzapato = 0;
        $this->foto     = "";
        $this->color    = "";
        $this->cantidad = 0;

        $this->idestilo = 0;
        $this->idtalla  = 0;
        $this->idgenero = 0;
        $this->precio   = 0;
    }

    function getIdzapato(){
        return $this->idzapato;
    }
    function setIdzapato($idzapato){
        $this->idzapato = $idzapato;
    }

    
    function getFoto(){
        return $this->foto;
    }
    function setFoto($foto){
        $this->foto = $foto;
    }


    function getPrecio(){
        return $this->precio;
    }
    function setPrecio($precio){
        $this->precio = $precio;
    }
    

    function getColor(){
        return $this->color;
    }
    function setColor($color){
        $this->color = $color;
    }


    function getCantidad(){
        return $this->cantidad;
    }
    function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }


    function getIdUsuario(){
        return $this->id_usuario;
    }
    function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    


    function getIdestilo(){
        return $this->idestilo;
    }
    function setIdestilo($idestilo){
        $this->idestilo = $idestilo;
    }


    function getIdtalla(){
        return $this->idtalla;
    }
    function setIdtalla($idtalla){
        $this->idtalla = $idtalla;
    }

    function getIdgenero(){
        return $this->idgenero;
    }
    function setIdgenero($idgenero){
        $this->idgenero = $idgenero;
    }
}
