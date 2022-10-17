<?php

// Aplicación Nº 5 (Números en letras)   Andrea Briceño

// Realizar un programa que en base al valor numérico de una variable ​$num​, pueda mostrarse
// por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
// entre el 20 y el 60.
// Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”

$num = 29;
$numString = (string) $num;
$unidad = substr($numString, -1);

switch ($num) {
    case $num > 19 && $num < 30:

        echo "veinti";

        break;
    case $num > 29 && $num < 40:
        echo " treinta ";

        break;
    case $num > 39 && $num < 50:

        echo "cuarenta";
        break;
    case $num > 49 && $num < 60:

        echo "cincuenta";
        break;
}

if ($num > 29) {
    echo " y ";
}
switch ($unidad) {
    case '1':
        echo "  uno";
        break;
    case '2':
        echo " dos";
        break;
    case '3':
        echo "tres";
        break;
    case '4':
        echo "cuatro";
        break;
    case '5':
        echo "cinco";
        break;
    case '6':
        echo "seis";
        break;
    case '7':
        echo "siete";
        break;
    case '8':
        echo "ocho";
        break;
    case '9':
        echo "nueve";
        break;
}
