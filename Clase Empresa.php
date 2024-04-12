<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colecClientes;
    private $colecMotos;
    private $colecVentas;

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

    public function retornarMoto($codigoMoto)
    {
        $i = 0;
        $objRetorno = null;
        do {
            if ($this->getColecMotos()[$i]->getCodigo() == $codigoMoto) {
                $objRetorno = $this->getColecMotos()[$i];
            }
                $i++;
        } while ($i < count($this->getColecMotos()) && $objRetorno == null);
        return $objRetorno;
    }

    //
    public function registrarVenta($colCodigosMoto, $objCliente){
        $coleccionVentas = [];
        $impFinal = 0;
        foreach($colCodigosMoto as $code){
            $objMotoCode = $this->retornarMoto($code);
            if($objMotoCode != null && $objMotoCode->getDadoBaja() != false){
                array_push($coleccionVentas, [$this->retornarMoto($code), $objCliente]);
                $this->setColecVentas($coleccionVentas);

                $impFinal += $objMotoCode->getCosto();
            }
        }
        return $impFinal;
    }

    //
    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $coleccionCompraCliente = [];
        foreach ($this->getColecVentas() as $coleccionVenta) {
            if ($coleccionVenta[1]->getTipoDoc() == $tipo && $coleccionVenta[1]->getNumeroDocumentoInt() == $numDoc) {
                array_push($coleccionCompraCliente, $coleccionVenta);
            }
        }
        return $coleccionCompraCliente;
    }

    public function __toString(){
        "Denominación: " . $this->getDenominacion() . 
        "\nDirección: " . $this->getDireccion() . 
        "\nClientes: " . $this->getColecClientes() . 
        "\nMotos: " . $this->getColecMotos() . 
        "\nVentas: " . $this->getColecVentas(); 
    }

}