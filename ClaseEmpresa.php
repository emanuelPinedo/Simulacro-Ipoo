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

    public function imprimirColeccion ($coleccion){
        $result = "";
        foreach ($coleccion as $coleccionActual) {
           $result .= $coleccionActual . "\n";
        }
        return $result;
    }

    public function verificarCole ($coleccion){
        if ($coleccion = "") {
            $coleccion = "Esta coleccion esta vacia.";
        }
    }

    //retorna el obj moto cuyo codigo coincide con el recibido
    public function retornarMoto($codigoMoto){
        $motoEncontrada = null; // null pq todavia no se encuentra la moto
        $cont = 0;
        $motos= $this->getColecMotos();
        $cantMotos = count($motos);

        while ($motoEncontrada === null && $cantMotos>$cont) {
            if ($motos[$cont]->getCodigo() === $codigoMoto) {
                $motoEncontrada = $motos[$cont];
            }
            $cont++;
        }
        return $motoEncontrada;
    }
    
    public function registrarVenta($colCodigosMoto, $objCliente){
        $importeFinal = 0;
        $fechaActual = date('Y');//2024

        if ($objCliente->getDadoBaja()) {
            return null;//Si el cliente esta dado de baja, retorna null.
        }

        $coleccionVentas = $this->getColecVentas();
        $numeroVenta = count($coleccionVentas) + 1;
        $coleccionMotosVenta = [];

        foreach ($colCodigosMoto as $codigoAct) {
            $moto = $this->retornarMoto($codigoAct);

            if ($moto !== null && $moto->getActiva()) {
                $precioVenta = $moto->darPrecioVenta();
                $importeFinal += $precioVenta;
                $coleccionMotosVenta[] = $moto;
            }
        }

        $venta = new Venta($numeroVenta, $fechaActual, $objCliente, $coleccionMotosVenta, $importeFinal);

        $coleccionVentas[] = $venta;
        $this->setColecVentas($coleccionVentas);

        return $venta;
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = []; //arreglo para almacenar las ventas del cliente
        $ventas = $this->getColecVentas();
        foreach ($ventas as $venta) {
            $clienteVenta = $venta->getRefCliente();
            if ( $clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNroDoc() === $numDoc ) {
                //el cliente coincide con lo buscado
                $ventasCliente[] = $venta; //se almacena la venta en el arreglo
            }
        }
        return $ventasCliente;
    }

    public function __toString(){
        $coleClientes = $this->imprimirColeccion($this->getColecClientes());
        $coleClientes = $this->verificarCole($coleClientes);

        $coleMotos = $this->imprimirColeccion($this->getColecMotos());
        $coleMotos = $this->verificarCole($coleMotos);

        $coleVentas = $this->imprimirColeccion($this->getColecVentas());
        $coleVentas = $this->verificarCole($coleVentas);


        return "Denominación: " . $this->getDenominacion() . 
        "\nDirección: " . $this->getDireccion() . 
        "\nClientes: " . $coleClientes . 
        "\nMotos: " .  $coleMotos . 
        "\nVentas: " . $coleVentas; 
    }

}