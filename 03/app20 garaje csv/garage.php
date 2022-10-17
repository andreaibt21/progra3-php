<?php

include_once 'auto.php';
// Crear la clase Garage que posea como atributos privados:

// _razonSocial (String)
// _precioPorHora (Double)
// _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = array();

    // Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

    // i. La razón social.
    // ii. La razón social, y el precio por hora.
    public function __construct($razonSocial, $precioPorHora = null)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
    }

    public function getAutos()
    {

        return $this->_autos;
    }


    // Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
    // que mostrará todos los atributos del objeto.

    public function MostrarGarage()
    {
        if ($this != null) {
            echo "GARAGE:      razon social: " . $this->_razonSocial . "    precio por hora : $" . $this->_precioPorHora . '</br>';

            if (sizeof($this->_autos) != 0) {

                foreach ($this->_autos as $auto) {

                    $auto::MostrarAuto($auto);
                }
            } else {
                echo "no tiene autos.";
            }
        }
    }
    // Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    // objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    public function Equals($auto)
    {
        $retorno = false;

        foreach ($this->_autos as $autoEnGaraje) {
            if ($autoEnGaraje->Equals($autoEnGaraje, $auto)) {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }


    // Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    // (sólo si el auto no está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Add($autoUno);
    public function Add($autoNuevo)
    {
        if ($this->Equals($autoNuevo)) {
            echo "auto ya esta en el garage " . '</br>';
        } else {
            array_push($this->_autos, $autoNuevo);
            echo "auto agregado " . '</br>';
        }
    }



    // Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
    // “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Remove($autoUno);



    public function Remove($autoAEliminar)
    {
        $key = array_search($autoAEliminar, $this->_autos);
        if ($key != false) {
            unset($this->_autos[$key]);
            echo "auto eliminado </br>";
            return true;
        }
        return false;
    }
    // En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
    // métodos.

    public function GetGarage()
    {
        $stringAutos = $this->_razonSocial . "," . $this->_precioPorHora . PHP_EOL;
        foreach ($this->getAutos() as $auto) {
            $stringAutos .= $auto->AutoALinea();
        }

        return $stringAutos;
    }

    public static  function guardarGarageCompletoCSV($garage, $ruta)
    {
        $archivo = fopen($ruta, "a");
        fwrite($archivo, $garage->GetGarage());
        fclose($archivo);
    }

    public static function CSVAGarage($file = "Garage.csv"): Garage
    {
        $counter = 0;
        $file = fopen($file, "r");
        $garage = new object;
        while (!feof($file)) {
            $line = fgets($file);
            if (!empty($line)) {
                $line = str_replace(PHP_EOL, '', $line);
                $data = explode(',', $line);
                if ($counter == 0) {
                    $garage = new Garage($data[0], $data[1]);
                } else {

                    $campo = explode(",", $line);
                    if (strlen(trim($campo[3])) == null) {
                        $campo3 = null;
                    } else {
                        $campo3 = new DateTime($campo[3]);
                    }

                    $auto = new Auto($campo[2], $campo[0], $campo[1], $campo3);
                    $garage->Add($auto);
                }
                $counter++;
            }
        }
        fclose($file);

        return $garage;
    }
}
