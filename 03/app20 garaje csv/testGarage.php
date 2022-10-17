<?php

// En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
// métodos.

include_once("auto.php");
include_once("garage.php");

// ● Crear dos objetos “Auto” de la misma marca y distinto color.

$auto1 = new Auto("audi", "blanco", "25000");
$auto2 = new Auto("audsi", "verde", "25000");
// ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$auto3 = new Auto("misni", "negro", "25000");
$auto4 = new Auto("mini", "negro", "85000");

// ● Crear un objeto “Auto” utilizando la sobrecarga restante.
$auto5 = new Auto("ferrari", "verde", "25000", new DateTime("1995"));
$auto6 = new Auto("ford", "azul", "25000", new DateTime("1995"));

// ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

// ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
// resultado obtenido.
echo $auto3->add($auto3, $auto4);

// ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.

if ($auto1->Equals($auto1, $auto5)) {
    echo "son iguales";
} else {
    echo "no son iguales";
}


$garage = new Garage("garage", 25);
$garage2 = new Garage("garageaaaaa", 2875);

$garage->Add($auto1);
$garage->Add($auto2);
$garage->Add($auto3);
$garage->Add($auto4);
$garage->Add($auto5);
$garage->Add($auto6);

$garage2->Add($auto1);
$garage2->Add($auto2);
$garage2->Add($auto3);
$garage2->Add($auto4);
$garage2->Add($auto5);
$garage2->Add($auto6);

$garage->MostrarGarage();

$garage->Add($auto5);

// $garage->MostrarGarage();


$garage->remove($auto5);

// $garage->MostrarGarage();

// ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
// 5)


// Auto::MostrarAuto($auto1);
// Auto::MostrarAuto($auto3);
// Auto::MostrarAuto($auto5);


$ruta = "autos.csv";
$arrayDeAutos = [$auto1, $auto2, $auto5, $auto6];
var_dump($arrayDeAutos);
// Auto::guardarArrayCompletCSV($arrayDeAutos, $ruta);
echo "</br></br></br></br></br></br>";
// $arrayLeido = Auto::LeerCSV($ruta);

// foreach ($arrayLeido as $auto) {

//     $auto::MostrarAuto($auto);
// }
// Garage::guardarGarageCompletoCSV($garage, "garage.csv");
// Garage::guardarGarageCompletoCSV($garage2, "garage.csv");

echo "<br><br>Garage Loaded From CSV";
echo "</br></br></br></br></br></br>";
Garage::CSVAGarage()->MostrarGarage();

// carga entidades
// lee entidades
// carga de archivos lectura de archivos
