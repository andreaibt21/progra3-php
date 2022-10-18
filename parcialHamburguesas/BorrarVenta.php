<?php
//ANDREA BRICEÑO
include_once "GuardarOLeerJson.php";
include_once "Venta.php";

$listaDeVentas = array();
$arrayVentas = GuardarOLeerJson::LeerDeJson("Ventas.json", false);

$datos = json_decode(file_get_contents("php://input"), true);

$numeroDePedido = $datos["numeroDePedido"];

for ($i=0; $i < count($listaDeVentas); $i++) 
{ 
    if(strcmp($listaDeVentas[$i]->numeroDePedido,  $numeroDePedido ) == 0 )
    {
        $listaDeVentas[$i]->_estaBorrada = true;
        MoverFoto($listaDeVentas[$i]);
        echo $numeroDePedido ;
        break; 
    }
}

function MoverFoto($venta)
{
    $nombreMailFiltrado = explode("@",$venta->_usuario);       
    $nombreDeArchivo = "$venta->_tipo - $venta->_nombre - $nombreMailFiltrado[0]@";
    echo $nombreDeArchivo;
    $antiguaCarpeta = ".".DIRECTORY_SEPARATOR."ImagenesDeLaVenta".DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR;
    $nuevaCarpeta = ".".DIRECTORY_SEPARATOR."BACKUPVENTAS".DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR;
    if(!file_exists($nuevaCarpeta)) 
    {
        mkdir($nuevaCarpeta, 0777, true);
    }
    rename($antiguaCarpeta.$nombreDeArchivo.".jpg", $nuevaCarpeta.$nombreDeArchivo.".jpg");
}

GuardarOLeerJson::GuardarEnJson($listaDeVentas,"Ventas.json");
?>