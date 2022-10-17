<?php
// Aplicación Nº 6 (Carga aleatoria)

// Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
// función ​rand​). Mediante una estructura condicional, determinar si el promedio de los números
// son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
// resultado.

$array = array();

$contador = 0;
for ($i = 0; $i < 5; $i++) {
    array_push($array, rand(0, 20));
    $suma =  $contador += $array[$i];
    echo  $suma . " </br>";
}
$promedio = $suma / count($array);

echo $contador . "promedio " . $promedio . " </br>";

var_dump($array);
