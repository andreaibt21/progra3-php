<?php 
// (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
// guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
// identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.


$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$archivo = $_FILES["archivo"]; 

$ruta = "pizzas.json"; 
$array = GrabarLeerJson::LeerJson($ruta);

if(isset($sabor) && isset($tipo) && isset($cantidad) && isset($precio))
{
    $productoAux = new Producto($sabor, $tipo, $precio, $cantidad, $archivo);
    Producto::AltaModificacion($productoAux, $array, $ruta);
    printf("Producto grabado con éxito :) <br>");   
}
else
{


?>