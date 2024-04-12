<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colecClientes = [];
    private $colecMotos = [];
    private $colecVentas = [];

    public function __construct($denominacion,$direccion,$colecClientes,$colecMotos,$colecVentas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colecClientes = $colecClientes;
        $this->colecMotos = $colecMotos;
        $this->colecVentas = $colecVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColecClientes(){
        return $this->colecClientes;
    }

    public function getColecMotos(){
        return $this->colecMotos;
    }

    public function getColecVentas(){
        return $this->colecVentas;
    }

    public function setDenominacion($denom){
        $this->denominacion = $denom;
    }

    public function setDireccion($direc){
        $this->direccion = $direc;
    }

    public function setColecClientes($colClientes){
        $this->colecClientes = $colClientes;
    }

    public function setColecMotos($colMotos){
        $this->colecMotos = $colMotos;
    }

    public function setColecVentas($colVentas){
        $this->colecVentas = $colVentas;
    }

    public function retornarMoto($codigoMoto){
        $i = 0;
        $motosColec = $this->getColecMotos();
        $encontrado = false;
        while($i < count($this->getColecMotos()) && !$encontrado){
            if($motosColec->getCodigo() == $codigoMoto){
                $encontrado = true;
            } else {
                $i++;
            }
        }
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
        foreach ($colCodigosMoto as $codigoMoto){
            
        }

    }

    public function __toString(){
        "Denominación: " . $this->getDenominacion() . 
        "\nDirección: " . $this->getDireccion() . 
        "\nClientes: " . $this->getColecClientes() . 
        "\nMotos: " . $this->getColecMotos() . 
        "\nVentas: " . $this->getColecVentas(); 
    }

}