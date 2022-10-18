<?php
//ANDREA BRICEÑO

$metodo = $_SERVER["REQUEST_METHOD"];
date_default_timezone_set("America/Argentina/Buenos_Aires");
switch ($metodo){
    case "POST":
        
        switch (key($_GET))
        {
            case "alta":
                include_once "HamburguesaCarga.php";
                break;
            case "consultar":
                include_once "HamburguesaConsultar.php";
                break;
            case "venta":
                include_once "AltaVentas.php";
                break;
            case "devolucion":
                include_once "DevolverHamburguesa.php";
                break;
        }
        break;
    case "GET":
        include_once "ConsultasVentas.php";
        break;
    case "PUT":
        include_once "ModificarVenta.php";
        break;
    case "DELETE":
        include_once "BorrarVenta.php";
        break;
}
?>