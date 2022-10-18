<?php
//ANDREA BRICEÑO

class Herramientas
{

    public static function CompararNombres($ventaUno, $ventaDos)
    {
        return strcmp($ventaUno->_nombre, $ventaDos->_nombre);
    }


    public static function ConsultaSiHayItemEnArray($item, $array)
    {
        $retorno = -1;

        for ($i = 0; $i < sizeof($array); $i++) {
            if ($item->Equals($array[$i], $item)) {
                $retorno = $i;
                break;
            }
        }
        return $retorno;
    }


    public static function AsignarId($item, $array)
    {
        $idMasAlto = 0;

        if (sizeof($array) > 0) {
            foreach ($array as $auxItem) {
                $id = Herramientas::SacarValorDeLaClave($auxItem, "_id");

                if ($id >= $idMasAlto) {
                    $idMasAlto = $id;
                }
            }
        }
        $item->_id = $idMasAlto + 1;
    }

    public static function SacarValorDeLaClave($objeto, $clave)
    {
        foreach ($objeto as $claveAux => $valor) {
            if ($claveAux == $clave) {
                return $valor;
            }
        }
    }

    public static function ExisteUnValorEnArray($item, $array, $clave)
    {
        $retorno = false;
        $valorItem = Herramientas::SacarValorDeLaClave($item, $clave);

        foreach ($array as $aux) {
            $valorAux = Herramientas::SacarValorDeLaClave($aux, $clave);

            if ($valorAux == $valorItem) {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }
    public static function ConseguirUltimoId($lista,$numeroPartida)
    {
        $idMaxima = $numeroPartida;
        if(count($lista)>0)
        {
            foreach ($lista as $item)
            {
                if($item->id > $idMaxima)
                {
                    $idMaxima =$item->id;
                }
            }
        }
        return $idMaxima;     
    }
    public static function BuscarVenta($lista,$numero)
    {

        if(count($lista)>0){
            foreach ($lista as $venta)
            {
                if($venta->numeroDePedido == $numero)
                {
                    return $venta;
                }
            }
        }
        return null;
    }
    public static function ConseguirIdPorElIndex($item, $array)
    {
        $retorno = -1;

        $indice = Herramientas::ConsultaSiHayItemEnArray($item, $array);

        if ($indice > -1) {
            $retorno = Herramientas::SacarValorDeLaClave($array[$indice], "_id");
        }

        return $retorno;
    }

    public static function ConseguirObjetoPorId($id, $array)
    {
        $retorno = null;

        foreach ($array as $item) {
            $idAux = Herramientas::SacarValorDeLaClave($item, "_id");
            if ($idAux == $id) {
                $retorno = $item;
                break;
            }
        }
        return $retorno;
    }


    public static function ImprimirArrayComoTabla($array)
    {
        if (sizeof($array) == 0 || $array == null) {
            print "\t<td>Sin datos disponibles.</td>\n";
            print "</tr>\n";
        } else {
            foreach ($array as $fila) {
                foreach ($fila as $columna) {
                    if ($columna == null) {
                        print "\t<td>Sin datos disponibles.</td>\n";
                    } else {
                        print "\t<td>$columna</td>\n";
                    }
                    print "\t<td>$columna</td>\n";
                }
                print "</tr>\n";
            }
        }
    }


    // public static function OrdenarArrayVentas($array)
    // {
    //     // $arrayAux = array();
    //     // $result = array_merge($array, $arrayAux);
       
    
    //     usort($array,  function($a, $b) {
    //         return strcmp($a->_usuario->_email, $b->_usuario->_email);
    //     });
    //     return $array;

    // }

}
