<?php
include_once "herramientas.php";
include_once "GuardarOLeerJson.php";

class Helado
{

    public $_id;
    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_stock;
    public $_imagen;
    public $_nombreCarpeta = "imagenesDeHelados";

    public function __construct($sabor, $precio, $tipo, $stock, $imagen)
    {


        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_precio = $precio;
        $this->_stock = $stock;
        $this->_imagen = $imagen;
    }
    

    // Agrega un helado nuevo o modifica uno ya existente al JSON
    //si exite ese tipo de helado y sabor te da mayo a 0
    //si existe se actualiza
    //si no existe se crea 

    public static function AltaModificacionDeHelado($item, $array, $ruta)
    {
        $indice = Herramientas::ConsultaSiHayItemEnArray($item, $array);

        if ($indice > -1) {
            $nuevoStock = Herramientas::SacarValorDeLaClave($array[$indice], "_stock") + $item->_stock;
            $replace = array("_precio" => $item->_precio, "_stock" => $nuevoStock);
            $array[$indice] = array_replace($array[$indice], $replace);
        } else {
            Herramientas::AsignarId($item, $array);
            $archivo = $item->GuardarImagen();
            $item->_imagen = $archivo;
            array_push($array, $item);
        }
        GuardarOLeerJson::GuardarEnJson($array, $ruta);
    }
    //Guarda el path de la imagen ingresada en el la clave imagen del objeto helado
    public function GuardarImagen()
    {
        $nombreFoto = $this->_sabor . "_" . $this->_tipo . ".jpg";
        $destino = "." . DIRECTORY_SEPARATOR . $this->_nombreCarpeta . DIRECTORY_SEPARATOR;

        if (!file_exists($destino)) {
            mkdir($destino, 0777, true);
        }

        $direccion = $destino . $nombreFoto;
        move_uploaded_file($this->_imagen["tmp_name"], $direccion);
        return $direccion;
    }

    //Compara si un helado es igual a otro si teienen el mismo sabor y tipo
    public function Equals($item1, $item2)
    {
        $retorno = false;

        $saborItem1 = Herramientas::SacarValorDeLaClave($item1, "_sabor");
        $saborItem2 = Herramientas::SacarValorDeLaClave($item2, "_sabor");
        $tipoItem1 = Herramientas::SacarValorDeLaClave($item1, "_tipo");
        $tipoItem2 = Herramientas::SacarValorDeLaClave($item2, "_tipo");

        if (
            $saborItem1 != null && $saborItem2 != null &&
            $tipoItem1 != null &&  $tipoItem2 != null &&
            trim($saborItem1) == trim($saborItem2) &&
            trim($tipoItem1) == trim($tipoItem2)
        ) {
            $retorno = true;
        }
        return $retorno;
    }

    // Actualiza el stock del helado restando la cantidad pasada por parametro 
    public static function RestarStock($idHelado, $array, $ruta, $valor)
    {
        for ($i = 0; $i < sizeof($array); $i++) {
            $idEnArray = Herramientas::SacarValorDeLaClave($array[$i], "_id");
            if ($idEnArray == $idHelado) {
                $nuevoStock = Herramientas::SacarValorDeLaClave($array[$i], "_stock") - $valor;
                $replace = array("_stock" => $nuevoStock);
                $array[$i] = array_replace($array[$i], $replace);
                break;
            }
        }
        GuardarOLeerJson::GuardarEnJson($array, $ruta);
    }
}
