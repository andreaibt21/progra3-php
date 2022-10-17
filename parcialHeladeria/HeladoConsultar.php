<?php
// 2-
// (1pt.) HeladoConsultar.php: (por POST) Se ingresa Sabor y Tipo, si coincide con algún registro del archivo
// heladeria.json, retornar “existe”. De lo contrario informar si no existe el tipo o el nombre.

include_once "helado.php";
include_once "GuardarOLeerJson.php";



$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];

$ruta = "Heladeria.json";
$heladoAux = new Helado($sabor, null, $tipo, null, null);
$array = GuardarOLeerJson::LeerDeJson($ruta);

if (Herramientas::ConsultaSiHayItemEnArray($heladoAux, $array) !== -1) {
    echo "Existe" . "</br>";
} else {

    if (Herramientas::ExisteUnValorEnArray($heladoAux, $array, "_sabor")) {
        echo "Si hay del sabor: " . $sabor . "</br>";
    } else {
        echo "No hay del sabor: " . $sabor . "</br>";
    }
    if (Herramientas::ExisteUnValorEnArray($heladoAux, $array, "_tipo")) {
        echo "Si hay del tipo: " . $tipo . "</br>";
    } else {
        echo "No hay del tipo: " . $tipo . "</br>";
    }
}
