<?php
//ANDREA BRICEÑO

include_once "herramientas.php";
include_once "Hamburguesa.php";
include_once "Usuario.php";
include_once "GuardarOLeerJson.php";

class Venta
{

    public $_id;
    public $_usuario;
    public $_tipo;
    public $_nombre;
    public $_cantidad;
    public $_fecha;
    public $_imagen;
    public $numeroDePedido;
    public bool $_estaBorrada;

    public function __construct($usuario, $nombre, $tipo,  $cantidad, $imagen, $id , $numeroDePedido, $estaBorrada = false)
    {

        $this->_estaBorrada = $estaBorrada;
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_usuario = $usuario;
        $this->_cantidad = $cantidad;
        $this->_imagen = $imagen;
        $this->numeroDePedido = $numeroDePedido;
    }


    public function Alta($usuario, $hamburguesa, $arrayHamburguesa, $arrayVentas, $rutaHamburguesa, $rutaVentas)
    {
        $idHamburguesaAux = Herramientas::SacarValorDeLaClave($hamburguesa, "_id");
        $retorno = false;
        if ($idHamburguesaAux < 1) {
            printf("No existen Hamburguesas de este tipo. No se puede hacer el pedido. <br>");
        } else {

            $this->_fecha = new DateTime("now");
            $imagen = $this->GuardarImagen($hamburguesa, $usuario);
            $this->_imagen = $imagen;

            Herramientas::AsignarId($this, $arrayVentas);
            array_push($arrayVentas, $this);
            GuardarOLeerJson::GuardarEnJson($arrayVentas, $rutaVentas);

            $cantidad = Herramientas::SacarValorDeLaClave($this, "_cantidad");
            Hamburguesa::Restarcantidad($idHamburguesaAux, $arrayHamburguesa, $rutaHamburguesa, $cantidad);
            $retorno = true;
        }

        return $retorno;
    }

    public function GuardarImagen($hamburguesa, $usuario)
    {
        $tipohamburguesa = Herramientas::SacarValorDeLaClave($hamburguesa, "_tipo");
        $nombreHamburguesa = Herramientas::SacarValorDeLaClave($hamburguesa, "_nombre");
        $emailUsuario = Herramientas::SacarValorDeLaClave($usuario, "_email");
        $nombreUsuario = strtok($emailUsuario, '@');
        $fecha = Herramientas::SacarValorDeLaClave($this, "_fecha");
        $fechaString = $fecha->format("YmdHis");

        $nombreFoto =  $nombreHamburguesa . "_" . $tipohamburguesa . "_" . $nombreUsuario . "_" . $fechaString . ".jpg";
        $destino = "." . DIRECTORY_SEPARATOR . "ImagenesDeLaVenta" . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR;

        if (!file_exists($destino)) {
            mkdir($destino, 0777, true);
        }

        $dir = $destino . $nombreFoto;
        move_uploaded_file($this->_imagen["tmp_name"], $dir);
        return $dir;
    }

    








}
