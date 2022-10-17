<?php

// Aplicación Nº 2 (Mostrar fecha y estación) Andrea Briceño

// Obtenga la fecha actual del servidor (función ​date​) y luego imprímala dentro de la página con
// distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
// año es. Utilizar una estructura selectiva múltiple.

$month = date("n");
$day = date("d");
echo $day . " " . $month;
$mensaje;



if ($month > 0 && $month < 4 || $month == 12) {
    // Verano (21 de diciembre a 20 de marzo). 12 1 2 3

    $mensaje = "<br/> Estamos en verano";

    if ($month == 12 && $day > 20) {

        $mensaje = "<br/> Estamos en verano";
    } else if ($month == 3 && $day < 21) {

        $mensaje = "<br/> Estamos en verano";
    };
} else if ($month > 2 && $month < 7) {
    // Otoño (21 de marzo a 20 de junio).3 4 5 6 

    $mensaje = "<br/> Estamos en otoño";

    if ($month == 3 && $day > 20) {

        $mensaje = "<br/> Estamos en otoño";
    } else if ($month == 7 && $day < 21) {

        $mensaje = "<br/> Estamos en otoño";
    };
} else if ($month > 5 && $month < 10) {
    // Invierno (21 de junio a 20 de septiembre). 6 7 8 9

    $mensaje = "<br/> Estamos en Invierno";

    if ($month == 6 && $day > 20) {

        $mensaje = "<br/> Estamos en Invierno";
    } else if ($month == 9 && $day < 21) {

        $mensaje = "<br/> Estamos en Invierno";
    };
} else if ($month > 8 && $month < 13) {
    // Primavera (21 de septiembre a 20 de diciembre).9 10 11 12

    $mensaje = "<br/> Estamos en Primavera";

    if ($month == 9 && $day > 20) {

        $mensaje = "<br/> Estamos en Primavera";
    } else if ($month == 12 && $day < 21) {

        $mensaje = "<br/> Estamos en Primavera";
    };
};

echo $mensaje;


?>








