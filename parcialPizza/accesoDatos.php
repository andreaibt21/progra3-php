<?php 


    class AccesoDatos{

        
        
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