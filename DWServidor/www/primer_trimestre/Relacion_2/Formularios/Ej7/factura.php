<?php

$gastos = $_POST["gastos"];
$baseimponible = $_POST["baseimponible"]/100 * $gastos;
$totalfactura = $baseimponible + $gastos;

echo "El total de la factura es: $totalfactura euros";
