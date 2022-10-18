<?php

// /7- (2 pts.) DevolverHamburguesa.php Guardar en el archivo (devoluciones.json y cupones.json):
// a- Se ingresa el número de pedido y la causa de la devolución. El número de pedido debe existir, se ingresa una
// foto del cliente enojado,esto debe generar un cupón de descuento con el 10% de descuento para la próxima
// // compra.

class Cupon
{
    public $_id;
    public $_idPedido;
    public $_porcentajeDeDescuento;
    public $_estado;

    public function __construct($id, $idPedido, $porcentajeDeDescuento, $estado )
    { 
        $this->_id = $id;   
        $this->_idPedido = $idPedido;   
        $this->_porcentajeDeDescuento = $porcentajeDeDescuento; 
        $this->_estado = $estado;
    }
    public function MostrarCupon()
    {
        echo "$this->id,$this->idPedido,$this->porcentajeDeDescuento,$this->estado";
    }

}



?>
