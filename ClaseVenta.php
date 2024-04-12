<?php
class Venta{
    private $numero;
    private $fecha;
    private $refCliente;
    private $refColecMotos;
    private $precioFinal;

    public function __construct($numero,$fecha,$refCliente,$refColecMotos,$precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->refCliente = $refCliente;
        $this->refColecMotos = $refColecMotos;
        $this->precioFinal = $precioFinal;
    }

    public function getNum(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getRefCliente(){
        return $this->refCliente;
    }

    public function getRefColecMotos(){
        return $this->refColecMotos;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNum($num){
        $this->numero = $num;
    }

    public function setFecha($fecha1){
        $this->fecha = $fecha1;
    }

    public function setRefCliente($clienteRef){
        $this->refCliente = $clienteRef;
    }

    public function setRefColecMotos($colecMotosRef){
        $this->refColecMotos = $colecMotosRef;
    }

    public function setPrecioFinal($finalPrecio){
        $this->precioFinal = $finalPrecio;
    }

    public function arrayMotos(){
        $res = '';
        $moto = $this->getRefColecMotos();
        foreach ($moto as $motoAct){
            $res .=$motoAct . "\n";
        }
        return $res;
    }

    public function incorporarMoto($objMoto){
        if ($objMoto->getActiva()){
            $this->refColecMotos[] = $objMoto;
            $this->precioFinal += $objMoto->darPrecioVenta();
        }

    }

    public function __toString() {

        $motos = $this->arrayMotos();
        if ($motos === ''){
            $motos = "No se vendió ninguna moto.";
        }

        return "Número: " . $this->getNum() . 
        "\nFecha: " . $this->getFecha() . 
        "\nReferencia al cliente: " . $this->getRefCliente() . 
        "\nReferencia a colección de motos: " . $motos . 
        "\nPrecio Final: " . $this->getPrecioFinal();
    }

}