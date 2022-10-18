<?php
//ANDREA BRICEÑO
include_once "herramientas.php";
include_once "GuardarOLeerJson.php";

class Hamburguesa
{

    public $_id;
    public $_nombre;
    public $_precio;
    public $_tipo;
    public $_cantidad;
    public $_imagen;
    public $_nombreCarpeta = "imagenesDeHamburguesas";

    public function __construct($nombre, $precio, $tipo, $cantidad, $imagen)
    {


        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_precio = $precio;
        $this->_cantidad = $cantidad;
        $this->_imagen = $imagen;
    }
    


    public static function AltaModificacionDeHamburguesa($item, $array, $ruta)
    {
        $indice = Herramientas::ConsultaSiHayItemEnArray($item, $array);

        if ($indice > -1) {
            $nuevoCantidad = Herramientas::SacarValorDeLaClave($array[$indice], "_cantidad") + $item->_cantidad;
            $replace = array("_precio" => $item->_precio, "_cantidad" => $nuevoCantidad);
            $array[$indice] = array_replace($array[$indice], $replace);
        } else {
            Herramientas::AsignarId($item, $array);
            $archivo = $item->GuardarImagen();
            $item->_imagen = $archivo;
            array_push($array, $item);
        }
        GuardarOLeerJson::GuardarEnJson($array, $ruta);
    }
    public function GuardarImagen()
    {
        $nombreFoto = $this->_nombre . "_" . $this->_tipo . ".jpg";
        $destino = "." . DIRECTORY_SEPARATOR . $this->_nombreCarpeta . DIRECTORY_SEPARATOR;

        if (!file_exists($destino)) {
            mkdir($destino, 0777, true);
        }

        $direccion = $destino . $nombreFoto;
        move_uploaded_file($this->_imagen["tmp_name"], $direccion);
        return $direccion;
    }

    public function Equals($item1, $item2)
    {
        $retorno = false;

        $nombreItem1 = Herramientas::SacarValorDeLaClave($item1, "_nombre");
        $nombreItem2 = Herramientas::SacarValorDeLaClave($item2, "_nombre");
        $tipoItem1 = Herramientas::SacarValorDeLaClave($item1, "_tipo");
        $tipoItem2 = Herramientas::SacarValorDeLaClave($item2, "_tipo");

        if (
            $nombreItem1 != null && $nombreItem2 != null &&
            $tipoItem1 != null &&  $tipoItem2 != null &&
            trim($nombreItem1) == trim($nombreItem2) &&
            trim($tipoItem1) == trim($tipoItem2)
        ) {
            $retorno = true;
        }
        return $retorno;
    }

    public static function Restarcantidad($idHamburguesa, $array, $ruta, $valor)
    {
        for ($i = 0; $i < sizeof($array); $i++) {
            $idEnArray = Herramientas::SacarValorDeLaClave($array[$i], "_id");
            if ($idEnArray == $idHamburguesa) {
                $nuevoCantidad = Herramientas::SacarValorDeLaClave($array[$i], "_cantidad") - $valor;
                $replace = array("_cantidad" => $nuevoCantidad);
                $array[$i] = array_replace($array[$i], $replace);
                break;
            }
        }
        GuardarOLeerJson::GuardarEnJson($array, $ruta);
    }
}
