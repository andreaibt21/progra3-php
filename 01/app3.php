 <?php
    // Aplicación Nº 3 (Obtener el valor del medio) Andrea Briceño

    // Dadas tres variables numéricas de tipo entero ​$a​, ​$b​ y ​$c​ realizar una aplicación que muestre
    // el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    // variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
    // Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
    // Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio


   // $a = 1;  $b=5;   $c=3;  //   el 3 es del medio
    // $a = 5;  $b=1;   $c=5;  // no hay numero del medio
    // $a = 3;  $b=5;   $c=1;  //   el 3 es del medio
    // $a = 3;  $b=1;   $c=5;  //  el 3 es del medio
    // $a = 5;  $b=3;   $c=1;  //  el 3 es del medio
    // $a = 1;  $b=5;   $c=1;  //  no hay numero del medio


    if ($a > $b && $a < $c) {
        echo $a;
    } else if ($b > $c && $b < $a) {

        echo $b;
    } else if ($c > $b && $c < $a) {
        echo $c;
    } else {
        echo "No hay valor del medio";
    }




    ?>