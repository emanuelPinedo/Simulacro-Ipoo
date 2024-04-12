<?php
include_once 'ClaseCliente.php';
include_once 'ClaseVenta.php';
include_once 'ClaseMoto.php';
include_once 'ClaseEmpresa.php';

$objCliente1 = new Cliente('Tito', 'Calderon', false, 'DNI', 777);
$objCliente2 = new Cliente('Lionel', 'Messi', true, 'DNI', 10);

$objMoto1 = new Moto(11, 2230000, 2022, 'Benelli Imperiale 400', 85, true);
$objMoto2 = new Moto(12, 584000, 2021, 'Zanella Zr 150 Ohc', 70, true);
$objMoto3 = new Moto(13, 999900, 2023, 'Zanella Patagonian Eagle 250', 55, false);

$objEmpresa = new Empresa('Alta Gama', 'Av Argetina 123', [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

$coleccionCodigosMoto = [11, 12, 13];

echo "\n--------------------------------------------\n";

$registra1 = $objEmpresa->registrarVenta($coleccionCodigosMoto, $objCliente2);
echo "\nImporte de la venta 1: " . $registra1;

echo "\n--------------------------------------------\n";

$registra2 = $objEmpresa->registrarVenta([12], $objCliente2);
echo "\nImporte de la venta 2: " . $registra2;

echo "\n--------------------------------------------\n";

$registra3 = $objEmpresa->registrarVenta([2], $objCliente2);
echo "\nImporte de la venta 3: " . $registra3;

echo "\n--------------------------------------------\n";

echo "\nVentas del cliente 1: \n";
$ventasCliente1 = $objEmpresa->retornarVentasXCliente('DNI', 10);
foreach ($ventasCliente1 as $venta) {
    echo "\n". $venta . "\n";
}

echo "\n--------------------------------------------\n";

echo "\nVentas del cliente 2: \n";
$ventasCliente2 = $objEmpresa->retornarVentasXCliente('DNI', 777);
foreach ($ventasCliente2 as $venta) {
    echo "\n". $venta . "\n";
}

echo "\n--------------------------------------------\n";

echo $objEmpresa;

echo "\n--------------------------------------------\n";