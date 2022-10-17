<?php
include_once "herramientas.php";
include_once "GuardarOLeerJson.php";

class Usuario
{


    public $_id;
    public $_email;

    public function __construct($email)
    {

        $this->_email = $email;
    }


    public function Equals($item1, $item2)
    {
        $retorno = false;
        $mailItem1 = Herramientas::SacarValorDeLaClave($item1, "_email");
        $mailItem2 = Herramientas::SacarValorDeLaClave($item2, "_email");
        if (
            $mailItem1 != null && $mailItem2 != null &&
            trim($mailItem1) == trim($mailItem2)
        ) {
            $retorno = true;
        }
        return $retorno;
    }


    public function Alta( $array, $ruta)
    {
        $retorno = null;
        $indice = Herramientas::ConsultaSiHayItemEnArray($this, $array);

        if ($indice !== -1) {
            $retorno = $array[$indice];

        } else {
            Herramientas::AsignarId($this, $array);
            array_push($array, $this);
            GuardarOLeerJson::GuardarEnJson($array, $ruta);
            $retorno = $this;
        }
        return $retorno;
    }




}
