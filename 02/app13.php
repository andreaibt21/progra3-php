<?php
// Aplicación No 13 (Invertir palabra) andrea briceño
// Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
// función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
// deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
// “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
// 1 si la palabra pertenece a algún elemento del listado.
// 0 en caso contrario.
function validar($string, $max){
    $list = array( 'Recuperatorio', 'Parcial' , 'Programacion');
    if (strlen( $string) < $max ){
        if( in_array($string, $list))
        {
            echo 1 ;
        } else{
            echo 0;
        }
    }else{
      
        echo "La cantidad de caracteres supera el numero max" . $max;
    }


}
validar("Parceial", 20);

?>