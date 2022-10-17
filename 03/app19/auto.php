<?php
//andrea briceño
// Aplicación No 17 (Auto)
// Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
class Auto
{
    // _color (String)
    // _precio (Double)
    // _marca (String)
    // _fecha (DateTime)
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    // Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
    // i. La marca y el color.
    // ii. La marca, color y el precio.
    // iii. La marca, color, precio y fecha.
    public function __construct($marca, $color, $precio = 5000, DateTime $fecha = NULL)
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }

    // Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
    // parámetro y que se sumará al precio del objeto.
    public function AgregarImpuestos($num)
    {
        if ($this->_precio != null) {
            $this->_precio = $this->_precio + $num;
        } else {
            return "error, no tiene precio.";
        }
    }
    // Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
    // por parámetro y que mostrará todos los atributos de dicho objeto.

    public static function MostrarAuto($auto)
    {

        if ($auto != null) {

            echo 'AUTO: Marca: ' . $auto->_marca . ', Color: ' . $auto->_color . ', Precio: ' . $auto->_precio;

            if ($auto->_fecha != null) {

                echo ",   Fecha: " . $auto->_fecha->format('d-m-Y') . "<br>";
            } else {
                printf(",   Fecha: (no consta) <br>");
            }
        }
    }
    // Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
    // devolverá TRUE si ambos “Autos” son de la misma marca.

    public function Equals(Auto $auto1, Auto $auto2)
    {
        if (($auto1 != null) && ($auto2 != null)) {
            return $auto1->_marca == $auto2->_marca;
        }
    }

    // Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
    // de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
    // la suma de los precios o cero si no se pudo realizar la operación.
    // Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

    public function Add(Auto $auto1, Auto $auto2)
    {
        if ($auto1->Equals($auto1, $auto2) && $auto1->_color == $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        } else {
            echo 'no son de la misma marca y/o color';
            return 0;
        }
    }
  
    // Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
    // archivo autos.csv.

    public static function guardarItemCSV($item, $ruta)
    {
        $retorno = false;
        if ($item->_fecha !== NULL) {
            $item->_fecha = $item->_fecha->format("Y-m-d");
        }
        if ($item) {
            $separadoPorComa = implode(",", (array)$item);
            echo $separadoPorComa;

            $archivo = fopen($ruta, "a+");
            if ($archivo) {
                fwrite($archivo, $separadoPorComa . PHP_EOL);
            }
            fclose($archivo);
            $retorno = true;
        }
        return $retorno;
    }

    public static  function guardarArrayCompletCSV($array, $ruta)
    {
        $retorno = false;

        foreach ($array as $item) {
            if (Auto::guardarItemCSV($item, $ruta)) {
                $retorno = true;
            }
        }
        return $retorno;
    }



    // Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
    // autos.csv. Se deben cargar los datos en un array de autos.

    public static function LeerCSV($archivo)
    {
        $archivoAux = fopen($archivo, "r");
        $array = [];

        if (isset($archivoAux)) {

            try {

                while (!feof($archivoAux)) {
                    $registro = fgets($archivoAux);

                    if (!empty($registro)) {
                        $campo = explode(",", $registro);
                        if (strlen(trim($campo[3])) == null) {
                            $campo3 = null;
                        } else {
                            $campo3 = new DateTime($campo[3]);
                        }
                        array_push($array, new Auto($campo[2], $campo[0], $campo[1], $campo3));
                    }
                }
            } catch (\Throwable $e) {
                echo "no se pudo leer el archivo      " . $e;
                printf($e);
            } finally {
                fclose($archivoAux);
                return $array;
            }
        }
    }
}
