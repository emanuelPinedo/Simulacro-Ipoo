<?php
include_once 'ClaseCliente.php';
include_once 'ClaseVenta.php';
include_once 'ClaseMoto.php';
include_once 'ClaseEmpresa.php';

$objCliente1 = new Cliente('Tito', 'Calderon', true, 'DNI', 777);
$objCliente2 = new Cliente('Lionel', 'Messi', false, 'DNI', 10);

$objMoto1 = new Moto(11, 2230000, 2022, 'Benelli Imperiale 400', 85, true);
$objMoto2 = new Moto(12, 584000, 2021, 'Zanella Zr 150 Ohc', 70, true);
$objMoto3 = new Moto(13, 999900, 2023, 'Zanella Patagonian Eagle 250', 55, false);

$objEmpresa = new Empresa('Alta Gama', 'Av Argetina 123', [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

$importeVenta1 = $objEmpresa->registrarVenta([11, 12, 13], $objCliente2);
echo "\nImporte de la venta 1: " . $importeVenta1;
echo "\n";

$importeVenta2 = $objEmpresa->registrarVenta([12], $objCliente2);
echo "\nImporte de la venta 2: " . $importeVenta2;
echo "\n";

$importeVenta3 = $objEmpresa->registrarVenta([2], $objCliente2);
echo "\nImporte de la venta 3: " . $importeVenta3 . "\n";

$ventasCliente1 = $objEmpresa->retornarVentasXCliente('DNI', 10);
echo "\nVentas del cliente 1: \n";
foreach ($ventasCliente1 as $venta) {
    echo $venta . "\n";
}

$ventasCliente2 = $objEmpresa->retornarVentasXCliente('DNI', 777);
echo "\nVentas del cliente 2: \n";
foreach ($ventasCliente2 as $venta) {
    echo $venta . "\n";
}