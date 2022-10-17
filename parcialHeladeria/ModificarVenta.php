<?php

// 5- (1 pts.) ModificarVenta.php (por PUT)
// Debe recibir el número de pedido, el email del usuario, el nombre, tipo y cantidad, 
// si existe se modifica , de lo contrario informar que no existe ese número de pedido.


include_once "helado.php";
include_once "GuardarOLeerJson.php";
$datos = json_decode(file_get_contents("php://input"), true);

 $numeroDePedido = $datos["numeroDePedido"];
 $email = $datos["email"];
 $tipo = $datos["tipo"];
 $sabor = $datos["sabor"];
 $stock = $datos["stock"];

$rutaVentas = "Ventas.json";
$arrayVentas = GuardarOLeerJson::LeerDeJson($rutaVentas, false);



    foreach ($arrayVentas as $venta) {
        $usuarioAux = Herramientas::SacarValorDeLaClave($venta, "_usuario");
        $emailAux = Herramientas::SacarValorDeLaClave($usuarioAux, "_email");
        $numeroDePedidoAux = Herramientas::SacarValorDeLaClave($venta, "numeroDePedido");
        if (
            strcmp(   $numeroDePedidoAux, $numeroDePedido) == 0 &&
            strcmp( $emailAux, $email) == 0
        ) {
            echo "<br>Datos ingresados: " . $numeroDePedido . "   " . $email . "  " . $tipo . "   " . $stock. "<br>";
            $venta->_sabor = $datos["sabor"];
            $venta->_tipo = $datos["tipo"];
            $venta->_stock = $datos["stock"];
            echo "\nSe modificó la venta\n";
        }


        //     if (
        //         strcmp($numeroDePedidoAux, $numeroDePedido) == 0
        //     ) {
        //         echo "Datos ingresados: " . $numeroDePedido . " " . $email . " " . $tipo . " " . $stock;

        //     }else{
        //         echo "aaaaa";echo "<br>";
        //     }
            
        //     if (
            
        //         strcmp($emailAux, $email) == 0
        //     ) {
        //         echo "Datos ingresados: " . $numeroDePedido . " " . $email . " " . $tipo . " " . $stock;
        
        //     }else{
        
        //     echo "rrrrrr";echo "<br>";
        //     }
        //     echo "<br>";

    }


    GuardarOLeerJson::GuardarEnJson($arrayVentas, "Ventas.json");
