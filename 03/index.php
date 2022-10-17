<?php
//$archivo = fopen("saludar.txt", "w");
//para cerrar
//fclose($archivo);


//LEE TODO EL ARCHIVO
// $archivo = fopen("saludar.txt", "r"); // abre 
// echo $archivo . "</br>";
// echo fread($archivo, filesize("saludar.txt")); //y lee 
// fclose($archivo); 
//

// $contador = 0;
// $archivo = fopen("saludar.txt", "r"); // abre 
// while (!feof($archivo)) {
//     $string = fgets($archivo);

//     echo $string . "</br>";

//     $contador++;
//     echo "contador " . $contador . "</br>";
// }
// fclose($archivo);



$archivo = fopen("saludar.txt", "w"); // abre 
$string = "hola como estas";
$string = "hola como estas";
echo fputs($archivo, $string);
echo fputs($archivo, $string);
echo fputs($archivo, $string);
echo fputs($archivo, $string);
echo fputs($archivo, $string);
echo fputs($archivo, $string);
fclose($archivo);



//CUAL ES LA ULTIMA LINEA
//ESTA VACIA????
//HACER UN IF PREGUNTANDO 
