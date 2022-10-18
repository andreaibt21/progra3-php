<?php

// 7- (2 pts.) DevolverHamburguesa.php Guardar en el archivo (devoluciones.json y cupones.json):
// a- Se ingresa el número de pedido y la causa de la devolución. El número de pedido debe existir, se ingresa una
// foto del cliente enojado,esto debe generar un cupón de descuento con el 10% de descuento para la próxima
// compra.
 
class Devolucion
{
    public $_id;
    public $_numeroDePedido;
    public $_email;
    public $_nombre;
    public $_tipo;
    public $_cantidad;
    public $_causa;
    public $_fechaDePedido;

    public function __construct($id, $email, $nombre, $tipo, $cantidad, $numeroDePedido, $fechaDePedido="", $causa)
    { 
        $this->_id = $id;   
        $this->_email = $email;   
        $this->_causa = $causa;   
        $this->_nombre = $nombre; 
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;    
        $this->_fechaDePedido = $fechaDePedido;   
        $this->_numeroDePedido = $numeroDePedido;
    }

    public function MostrarDevolucion()
    {
        echo "$this->_numeroDePedido,  $this->_id,  $this->_email,  $this->_nombre,  
        $this->_tipo,  $this->_cantidad,  $this->_fechaDePedido";
    }
}
