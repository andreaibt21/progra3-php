<?php
// Aplicación No 27 (Registro BD)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
// crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
// guardando los datos la base de datos
// retorna si se pudo agregar o no.

    class AccesoDatos {

        private static $ObjetoAccesoDatos;
        private $objetoPDO;

        private function __construct()
        {
            try{
                $this->objetoPDO = new PDO('mysql:host=localhost;dbname=clase06db;charset=utf8', 'root', '')
                $this->objetoPDO = exec("")
            }
            catch(){

            }
        }






        
    }




?>