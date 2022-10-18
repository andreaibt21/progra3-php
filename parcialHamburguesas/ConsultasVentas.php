<?php
//ANDREA BRICEÑO

// 4- (1 pts.)ConsultasVentas.php: necesito saber :
// a- La cantidad de Hamburguesas vendidas en un día en particular, si no se pasa fecha, se muestran las del
// día de ayer.
// b- El listado de ventas entre dos fechas ordenado por nombre.
// c- El listado de ventas de un usuario ingresado.
// d- El listado de ventas de un tipo ingresado.

include_once 'Hamburguesa.php';
include_once 'Venta.php';
include_once 'Usuario.php';
include_once 'Herramientas.php';
include_once 'GuardarOLeerJson.php';



$rutaHamburguesas = "Hamburguesas.json";
$rutaUsuarios = "Usuarios.json";
$rutaVentas = "Ventas.json";

$arrayHamburguesas = GuardarOLeerJson::LeerDeJson($rutaHamburguesas);
$arrayUsuarios = GuardarOLeerJson::LeerDeJson($rutaUsuarios);
$arrayVentas = GuardarOLeerJson::LeerDeJson($rutaVentas);
$arrayVentasParaOrdenar = GuardarOLeerJson::LeerDeJson($rutaVentas, false);
$listaDeVentasEntreFechas = array();

// a- La cantidad de Hamburguesas vendidos en un día en particular(se envía por parámetro), si no se pasa fecha, se
// muestran las del día de ayer.

if (isset($_GET["fecha"])) {

    $fechaGet = $_GET["fecha"];
    $fechaVenta = new DateTime($fechaGet);
} else {
    $fechaVenta = new DateTime("2022-10-16");
}
$formateada = $fechaVenta->format("Y-m-d");
$cantidadDeHamburguesas = 0;

foreach ($arrayVentas as $venta) {
    $fechaAux = Herramientas::SacarValorDeLaClave($venta, "_fecha");
    $date = Herramientas::SacarValorDeLaClave($fechaAux, "date");
    $fechaConFormato = new DateTime($date);
    $fechaSimple = $fechaConFormato->format("Y-m-d");

    if ($fechaSimple == $formateada) {

        $cantidad = Herramientas::SacarValorDeLaClave($venta, "_cantidad");
        $cantidadDeHamburguesas += $cantidad;
    }
}
echo "<br> a) La cantidad de ventas del dia " . $formateada . " es " . $cantidadDeHamburguesas . "<br><br>";




// b- El listado de ventas de un usuario ingresado.

if (isset($_GET["usuarioEmail"])) {

    $usuarioEmail = $_GET["usuarioEmail"];

    echo   "b ) Listado de ventas de " . $usuarioEmail . "<br>";
    foreach ($arrayVentas as $venta) {

        $usuarioAux = Herramientas::SacarValorDeLaClave($venta, "_usuario");
        $emailAux = Herramientas::SacarValorDeLaClave($usuarioAux, "_email");
        if ($emailAux == $usuarioEmail) {

            mostrarVenta($venta);
        }
    }
    echo "<br>";
}

// c- El listado de ventas entre dos fechas ordenado por nombre.


if (isset($_GET["fechaMinima"]) && isset($_GET["fechaMaxima"])) {
    $fechaMinima = $_GET["fechaMinima"];
    $fechaMaxima = $_GET["fechaMaxima"];

    foreach ($arrayVentasParaOrdenar as $venta) {

        $usuarioAux = Herramientas::SacarValorDeLaClave($venta, "_usuario");
        $emailAux = Herramientas::SacarValorDeLaClave($usuarioAux, "_email");
        $fechaAux = Herramientas::SacarValorDeLaClave($venta, "_fecha");
        $date = Herramientas::SacarValorDeLaClave($fechaAux, "date");
        $fechaConFormato = new DateTime($date);
        $fechaSimple = $fechaConFormato->format("Y-m-d");

        if ($fechaSimple >= $fechaMinima &&  $fechaSimple <= $fechaMaxima) {

            array_push($listaDeVentasEntreFechas, $venta);
        }
    }
    usort($listaDeVentasEntreFechas, "Herramientas::CompararNombres");
    echo   "c) Listado de ventas ordenadas por nombre:" . "<br>";
    foreach ($listaDeVentasEntreFechas as $venta) {

        mostrarVenta($venta);
    }
    echo "<br>";

}

// d- El listado de ventas por nombre ingresado.

if (isset($_GET["tipo"])) {
    $tipo = $_GET["tipo"];
    echo   " d- El listado de ventas por tipo ingresado: (" . $tipo . ")<br>";
    foreach ($arrayVentasParaOrdenar as $venta) {
        $tipoAux = Herramientas::SacarValorDeLaClave($venta, "_tipo");
        if ($tipoAux == $tipo) {
            mostrarVenta($venta);
        }
    }
}







function mostrarVenta($venta)
{
    $usuarioAux = Herramientas::SacarValorDeLaClave($venta, "_usuario");
    $emailAux = Herramientas::SacarValorDeLaClave($usuarioAux, "_email");
    $fechaAux = Herramientas::SacarValorDeLaClave($venta, "_fecha");
    $date = Herramientas::SacarValorDeLaClave($fechaAux, "date");
    $fechaConFormato = new DateTime($date);
    $fechaSimple = $fechaConFormato->format("Y-m-d");
    $nombre = Herramientas::SacarValorDeLaClave($venta, "_nombre");
    $tipo = Herramientas::SacarValorDeLaClave($venta, "_tipo");
    $cantidad = Herramientas::SacarValorDeLaClave($venta, "_cantidad");
    $id = Herramientas::SacarValorDeLaClave($venta, "_id");


    echo  "Venta numero: " . $id . ", de: " . $emailAux . " nombre: " . $nombre . ", tipo: " . $tipo .
     ", Compró: " . $cantidad . ", en  " . $fechaSimple . "<br>";
}
