<?php

// Aplicación No 12 (Invertir palabra) Andrea briceño
// Realizar el desarrollo de una función que reciba un Array de caracteres y 
// que invierta el orden
// de las letras del Array.
// Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

$hola = array("H", "O", "L", "A");

function invertir($array)
{
    $aux = [];
    for ($i = count($array) - 1; $i >= 0; $i--) {
        array_push($aux, $array[$i]);
        echo $array[$i];
    }
    // var_dump($aux);
    return $aux;
  //  var_dump($array);
};

$hola = invertir($hola);
var_dump($hola);
