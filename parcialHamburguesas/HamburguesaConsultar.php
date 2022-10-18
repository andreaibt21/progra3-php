<?php
//ANDREA BRICEÑO
// 2-
// (1pt.) HamburguesaConsultar.php: (por POST)Se ingresa Nombre, Tipo, si coincide con algún registro del archivo
// Hamburguesas.json, retornar “Si Hay”. De lo contrario informar si no existe el tipo o el nombre.

include_once "Hamburguesa.php";
include_once "GuardarOLeerJson.php";


$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];

$ruta = "Hamburguesas.json";
$HamburguesaAux = new Hamburguesa($nombre, null, $tipo, null, null);
$array = GuardarOLeerJson::LeerDeJson($ruta);

if (Herramientas::ConsultaSiHayItemEnArray($HamburguesaAux, $array) !== -1) {
    echo "Existe" . "</br>";
} else {

    if (Herramientas::ExisteUnValorEnArray($HamburguesaAux, $array, "_nombre")) {
        echo "Si hay del nombre: " . $nombre . "</br>";
    } else {
        echo "No hay del nombre: " . $nombre . "</br>";
    }
    if (Herramientas::ExisteUnValorEnArray($HamburguesaAux, $array, "_tipo")) {
        echo "Si hay del tipo: " . $tipo . "</br>";
    } else {
        echo "No hay del tipo: " . $tipo . "</br>";
    }
}
