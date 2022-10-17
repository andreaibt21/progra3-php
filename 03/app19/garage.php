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



}
