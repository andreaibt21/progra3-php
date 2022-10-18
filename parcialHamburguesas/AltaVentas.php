<?php
//ANDREA BRICEÑO

// a- (1 pts.) AltaVenta.php: (por POST) se recibe el email del usuario y el nombre, Tipo y cantidad, si el ítem existe en
// heladeria.json, y hay cantidad guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) .
// Se debe descontar la cantidad vendida del cantidad.

include_once "Hamburguesa.php";
include_once "Venta.php";
include_once "Usuario.php";
include_once "GuardarOLeerJson.php";

$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];
$email = $_POST["email"];
$numeroDePedido = $_POST["numeroDePedido"];
$imagen = $_FILES["imagen"];

$rutaHamburguesas = "Hamburguesas.json";
$rutaUsuarios = "Usuarios.json";
$rutaVentas = "Ventas.json";

$arrayHamburguesas = GuardarOLeerJson::LeerDeJson($rutaHamburguesas);
$arrayUsuarios = GuardarOLeerJson::LeerDeJson($rutaUsuarios);
$arrayVentas = GuardarOLeerJson::LeerDeJson($rutaVentas);




if (isset($nombre) && isset($tipo) && isset($cantidad) && isset($email) && isset($imagen)) {


    $hamburguesaAux = new Hamburguesa($nombre, null, $tipo, null, null);
    $usuarioAux = new Usuario($email);
    $ventaAux = new Venta($usuarioAux, $nombre, $tipo, $cantidad, $imagen, null, $numeroDePedido);
    $indiceHamburguesaAux = Herramientas::ConsultaSiHayItemEnArray($hamburguesaAux, $arrayHamburguesas);

    if ($indiceHamburguesaAux > -1) {

        $hamburguesaAuxEnArray = $arrayHamburguesas[$indiceHamburguesaAux];
        $cantidadHamburguesaAuxEnArray = Herramientas::SacarValorDeLaClave($hamburguesaAuxEnArray, "_cantidad");
        $cantidadPedido = Herramientas::SacarValorDeLaClave($ventaAux, "_cantidad");

        if ($cantidadHamburguesaAuxEnArray >= $cantidadPedido) {
            $usuarioAux = $usuarioAux->Alta($arrayUsuarios, $rutaUsuarios);
            if ($ventaAux->Alta(
                $usuarioAux,
                $hamburguesaAuxEnArray,
                $arrayHamburguesas,
                $arrayVentas,
                $rutaHamburguesas,
                $rutaVentas
            )) {
                printf("Venta exitosa.<br>");
            }
        } else {
            printf("No quedan hamburguesas de tipo: " . $tipo . "<br>");
        }
    } else {
        printf("No existe este hamburguesa.<br>");
    }
} else {
    printf("Intente de nuevo, Introduzca todos los valores.");
}
