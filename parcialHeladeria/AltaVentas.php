<?php

// a- (1 pts.) AltaVenta.php: (por POST) se recibe el email del usuario y el Sabor, Tipo y Stock, si el ítem existe en
// heladeria.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) .
// Se debe descontar la cantidad vendida del stock.

include_once "Helado.php";
include_once "Venta.php";
include_once "Usuario.php";
include_once "GuardarOLeerJson.php";

$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$stock = $_POST["stock"];
$email = $_POST["email"];
$numeroDePedido = $_POST["numeroDePedido"];
 $imagen = $_FILES["imagen"];
// $precio = $_POST["precio"];

$rutaHelados = "Heladeria.json";
$rutaUsuarios = "Usuarios.json"; 
$rutaVentas = "Ventas.json"; 

$arrayHelados = GuardarOLeerJson::LeerDeJson($rutaHelados);
$arrayUsuarios = GuardarOLeerJson::LeerDeJson($rutaUsuarios); 
$arrayVentas = GuardarOLeerJson::LeerDeJson($rutaVentas); 


$heladoAux = new Helado($sabor, null, $tipo, null, null);
$usuarioAux = new Usuario($email);
$ventaAux = new Venta($usuarioAux,$sabor, $tipo, $stock, $imagen, null, $numeroDePedido);

$indiceHeladoAux = Herramientas::ConsultaSiHayItemEnArray($heladoAux, $arrayHelados);


if(isset($sabor) && isset($tipo) && isset($stock) && isset($email) && isset ($imagen))
{
    if( $indiceHeladoAux > -1)
    {     
        $heladoAuxEnArray = $arrayHelados[$indiceHeladoAux];
        $stockHeladoAuxEnArray = Herramientas::SacarValorDeLaClave($heladoAuxEnArray, "_stock");
        $cantidadPedido = Herramientas::SacarValorDeLaClave($ventaAux, "_stock");
    
        if($stockHeladoAuxEnArray >= $cantidadPedido)
        {
            $usuarioAux = $usuarioAux->Alta($arrayUsuarios, $rutaUsuarios);
            if($ventaAux->Alta( $usuarioAux, 
                                $heladoAuxEnArray,  
                                $arrayHelados, 
                                $arrayVentas, 
                                $rutaHelados, 
                                $rutaVentas))
            {
                printf("Venta exitosa.<br>");
            }
        }
        else
        {
            printf("No quedan helados de tipo: ". $tipo ."<br>");
        }
    }
    else
    {
        printf("No existe este helado.<br>");
    }
}
else
{
    printf("Intente de nuevo, Introduzca todos los valores.");
}

