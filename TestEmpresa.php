<?php
include_once 'Clase Cliente.php';
include_once 'Clase Venta.php';
include_once 'Clase Moto.php';
include_once 'Clase Empresa.php';

$objCliente1 = new Cliente('Tito','Calderon',true,'DNI',777);
$objCliente2 = new Cliente('Lionel','Messi',false,'DNI',10);

$objMoto1 = new Moto(11,2230000,2022,'Benelli Imperiale 400',85,true);
$objMoto2 = new Moto(12,584000,2021,'Zanella Zr 150 Ohe',70,true);
$ojbMoto3 = new Moto(13,999900,2023,'Zanella Patagonian Eagle 250',55,false);

$objEmpresa = new Empresa('Alta Gama','Av Argentina 123',[$objMoto1,$objMoto2,$ojbMoto3],[$objCliente1,$objCliente2],[]);

$objEmpresa->registrarVenta([11, 13], $objCliente1);

$objEmpresa->retornarVentasXCliente('dni', 777);