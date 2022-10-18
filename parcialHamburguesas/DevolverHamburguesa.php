<?php

// 7- (2 pts.) DevolverHamburguesa.php Guardar en el archivo (devoluciones.json y cupones.json):
// a- Se ingresa el número de pedido y la causa de la devolución. El número de pedido debe existir, se ingresa una
// foto del cliente enojado,esto debe generar un cupón de descuento con el 10% de descuento para la próxima
// compra.

include_once 'Hamburguesa.php';
include_once 'Venta.php';
include_once 'Usuario.php';
include_once 'Herramientas.php';
include_once 'GuardarOLeerJson.php';


$arrayVentas = GuardarOLeerJson::LeerDeJson("Ventas.json", false);
$arrayCupones = GuardarOLeerJson::LeerDeJson("Cupones.json");
$arrayDevoluciones = GuardarOLeerJson::LeerDeJson("Devoluciones.json");

$numeroDePedido = $_POST["numeroDePedido"];
$causaDevolucion = $_POST["causa"];
$imagen = $_FILES["imagen"];

$ventaBuscada = null;
 foreach ($arrayVentas as $venta)
    {
        if($venta->numeroDePedido == $numeroDePedido)
        {
            $ventaBuscada = $venta;
        }
    }
if($ventaBuscada !=null)
{
    array_push($arrayDevoluciones,$ventaBuscada);
    $cuponDescuento = new Cupon (Herramientas::ConseguirUltimoId($arrayCupones,100)+1,
                                                            $numeroDePedido,
                                                            10,
                                                            false);
    echo "Cupon generado";
    array_push($arrayCupones,$cuponDescuento);
}


GuardarOLeerJson::GuardarEnJson($arrayVentas,"Ventas.json");
GuardarOLeerJson::GuardarEnJson($arrayCupones,"Cupones.json");
GuardarOLeerJson::GuardarEnJson($arrayDevoluciones,"Devoluciones.json");
