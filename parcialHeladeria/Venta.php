<?php
include_once "herramientas.php";
include_once "Helado.php";
include_once "Usuario.php";
include_once "GuardarOLeerJson.php";

class Venta
{

    public $_id;
    public $_usuario;
    public $_tipo;
    public $_sabor;
    public $_stock;
    public $_fecha;
    public $_archivo;
    public $numeroDePedido;

    public function __construct($usuario, $sabor, $tipo,  $stock, $archivo, $id , $numeroDePedido)
    {

        $this->_id = $id;
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_usuario = $usuario;
        $this->_stock = $stock;
        $this->_archivo = $archivo;
        $this->numeroDePedido = $numeroDePedido;
    }


    public function Alta($usuario, $helado, $arrayHelados, $arrayVentas, $rutaHelados, $rutaVentas)
    {
        $idHeladoAux = Herramientas::SacarValorDeLaClave($helado, "_id");
        $retorno = false;
        if ($idHeladoAux < 1) {
            printf("No existen helados de este tipo. No se puede hacer el pedido. <br>");
        } else {

            $this->_fecha = new DateTime("now");
            $archivo = $this->GuardarImagen($helado, $usuario);
            $this->_archivo = $archivo;

            Herramientas::AsignarId($this, $arrayVentas);
            array_push($arrayVentas, $this);
            GuardarOLeerJson::GuardarEnJson($arrayVentas, $rutaVentas);

            $stock = Herramientas::SacarValorDeLaClave($this, "_stock");
            helado::RestarStock($idHeladoAux, $arrayHelados, $rutaHelados, $stock);
            $retorno = true;
        }

        return $retorno;
    }

    public function GuardarImagen($helado, $usuario)
    {
        $tipohelado = Herramientas::SacarValorDeLaClave($helado, "_tipo");
        $saborhelado = Herramientas::SacarValorDeLaClave($helado, "_sabor");
        $emailUsuario = Herramientas::SacarValorDeLaClave($usuario, "_email");
        $nombreUsuario = strtok($emailUsuario, '@');
        $fecha = Herramientas::SacarValorDeLaClave($this, "_fecha");
        $fechaString = $fecha->format("YmdHis");

        $nombreFoto =  $saborhelado . "_" . $tipohelado . "_" . $nombreUsuario . "_" . $fechaString . ".jpg";
        $destino = "." . DIRECTORY_SEPARATOR . "ImagenesDeLaVenta" . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR;

        if (!file_exists($destino)) {
            mkdir($destino, 0777, true);
        }

        $dir = $destino . $nombreFoto;
        move_uploaded_file($this->_archivo["tmp_name"], $dir);
        return $dir;
    }

    

    public function Modificacion($usuarioEmail, $sabor, $tipo,  $stock , $numeroDePedido)
    {
        $heladoAux = new Helado($sabor, $tipo, null, null, null);
        $arrayHelados = GuardarOLeerJson::LeerDeJson("heladeria.json");
        $arrayUsuarios = GuardarOLeerJson::LeerDeJson("usuarios.json");

        $indiceHeladoAux = Herramientas::ConsultaSiHayItemEnArray($heladoAux, $arrayHelados);

        if( $indiceHeladoAux > -1)
        {





            
        }

    }






}
