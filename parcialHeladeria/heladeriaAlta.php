<?php

// B- (1 pt.) HeladeriaAlta.php: (por POST) se ingresa Sabor, Precio, Tipo (“agua” o “crema”), Stock(unidades).
// Se guardan los datos en en el archivo de texto heladeria.json, tomando un id autoincremental como
// identificador(emulado) .Sí el nombre y tipo ya existen , se actualiza el precio y se suma al stock existente.
// completar el alta con imagen del helado, guardando la imagen con el sabor y tipo como identificación en la
// carpeta /ImagenesDeHelados.


include_once "helado.php";
include_once "GuardarOLeerJson.php";

$sabor = $_POST["sabor"];
$precio = $_POST["precio"];
$tipo = $_POST["tipo"];
$stock = $_POST["stock"];
$imagen = $_FILES["imagen"];

$ruta = "Heladeria.json";
$array = GuardarOLeerJson::LeerDeJson($ruta);


if (isset($sabor) && isset($precio) && isset($tipo) && isset($stock)) {

    $heladoAux = new Helado($sabor, $precio, $tipo, $stock, $imagen);
    Helado::AltaModificacionDeHelado($heladoAux, $array, $ruta);
    printf("Helado grabado con éxito :) <br>");
} else {
    printf("Ingrese todos los valores. <br>");
}
