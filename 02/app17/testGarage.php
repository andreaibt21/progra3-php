<?php

// En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
// métodos.

include_once("auto.php");
include_once("garage.php");


$auto1 = new Auto("audi", "blanco", "25000");
$auto2 = new Auto("ford", "azul", "25000");
$auto3 = new Auto("mini", "negro", "25000");
$auto4 = new Auto("mini", "negro", "25000");
$auto5 = new Auto("ferrari", "verde", "25000", new DateTime("1995"));

$auto1->AgregarImpuestos(250);

$garage = new Garage("garage", 25);

$garage->Add($auto1);
$garage->Add($auto1);
$garage->Add($auto1);
$garage->Add($auto1);

$garage->MostrarGarage();

$garage->Add($auto5);

$garage->MostrarGarage();


$garage->remove($auto5);

$garage->MostrarGarage();






// carga entidades
// lee entidades
// carga de archivos lectura de archivos