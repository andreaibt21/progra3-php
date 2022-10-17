<?php
// Aplicación Nº 1 (Sumar números)   ANDREA BRICEÑO

// Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
// supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
// se sumaron.

$contador= 0;
for ($num=0; $num < 1001; $num++) { 
    echo "numeros sumados: " ;
    echo $num . "<br/>";
  
    $contador++;

}
echo "se sumaron $contador numeros."




?>