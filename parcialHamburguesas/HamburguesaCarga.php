<?php
//ANDREA BRICEÑO
// B- (1 pt.) HamburguesaCarga.php: (por POST) se ingresa Nombre, Precio, Tipo (“simple” o “doble”), Cantidad( de
// unidades). Se guardan los datos en en el archivo de texto Hamburguesas.json, tomando un id autoincremental
// como identificador(emulado) .Sí el nombre y tipo ya existen , se actualiza el precio y se suma al stock existente.
// completar el alta con imagen de la hamburguesa, guardando la imagen con el tipo y el nombre como
// identificación en la carpeta /ImagenesDeHamburguesas.


include_once "Hamburguesa.php";
include_once "GuardarOLeerJson.php";

$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$imagen = $_FILES["imagen"];

$ruta = "Hamburguesas.json";
$array = GuardarOLeerJson::LeerDeJson($ruta);


if (isset($nombre) && isset($precio) && isset($tipo) && isset($cantidad)) {

    $heladoAux = new Hamburguesa($nombre, $precio, $tipo, $cantidad, $imagen);
    Hamburguesa::AltaModificacionDeHamburguesa($heladoAux, $array, $ruta);
    printf("Hamburguesa guardada con éxito :) <br>");
} else {
    printf("Ingrese todos los valores. <br>");
}
