<?php

// 6- (2 pts.) DevolverHelado.php (por POST),
// Guardar en el archivo (devoluciones.json y cupones.json):
// a- Se ingresa el número de pedido y la causa de la devolución. El número de pedido debe existir, se ingresa una
// foto del cliente enojado,esto debe generar un cupón de descuento(id, devolucion_id, porcentajeDescuento,
// estado[usado/no usadol]) con el 10% de descuento para la próxima compra.
class Devolucion
{
    public $_id;
    public $_numeroDePedido;
    public $_email;
    public $_sabor;
    public $_tipo;
    public $_stock;
    public $_causa;
    public $_fechaDePedido;

    public function __construct($id, $email, $sabor, $tipo, $stock, $numeroDePedido, $fechaDePedido="", $causa)
    { 
        $this->_id = $id;   
        $this->_email = $email;   
        $this->_causa = $causa;   
        $this->_sabor = $sabor; 
        $this->_tipo = $tipo;
        $this->_stock = $stock;    
        $this->_fechaDePedido = $fechaDePedido;   
        $this->_numeroDePedido = $numeroDePedido;
    }

    public function MostrarDevolucion()
    {
        echo "$this->_numeroDePedido,  $this->_id,  $this->_email,  $this->_sabor,  
        $this->_tipo,  $this->_stock,  $this->_fechaDePedido";
    }
}
