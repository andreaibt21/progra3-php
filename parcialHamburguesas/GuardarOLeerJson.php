<?php
//ANDREA BRICEÑO

class GuardarOLeerJson
{
    public static function GuardarEnJson($array, $ruta)
    {
        $retorno = false;

        try {
            $archivo = fopen($ruta, 'w');
            if ($archivo) {
                $json = json_encode($array, JSON_PRETTY_PRINT);
                fwrite($archivo, $json);
                $retorno = true;
            }
        } catch (Throwable $mensaje) {
            printf("Error al guardar el archivo: <br> $mensaje");
        } finally {
            fclose($archivo);
            return $retorno;
        }
    }

    public static function LeerDeJson($ruta, $obj = true)
    {
        try {
            $archivo = fopen($ruta, "r");
            if ($archivo) {
                $contenido = fread($archivo, filesize($ruta));
                if($obj === true)
                {
                    $array = json_decode($contenido, true);
                    
                }else{
                    $array = json_decode($contenido, false);
                    
                }
            } else {
                $array = array();
            }
        } catch (Throwable $mensaje) {
            printf("Error al leer el archivo: <br> $mensaje");
        } finally {
            return $array;
            fclose($archivo);
        }
    }
}
