<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $dadoBaja;
    private $tipoDoc;
    private $nroDoc;

    //metodo constructor
    public function __construct($nombre,$apellido,$dadoBaja,$tipoDoc,$nroDoc){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoBaja = $dadoBaja;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDadoBaja(){
        return $this->dadoBaja;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }

    public function getNroDoc(){
        return $this->nroDoc;
    }

    public function setNombre($nombre1){
        $this->nombre = $nombre1;
    }

    public function setApellido($apellido1){
        $this->apellido = $apellido1;
    }

    public function setDadoBaja($dadoBaja1){
        $this->dadoBaja = $dadoBaja1;
    }

    public function setTipoDoc($tipoDoc1){
        $this->tipoDoc = $tipoDoc1;
    }

    public function setNroDoc($nroDoc1){
        $this->nroDoc = $nroDoc1;
    }
    
    public function __toString() {
        return "Nombre: " . $this->getNombre() .
        "\nApellido: " . $this->getApellido() . 
        "\nEstado: " . $this->getDadoBaja() . 
        "\nTipo de Documento: " . $this->getTipoDoc() .
        "\nNúmero de Documento: " . $this->getNroDoc();
    }

}